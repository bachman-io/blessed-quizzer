<?php

namespace App\Services;

use GuzzleHttp\Client as HttpClient;
use Illuminate\Http\Request;
use Wohali\OAuth2\Client\Provider\Discord as DiscordProvider;

use App\Models\User;

class DiscordService {

    public $discordProvider;

    public function __construct()
    {
        $this->discordProvider = new DiscordProvider([
            'clientId' => env('DISCORD_CLIENT_ID'),
            'clientSecret' => env('DISCORD_CLIENT_SECRET'),
            'redirectUri' => env('DISCORD_REDIRECT_URI')
        ]);
    }

    public function isLoggedIn(Request $request) {
        if ($request->session()->has('discord_access_token')) {
            $token = $request->session()->get('discord_access_token');
            if ($token->hasExpired()) {
                $newToken = $this->discordProvider->getAccessToken('refresh_token', [
                    'refresh_token' => $token->getRefreshToken()
                ]);
                $request->session()->put('discord_access_token', $newToken);
            }
            return true;
        }
        return false;
    }

    public function syncUser($userData)
    {
        $user = User::updateOrCreate([
            'id' => $userData->id,
            'name' => $userData->username,
            'discriminator' => $userData->discriminator
        ]);
    }

    public function fetchData(Request $request, $data)
    {
        if ($request->session()->has('discord_user')) {
            $user = $request->session()->get('discord_user');
            $this->syncUser($user);
            $data['user'] = User::find($user->id);
            return $data;
        }

        try {
            $token = $request->session()->get('discord_access_token');

            $client = new HttpClient([
                'base_uri' => 'https://discordapp.com/api/',
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                    'Accept' => 'application/json'
                ]
            ]);
            $response = $client->get('users/@me');
            $request->session()->put('discord_user', json_decode($response->getBody()));

            $user = $request->session()->get('discord_user');
            $this->syncUser($user);
            $data['user'] = User::find($user->id);
            return $data;

        } catch(\Exception $exception) {
            $request->session()->flush();
            $request->session()->flash('error', 'Error - ' . $exception->getMessage());
            $data['exception'] = $exception->getMessage();

            return $data;
        }

    }

}
