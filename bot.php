<?php
$access_token = '9IZJJf8ncTrlqFjc+eABCpoRjDx5R1aulGnaW7eoO65LmmdiSTkVhrNw7vrS8+yoPSpiitTDnYPHhpj3ZdQcDdRNfR+xk25ama6TDEK7tADIL3+tFm6ksnGX+1X5fO6+cKnAvb4U32+SfaGcyZovtgdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];
			$sendMsg = [];

			if($text == 'hello'){
				// $msg = array("สวัสดีจ้า","Hello","จ้า สวัสดีจ้า");
				// $ran_msg =rand(0,2);
				$messages = [
				{
					'type' => 'text',
					// 'text' => $msg[$ran_msg]
					'text' => $text
				}
				];
			}

			// Build message to reply back
			// $messages = [
			// 	{
			// 		'type' => 'text',
			// 		'text' => $text 
			// 	},{
			// 		'type' => 'text',
			// 		'text' => 'QQQQQ'
			// 	}
			// ];

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => $messages,

			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
		}
	}
}
echo "OK";
