<?php
$access_token = '9IZJJf8ncTrlqFjc+eABCpoRjDx5R1aulGnaW7eoO65LmmdiSTkVhrNw7vrS8+yoPSpiitTDnYPHhpj3ZdQcDdRNfR+xk25ama6TDEK7tADIL3+tFm6ksnGX+1X5fO6+cKnAvb4U32+SfaGcyZovtgdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;