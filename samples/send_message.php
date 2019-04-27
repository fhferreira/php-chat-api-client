<?php

require_once(__DIR__ . '/../vendor/autoload.php');

$dotenv = Dotenv\Dotenv::create(__DIR__);
$dotenv->load();

$chat = new Pedrommone\ChatAPI\Client(getenv('CHAT_API_ID'), getenv('CHAT_API_TOKEN'));

$message = $chat->messages()->send([
    'chatId' => null,
    'phone' => getenv('TARGET_PHONE'),
    'body' => 'Whatsupppppppp',
]);

$queue = $chat->queue()->lists();

var_dump($message);
var_dump($queue);

