<?php
include 'updateimagedb.php';
$filename=$_POST['filename'];
$url = $_POST['filepath'];
$user = $_POST['user'];
$ch = curl_init();
	$timeout = 5;
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	$data = curl_exec($ch);
	curl_close($ch);

$destination = "../uploads/"."$filename";
$file = fopen($destination, "w+");
fputs($file, $data);
fclose($file);
echo "saved";
$filepath="http://sasankmacherla.com/uploads/"."$filename";
insertimagedb($filename,$filepath,$user);

?>