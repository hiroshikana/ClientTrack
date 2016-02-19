<?php
ini_set("display_errors", "On");
error_reporting(E_ALL | E_STRICT);
// 获取IP1
$ip = $_POST['realIp'];
$lng = $_POST['lng'];
$lat = $_POST['lat'];
$locatstaus = $_POST['locatStatus'];
$locatdirt = $_POST['locatdirt'];
// 获取IP2

$ip_backup = getIp();


// 连接字符串
$time= date('Y-m-d H:i:s',time());
$text = $ip."\t|".$ip_backup."\t".$locatstaus.":".$lat.",".$lng."\t".$locatdirt."\t".$time."\r";
$ipfile = fopen("iplist.txt","a") or die("Unable to open file!");
fwrite($ipfile, $text);
fclose($ipfile);


function getIp() { 
    if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown")) $ip = getenv("HTTP_CLIENT_IP"); 
    else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown")) $ip = getenv("HTTP_X_FORWARDED_FOR"); 
    else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown")) $ip = getenv("REMOTE_ADDR"); 
    else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown")) $ip = $_SERVER['REMOTE_ADDR']; 
    else $ip = "unknown"; 
    return ($ip); 
}
?>