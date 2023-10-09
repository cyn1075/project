<?php

$token= $_POST["Token"];

echo($token);

function send_notification($tokens, $message) {

$url = 'https://fcm.googleapis.com/fcm/send';

if ($message) {		
    $fields = array (		
        'notification' => array ('body' => $message['body'], 'title' => $message['title'])		
    );		
}

if(is_array($tokens)) {		
    $fields['registration_ids'] = $tokens;		
} else {		
    $fields['to'] = $tokens;		
}

$fields['priority'] = "high";		

$FCM_SERVER_KEY = "AAAAc_IEV4A:APA91bFrBDHi3pbT7Qh8YmD3vfzlK4YQ-QZaO6Ce8LVfLrfiLK-gfRz9naUurejx8MqhItaR2HFDkRE_Av-Rad4yquHCrxufh7_BVTK3y4xw6b4qiGmRNIMoYz2l-9-tlnQ1QBGehGws"; 

$headers = array(		
    'Authorization:key =' . $FCM_SERVER_KEY,		
    'Content-Type: application/json'		
);


$ch = curl_init();		
curl_setopt($ch, CURLOPT_URL, $url);		
curl_setopt($ch, CURLOPT_POST, true);		
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);		
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);		
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);  		
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);		
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

$result = curl_exec($ch);           

if ($result === FALSE) {		
   die('Curl failed: ' . curl_error($ch));		
}

curl_close($ch);

return $result;

}




$tokens = $token;


$message = array(		
"title"   => "$title", 		
"body" => "$content", 		
);

send_notification($tokens, $message);

?>