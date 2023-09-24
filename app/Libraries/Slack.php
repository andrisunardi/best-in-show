<?php

namespace App\Libraries;

use Illuminate\Support\Facades\Http;

class Slack
{
    public static function send(
        string $message,
        string $channel = null,
        string $username = null,
        string $icon_url = null,
        string $icon_emoji = null,
        bool $force = false,
    ) {
        $url = config('logging.channels.slack.url');

        $payload = [
            'text' => $message,
        ];

        if ($channel) {
            $payload['channel'] = $channel;
        }

        if ($username) {
            $payload['username'] = $username;
        }

        if ($icon_url) {
            $payload['icon_url'] = $icon_url;
        }

        if ($icon_emoji) {
            $payload['icon_emoji'] = $icon_emoji;
        }

        if (config('app.env') == 'production' || $force) {
            $response = Http::post($url, $payload)->throw()->json();

            return $response;
        }
    }
}
