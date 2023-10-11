<?php

$con = mysqli_connect('13.124.103.127', 'choi', 'choichoi', 'mysql');

$name = $_POST['profilname'];
$title = $_POST['profiltitle'];
$image = $_POST['profilimage'];


$subscribeSQL =  "SELECT token from android_subscribe where subscribeid='$name'";

$subscribeResult = mysqli_query($con, $subscribeSQL);

if ($subscribeResult) {

    // $ch = curl_init("https://fcm.googleapis.com/fcm/send");
    // $header = array("Content-Type:application/json", "Authorization: key=AAAAc_IEV4A:APA91bFrBDHi3pbT7Qh8YmD3vfzlK4YQ-QZaO6Ce8LVfLrfiLK-gfRz9naUurejx8MqhItaR2HFDkRE_Av-Rad4yquHCrxufh7_BVTK3y4xw6b4qiGmRNIMoYzYz2l-9-tlnQ1QBGehGws");


    // $member = mysqli_fetch_array($subscribeResult);
    // // echo $member['token'];

    // // $token = $subscribeResult->fetch_array(MYSQLI_ASSOC);

    // // while ($row = mysqli_fetch_assoc($subscribeResult)) {
    // $token = $member['token'];
    

    // $data = json_encode(array(
    //     "to" => "f5HNphH5QiW2xCiG86hc-K:APA91bG-ogV9qmUL2u5O8Oh7zZqRLxq2UrqqV7ap_jscXrnFAk7N3oFrsRp02V7whJKYlbrXbEAoGXF-bXfsvtpYUnUy7HVken3VSTtO_qOmSPpREXXiiay9wOA5ORAhcVqrEEqmkxt7",
    //     "notification" => array(
    //         "title" => "test",
    //         "body" => "test"
    //     )
    // ));
    
    // curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    // curl_setopt($ch, CURLOPT_POST, 1);
    // curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    // curl_exec($ch);

    // }


    $ch = curl_init("https://fcm.googleapis.com/fcm/send");
    $header = array("Content-Type:application/json", "Authorization: key=AAAAc_IEV4A:APA91bFrBDHi3pbT7Qh8YmD3vfzlK4YQ-QZaO6Ce8LVfLrfiLK-gfRz9naUurejx8MqhItaR2HFDkRE_Av-Rad4yquHCrxufh7_BVTK3y4xw6b4qiGmRNIMoYz2l-9-tlnQ1QBGehGws");
    $data = json_encode(array(
        "to" => "f5HNphH5QiW2xCiG86hc-K:APA91bG-ogV9qmUL2u5O8Oh7zZqRLxq2UrqqV7ap_jscXrnFAk7N3oFrsRp02V7whJKYlbrXbEAoGXF-bXfsvtpYUnUy7HVken3VSTtO_qOmSPpREXXiiay9wOA5ORAhcVqrEEqmkxt7",
        "notification" => array(
            "title"   => "test",
            "body" => "testBody")
            ));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_exec($ch);
    








}


// $sql = "INSERT INTO android_menu(name, title, image) values('$name', '$title', '$image')";
// $result = mysqli_query($con, $sql);


// if($result){
//     echo "성공";
// }else{
//     echo"실패";
// }


// mysqli_close($con);




?>