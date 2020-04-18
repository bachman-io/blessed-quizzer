<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use League\OAuth2\Client\Provider\Exception\IdentityProviderException;
use Wohali\OAuth2\Client\Provider\Discord as DiscordProvider;

class DiscordController extends Controller
{
    public function login(Request $request)
    {
        $options = ['scope' => ['identify']];
        $authUrl = $this->discordProvider->getAuthorizationUrl($options);
        $request->session()->put('discord_oauth2_state', $this->discordProvider->getState());
        return redirect()->to($authUrl);
    }

    public function callback(Request $request)
    {
        if (empty($request->query('state'))
            || $request->query('state') !== $request->session()->get('discord_oauth2_state')) {
            $request->session()->flash('error', 'The OAuth States did not match; this is to prevent CSRF attacks!');
            return redirect()->to('/');
        }
        if ($request->has('code')) {
            try {
                $token = $this->discordProvider->getAccessToken('authorization_code', ['code' => $request->query('code')]);
                $request->session()->put('discord_access_token', $token);

            } catch(IdentityProviderException $e) {
                $request->session()->flash('error', 'OAuth2 Exception: ' . $e->getMessage());
            }
        } else {
            $request->session()->flash('error', 'Authorization Request Cancelled');
        }
        return redirect()->to('/');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        $request->session()->flash('success', 'You\'re logged out. See you later!');
        return redirect()->to('/');
    }
}
