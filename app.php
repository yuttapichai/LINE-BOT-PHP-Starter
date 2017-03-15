<?php

$access_token = "iMSyo6bXV9inTvHMZmFaLumlnWdzfkEL6POB3rTjEbXlKRSDG/0YYrJz64AoxdNxjQKrMrzyI5xrHxLZNNjBdGA3ob4AWXBvJCW/vgJdbMDClctOvwPX8M5qPniyNunj+DTYCLmzIDCR1C9VdRN6lgdB04t89/1O/w1cDnyilFU=";
// $proxy = <YOUR_PROXY_FROM_FIXIE>;
// $proxyauth = <YOUR_PROXYAUTH_FROM_FIXIE>;

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
			
			$bufferMessage = [];

            $temp1 = '18';
            $temp2 = '19';
            $temp3 = '20';
            $temp4 = '21';
            $temp5 = '22';           
            

            $message1 = [
                'type' => 'text',
                'text' => 'ค่าอุณหภูมิ วันที่ 10/3/60 : ' . $temp1 . ' องศาเซลเซียส' . "\r\n" .
                    'ค่าอุณหภูมิ วันที่ 11/3/60 : ' . $temp2 . ' องศาเซลเซียส' . "\r\n" .
                    'ค่าอุณหภูมิ วันที่ 12/3/60 : ' . $temp3 . ' องศาเซลเซียส' . "\r\n" .
                    'ค่าอุณหภูมิ วันที่ 13/3/60 : ' . $temp4 . ' องศาเซลเซียส' . "\r\n" .
                    'ค่าอุณหภูมิ วันที่ 14/3/60 : ' . $temp5 . ' องศาเซลเซียส' . "\r\n"
            ];


            
            if($event['message']['text'] == "เหนื่อยไหม"){
                $bufferMessage[0] = $message1;
            }

            // Build message to reply back
            // Enter your code here 

            // Make a POST Request to Messaging API to reply to sender
            $url = 'https://api.line.me/v2/bot/message/reply';
			
			$data = [
                'replyToken' => $replyToken,                
                'messages' => $bufferMessage,
            ];
			
			
            $post = json_encode($data);	
			
            $headers = array('Content-Type: application/json', 'Authorization: Bearer '.$access_token);

            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            // curl_setopt($ch, CURLOPT_PROXY, $proxy);
            // curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
            $result = curl_exec($ch);
            curl_close($ch);

            echo $result."\r\n";
        }
    }
}
echo 'OK';