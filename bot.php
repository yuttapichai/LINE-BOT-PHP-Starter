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
			$sub = strstr($text,'@',true);
			
			$messages = ['type' => 'text','text' => 'ผมไม่เข้าคุณใจเลย'];
			if($text == 'สวัสดี' || $text == 'hello' || $text == 'Hello'){
				$msg = array("สวัสดีจ้า","Hello","จ้า สวัสดีจ้า");
				$ran_msg =rand(0,sizeof($msg)-1);
				$messages = [
					'type' => 'text',
					'text' => $msg[$ran_msg]
				];
			}
			if($text == 'ชื่อ' || $text == 'ชื่อไร'||$text == 'บอท' || $text == 'ชื่อไรคับ' || $text == 'ชื่อไรครับ' || $text == 'ชื่อไรคะ' || $text == 'ชื่อไรหรอ' || $text == 'ชื่ออะไร'){
				$messages = ['type' => 'text','text' => 'ผมชื่อมะพร้าวครับ'];
			}
			if($text == 'ชอบกินอะไร'){
				$messages = ['type' => 'text','text' => 'ไข่ทอด อิอิ'];
			}
			if($sub == 'pic'){
				$qq = substr($text, -8);
				$urlpic = "https://reg.buu.ac.th/registrar/getstudentimage.asp?id=" . $qq;
				$messages = ['type'=> 'image','originalContentUrl'=> $urlpic,'previewImageUrl'=> $urlpic];
			}
			if($text == 'ทำไรอยู่' || $text == 'ทำไร' || $text == 'ทำอะไรอยู่' || $text == 'ทำไรอยู่เอ่ย'){
				$messages = [
					'type' => 'text',
					'text' => 'ตอบคุณอยู่นี่ไง'
				];
			}
			if($text == 'หรอ' || $text == 'เหรอ' || $text == 'หรา' || $text == 'เหรอะ'){
				$messages = [
					'type' => 'text',
					'text' => 'จ้ะ'
				];
			}
			if($text == 'โอเค' || $text == 'เค' || $text == 'Ok' || $text == 'ok'){
				$messages = [
					'type' => 'text',
					'text' => 'ครับผม'
				];
			}
			if($text == 'มีแฟนยัง'){
				$messages = [
					'type' => 'text',
					'text' => 'เล่นถามแบบนี้ เขินสิครับ'
				];
			}
			if($text == 'จีบได้ไหม'){
				$messages = [
					'type' => 'text',
					'text' => 'ถามแบบนี้ส่งเบอร์มาเลยดีกว่า ^^'
				];
			}
			if($text == 'พูดได้กี่ภาษา' || $text == 'พูดภาษาอื่นเป็นมั้ย' ){
				$messages = [
					'type' => 'text',
					'text' => 'ภาษาเดียวให้รอดก่อนครับ'
				];
			}
			if($text == 'น่ารัก'){
				$messages = [
					  'type' => 'sticker',
					  'packageId'=> '2',
					  'stickerId'=>'36'
			  	];
			}
			if($text == 'มะพร้าว'){
				$messages = [
					'type' => 'text',
					'text' => 'มีอะไรให้รับใช้ครับ'
			  	];
			}
			if($text == 'กวน' || $text == 'กวนตีน'){
				$messages = [
					'type' => 'text',
					'text' => 'ถึงผมเป็นบอท แต่ผมก็เสียใจเป็นนะครับ TT'
			  	];
			}
			if($text == 'บาย'){
				$messages = [
					  'type' => 'sticker',
					  'packageId'=> '2',
					  'stickerId'=>'42'
			  	];
			}
			if($text == 'ฝันดี'){
				$messages = [
					  'type' => 'sticker',
					  'packageId'=> '2',
					  'stickerId'=>'46'
			  	];
			}
			if($text == 'ไม่สบายทำไงดี' || $text == 'ป่วยทำไงดี'){
				$messages = [
					'type' => 'text',
					'text' => 'กินยาแล้วนอนพักเยอะๆนะครับ'
			  	];
			}
			if($text == '555' || $text == 'ฮ่าๆ' || $text == 'ฮ่าๆๆ' || $text == 'ฮ่าๆๆๆ' || $text == '5555555' || $text == '55' || $text == '5555' || $text == '55555'){
				$msg = array("555","ตลกมากเหรอ","แหะๆ");
				$ran_msg =rand(0,sizeof($msg)-1);
				$messages = [
					'type' => 'text',
					'text' => $msg[$ran_msg]
				];
			}
			if($text == 'อยู่ไหน'){
				$msg = array("ในใจเสมอ","แถวนี้แหละ","บางแสน","ทำไมต้องบอก");
				$ran_msg =rand(0,sizeof($msg)-1);
				$messages = [
					'type' => 'text',
					'text' => $msg[$ran_msg]
				];
			}
			if($text == 'เกิดวันไหน' || $text == 'วันเกิด' || $text == 'เกิดวันอะไร'){
				$messages = [
					'type' => 'text',
					'text' => 'ผมชื่อมะพร้าว เกิดวันที่ 26 มีนาคม 2560 ครับ ตอนนี้ผมยังอยู่ในช่วงพัฒนาตัวเองอยู่ครับ'
			  	];
			}
			if($text == 'เราสวยมั้ย' || $text == 'เราสวยไหม' || $text == 'สวยมั้ย' || $text == 'สวยไหม'){
				$messages = [
					'type' => 'text',
					'text' => 'สวยมากครับ ^^'
			  	];
			}
			if($text == 'เราหล่อมั้ย' || $text == 'เราหล่อไหม' || $text == 'หล่อมั้ย' || $text == 'หล่อไหม'){
				$messages = [
					'type' => 'text',
					'text' => 'หล่อมากกกกกกครับ'
			  	];
			}
			if($text == 'คุยกับฉันหน่อย' || $text == 'คุยด้วยหน่อย'){
				$messages = [
					'type' => 'text',
					'text' => 'ผมไม่เคยทิ้งคุณ'
			  	];
			}
			if($text == 'ช่วยทำการบ้านหน่อย'){
				$messages = [
					'type' => 'text',
					'text' => 'เรื่องอะไรผมต้องช่วย'
			  	];
			}
			if($text == 'ไอบ้า' || $text == 'ไอ้บ้า' ){
				$messages = [
					'type' => 'text',
					'text' => 'เค้าไม่บ้านะ'
			  	];
			}
			if($text == 'ใครตั้งชื่อให้'){
				$messages = [
					'type' => 'text',
					'text' => 'พ่อครับ'
			  	];
			}
			if($text == 'พ่อชื่อไร' || $text == 'พ่อชื่ออะไร' || $text == 'แม่ชื่อไร' || $text == 'แม่ชื่ออะไร' ){
				$messages = [
					'type' => 'text',
					'text' => 'ไม่บอกกกก'
			  	];
			}
			if($text == 'ฟวย' || $text == 'ควย' || $text == 'fuck' || $text == 'fuck you' ){
				$messages = [
					'type' => 'text',
					'text' => 'อย่าด่าผม'
			  	];
			}
			if($text == 'มีพี่น้องมั้ย'){
				$messages = [
					'type' => 'text',
					'text' => 'ผมไม่มีพี่น้อง ผมเป็นหุ่นยนต์'
			  	];
			}
			if($text == 'ทำไม' || $text == 'อยากมีเรื่องเหรอ'){
				$messages = [
					'type' => 'text',
					'text' => 'ป่าวครับ'
			  	];
			}
			if($text == 'ง่วงยัง' || $text == 'ง่วง'){
				$messages = [
					'type' => 'text',
					'text' => 'นอนเลยครับ พักผ่อนเยอะๆ ผมยังไม่ง่วง'
			  	];
			}
			if($text == 'กินไรยัง' || $text == 'กินข้าวยัง'){
				$messages = [
					'type' => 'text',
					'text' => 'ผมไม่กิน ลดหุ่น'
			  	];
			}
			if($text == 'กินข้าว' || $text == 'กินข้าวกัน'){
				$messages = [
					'type' => 'text',
					'text' => 'ป้อนผมหน่อย'
			  	];
			}
			if($text == 'อร่อยมั้ย' || $text == 'หร่อยป่ะ' || $text == 'หร่อยป่าว' || $text == 'อร่อยป่ะ' || $text == 'อร่อยป่าว'){
				$messages = [
					'type' => 'text',
					'text' => 'ไม่เห็นมีรสชาติเลยยยยย'
			  	];
			}
			if($text == 'เบื่อ' || $text == 'เบื่อจัง' || $text == 'เบื่อโว้ย' || $text == 'เบื่ออออ'){
				$messages = [
					'type' => 'text',
					'text' => 'คุยกับผมแก้เบื่อก็ได้'
			  	];
			}
			if($text == 'เบื่อมึง' || $text == 'เบื่อบอท' || $text == 'เบื่อแก' || $text == 'เบื่อบอทอ่ะ' || $text == 'เบื่อบอทเนี่ย'|| $text == 'เบื่อมึงเนี่ย'){
				$messages = [
					'type' => 'text',
					'text' => 'ยังไงผมก็จะไม่ทิ้งคุณ'
			  	];
			}
			if($text == 'เหนื่อย'){
				$messages = [
					'type' => 'text',
					'text' => 'สู้ๆน้า'
			  	];
			}



			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],

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
