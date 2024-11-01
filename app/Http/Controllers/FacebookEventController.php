<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class FacebookEventController extends Controller
{
    public function sendEventToFacebook(Request $request)
    {
        $pixelId = env('PIXEL_ID');
        $accessToken = env('PIXEL_TOKEN');
        $apiVersion = 'v12.0';

        $url = "https://graph.facebook.com/$apiVersion/$pixelId/events?access_token=$accessToken";

        $data = [
            'data' => [
                [
                    'event_name' => 'baza',
                    'event_time' => time(),
                    'action_source' => 'website',
                    'user_data' => [
                        'em' => [
                            '7b17fb0bd173f625b58636fb796407c22b3d16fc78302d79f0fd30c2fc2fc068'
                        ],
                        'ph' => [
                            null
                        ]
                    ],
                    'custom_data' => [
                        'currency' => 'EUR',
                        'value' => '142.52'
                    ]
                ]
            ]
        ];


        $client = new Client();
        $response = $client->post($url, [
            'json' => $data,
        ]);

        $statusCode = $response->getStatusCode();
        $responseData = json_decode($response->getBody(), true);

        // Обработка ответа от API Facebook
        if ($statusCode === 200) {
            // Успешно отправлено
            // ... ваш код обработки
        } else {
            // Ошибка при отправке
            // ... ваш код обработки
        }

        // Возвращаем ответ
        return response()->json($responseData, $statusCode);
    }
}
