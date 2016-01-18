<?php
function replicateimagedb($filename,$filepath,$user)
{
$data = array("filename"=>$filename,"filepath"=>$filepath,"user"=>$user);
$string = http_build_query($data);

$ch=curl_init("http://anushakonatala.com/curl_download.php");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response=curl_exec($ch);
curl_close($ch);
$ch=curl_init("http://moviestorm.co/curl_download.php");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response=curl_exec($ch);
curl_close($ch);

$ch=curl_init("http://syfyinfo.com/curl_download.php");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response=curl_exec($ch);
curl_close($ch);

$ch=curl_init("http://srujanemani.website/imageupload/curl_download.php");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response=curl_exec($ch);
curl_close($ch);

$ch=curl_init("http://saratvemulapalli.com/curl_download.php");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response=curl_exec($ch);
curl_close($ch);
}


?>