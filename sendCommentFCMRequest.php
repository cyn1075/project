<?php
define('API_ACCESS_KEY','AAAAc_IEV4A:APA91bFrBDHi3pbT7Qh8YmD3vfzlK4YQ-QZaO6Ce8LVfLrfiLK-gfRz9naUurejx8MqhItaR2HFDkRE_Av-Rad4yquHCrxufh7_BVTK3y4xw6b4qiGmRNIMoYz2l-9-tlnQ1QBGehGws');
 $fcmUrl = 'https://fcm.googleapis.com/fcm/send';
//  $token = 'elvVfIsQTFCsf8jeHgCr9i:APA91bElBGRcjE0-9vbO8quiHwefEAFyZ-BvHi1Xwyx-fEDFmzEiwAcJz154yM_GSiFxQ_5gTw0aoS5bRhat2izorBv0CQevz-gBByHko2MRxYl4nJSsWm8lWIFViLGJBVOxlp6Mnya3';
 $token= $_POST["Token"]; //해당 Device TokenKey
    $notification = [
            'title' =>'title',
            'body' => 'body of message.',
            'icon' =>'myIcon', 
            'sound' => 'mySound'
        ];
        $extraNotificationData = ["message" => $notification,"moredata" =>'dd'];
        $fcmNotification = [
            //'registration_ids' => $tokenList, //multple token array
            'to'        => $token, //single token
            'notification' => $notification,
            'data' => $extraNotificationData
        ];
        $headers = [
            'Authorization: key= AAAAc_IEV4A:APA91bFrBDHi3pbT7Qh8YmD3vfzlK4YQ-QZaO6Ce8LVfLrfiLK-gfRz9naUurejx8MqhItaR2HFDkRE_Av-Rad4yquHCrxufh7_BVTK3y4xw6b4qiGmRNIMoYz2l-9-tlnQ1QBGehGws', 
            'Content-Type: application/json'
        ];


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$fcmUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
        $result = curl_exec($ch);
        curl_close($ch);


        echo $result;
?>