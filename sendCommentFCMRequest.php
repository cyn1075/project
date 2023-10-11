<?php
// define('API_ACCESS_KEY','AAAAc_IEV4A:APA91bFrBDHi3pbT7Qh8YmD3vfzlK4YQ-QZaO6Ce8LVfLrfiLK-gfRz9naUurejx8MqhItaR2HFDkRE_Av-Rad4yquHCrxufh7_BVTK3y4xw6b4qiGmRNIMoYz2l-9-tlnQ1QBGehGws');
//  $fcmUrl = 'https://fcm.googleapis.com/fcm/send';

//  $token= $_GET["Token"]; //해당 Device TokenKey

//f5HNphH5QiW2xCiG86hc-K:APA91bG-ogV9qmUL2u5O8Oh7zZqRLxq2UrqqV7ap_jscXrnFAk7N3oFrsRp02V7whJKYlbrXbEAoGXF-bXfsvtpYUnUy7HVken3VSTtO_qOmSPpREXXiiay9wOA5ORAhcVqrEEqmkxt7
//

$ch = curl_init("https://fcm.googleapis.com/fcm/send");
        $header = array("Content-Type:application/json", "Authorization: key=AAAAc_IEV4A:APA91bFrBDHi3pbT7Qh8YmD3vfzlK4YQ-QZaO6Ce8LVfLrfiLK-gfRz9naUurejx8MqhItaR2HFDkRE_Av-Rad4yquHCrxufh7_BVTK3y4xw6b4qiGmRNIMoYz2l-9-tlnQ1QBGehGws");
        $data = json_encode(array(
            "to" => "cievHIPYT9G_BDoGPbq_VD:APA91bHOCIpdsGNgxoL63uUl9onQsueW3DILt3IGg7RgAIGf78Qt_fl3iEykCUwz2K_0MB75psUjq76zKhJH3fLFJcDxi5jskJCgffgnxhaVyy3rbslmsagMhq0FOZ3UprVEQ2GseQin",
            "notification" => array(
                "title"   => "test",
                "body" => "testBody")
                ));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_exec($ch);
        


    // $notification = [
    //         'title' =>'title',
    //         'body' => 'body of message.',
    //         'icon' =>'myIcon', 
    //         'sound' => 'mySound'
    //     ];
    //     $extraNotificationData = ["message" => $notification,"moredata" =>'dd'];
    //     $fcmNotification = [
    //         //'registration_ids' => $tokenList, //multple token array
    //         'to'        => $token, //single token
    //         'notification' => $notification,
    //         'data' => $extraNotificationData
    //     ];
    //     $headers = [
    //         'Authorization: key=' . API_ACCESS_KEY, 
    //         'Content-Type: application/json'
    //     ];


    //     $ch = curl_init();
    //     curl_setopt($ch, CURLOPT_URL,$fcmUrl);
    //     curl_setopt($ch, CURLOPT_POST, true);
    //     curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    //     curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
    //     $result = curl_exec($ch);
    //     curl_close($ch);


    //     // echo $result;

    //     if($result){
    //         echo "성공";
    //     }else{
    //         echo"실패";
    //     }
        
?>