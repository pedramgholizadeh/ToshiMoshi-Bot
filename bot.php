<?php
$token = 'YOUR_TELEGRAM_TOKEN'; // Replace with real telegram bot token , @botfather!

$adminChatId = 'ADMIN_CHAT_ID'; // Replace with the actual admin's chat ID

$content = file_get_contents("php://input");
$update = json_decode($content, true);
$chatId = $update['message']['chat']['id'];
$messageText = $update['message']['text'];
$callbackQuery = $update['callback_query'];
$photo = $update['message']['photo'];

// Channel ID for join check, add this bot as administrator.
$channelUsernameId = '@pedramgholizadeh';
// Database 


function sendMessage($chatId, $text, $replyMarkup = null)
{
    global $token;
    $apiUrl = "https://api.telegram.org/bot$token/sendMessage";
    $params = [
        'chat_id' => $chatId,
        'text' => $text,
        'reply_markup' => $replyMarkup,
    ];

    file_get_contents($apiUrl . '?' . http_build_query($params));
}




function getChatMemberStatus($chatId, $channelUsername) {
    global $token;
    $apiUrl = "https://api.telegram.org/bot$token/getChatMember";
    $params = [
        'chat_id' => $channelUsername,
        'user_id' => $chatId,
    ];
    $response = file_get_contents($apiUrl . '?' . http_build_query($params));
    $data = json_decode($response, true);
    return $data['result']['status'];
}




if ($messageText == '/start') {
    
    // Check if the user has joined the channel
    $chatMemberStatus = getChatMemberStatus($chatId, $channelUsernameId);
    if ($chatMemberStatus == 'member' || $chatMemberStatus == 'administrator' || $chatMemberStatus == 'creator') {
        $replyMarkup = [
            'inline_keyboard' => [
                [['text' => 'Start Mining ⚡️' , 'url' => 'https://t.me/ToshiMoshiBot/ToshiMoshi']],
            ],
            'resize_keyboard' => true
        ];
        $replyMarkup = json_encode($replyMarkup);
        sendMessage($chatId, 'Wellcome to #ToshiMoshi ♥︎', $replyMarkup);
    } else {
        $replyMarkup = [
            'inline_keyboard' => [
                [['text' => 'Join Our TG Channel', 'url' => 'https://t.me/pedramgholizadeh']], // Channel Sponsor
                [['text' => 'Check ✅', 'callback_data' => 'wellcome']]
            ]
        ];
        $replyMarkup = json_encode($replyMarkup);
        sendMessage($chatId, 'Please join our TG Channel', $replyMarkup);
    }

}

if ($callbackQuery) {
    $callbackData = $callbackQuery['data'];
    $callbackMessageId = $callbackQuery['message']['message_id'];
    $callbackChatId = $callbackQuery['message']['chat']['id'];
    if ($callbackData == 'wellcome') {
        $chatMemberStatus = getChatMemberStatus($chatId, $channelUsernameId);
        if ($chatMemberStatus == 'member' || $chatMemberStatus == 'administrator' || $chatMemberStatus == 'creator') {
            $replyMarkup = [
                'inline_keyboard' => [
                    [['text' => 'Start Mining ⚡️' , 'url' => 'https://t.me/ToshiMoshiBot/ToshiMoshi']], // Insert your webapp bot URL here
                ],
                'resize_keyboard' => true
            ];
            $replyMarkup = json_encode($replyMarkup);
            sendMessage($chatId, 'Wellcome to #ToshiMoshi ♥︎', $replyMarkup);
        } else {
            $replyMarkup = [
                'inline_keyboard' => [
                    [['text' => 'Join Our TG Channel', 'url' => 'https://t.me/pedramgholizadeh']], // Channel Sponsor!
                    [['text' => 'Check ✅', 'callback_data' => 'wellcome']]
                ]
            ];
            $replyMarkup = json_encode($replyMarkup);
            sendMessage($chatId, 'Please join our TG Channel', $replyMarkup);
        }
    }
}







