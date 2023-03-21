<?php 
header('Content-type: text/html; charset=utf-8');

$db  = new mtsqli('13.124.103.127', 'choi', 'choichoi', 'mysql','3306');
$db -> set_charset("utf8");

function mq($sql){
    global $db;
    return $db -> query($sql);
}

?>