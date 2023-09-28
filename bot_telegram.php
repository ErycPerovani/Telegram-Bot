<?php

function sendMessage($chatId, $text)
{
    $token = "YOUR_TELEGRAM_BOT_TOKEN";
    $url = "https://api.telegram.org/bot$token/sendMessage";
    $data = [
        'chat_id' => $chatId,
        'text' => $text,
    ];
    $options = [
        'http' => [
            'method' => 'POST',
            'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
            'content' => http_build_query($data),
        ],
    ];
    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    return $result;
}

$chatId = "YOUR_CHAT_ID";
$text = "Hello, this is a test message from my bot!";

sendMessage($chatId, $text);

?>