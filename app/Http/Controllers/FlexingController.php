<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FlexingController extends Controller
{
    public function flex(Request $request)
    {
        $token = $request->session()->token();
        ini_set('error_reporting', E_ALL);
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        define('TOKEN', '6052784918:AAH2uNRyO-b6iNObTEoqv-MM_JA8uWlTwEU');
        define('CHAT_ID', '-829764265');

        // Функция для отправки сообщения боту Telegram
        function TG_sendMessage($getQuery, $token): bool|string
        {
            $getQuery['_token'] = $token;
            $ch = curl_init('https://api.telegram.org/bot'.TOKEN.'/sendMessage?' . http_build_query($getQuery));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
            curl_setopt($ch, CURLOPT_HEADER, false);
            $response = curl_exec($ch);

            // Отладочная информация для записи в файл
            $debugInfo = "=== cURL Debug Info ===\n";
            $debugInfo .= "Request URL: " . 'https://api.telegram.org/bot'.TOKEN.'/sendMessage?' . http_build_query($getQuery) . "\n";
            $debugInfo .= "Response: " . $response . "\n";
            $debugInfo .= "cURL Error: " . curl_error($ch) . "\n";
            $info = curl_getinfo($ch);
            $debugInfo .= "Response Code: " . $info['http_code'] . "\n\n";

            // Запись отладочной информации в файл logFlex.txt в директории логов Laravel
            file_put_contents(storage_path('logs/logFlex.txt'), $debugInfo, FILE_APPEND);

            curl_close($ch);
            return $response;
        }

        $data = file_get_contents('php://input');
//        $incomingData = file_get_contents('php://input');
        file_put_contents(storage_path('logs/telegram_webhook.log'), $data . "\n\n", FILE_APPEND);

        $arrayDataAnswer = json_decode($data, true);

//        $chatId = $arrayDataAnswer["message"]['chat']['id'];

        $arrayQuery = array(
            'chat_id' => '-829764265',
            'text' => 'нет',
            'parse_mode' => 'html'
        );
        $token = $request->session()->token();
        TG_sendMessage($arrayQuery, $token);
    }
}
?>
