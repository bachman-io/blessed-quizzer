<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Wohali\OAuth2\Client\Provider\Discord as DiscordProvider;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $discordProvider;

    public function __construct()
    {
        $this->discordProvider = new DiscordProvider([
            'clientId' => env('DISCORD_CLIENT_ID'),
            'clientSecret' => env('DISCORD_CLIENT_SECRET'),
            'redirectUri' => env('DISCORD_REDIRECT_URI')
        ]);
    }
}
