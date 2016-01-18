<?php
session_start();
include_once 'dbconnect.php';
include 'updateimagedb.php';
include 'curl_updateimagedb.php';
if(!isset($_SESSION['user']))
{
	header("Location: index.php");
}
$res=mysql_query("SELECT * FROM userinfo WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);
if(isset($GLOBALS["HTTP_RAW_POST_DATA"])){
	$jpg = $GLOBALS["HTTP_RAW_POST_DATA"];
	$img = $_GET["img"];
	$filename = "uploads/img_". mktime(). ".jpg";
	file_put_contents($filename, $jpg);
	//$fileContent = file_get_contents($img,$jpg);
       $file = "img_". mktime(). ".jpg";
       $filestring=str_replace(' ', '%20', $file);
       $url="http://www.sasankmacherla.com/uploads/"."$filestring";
        insertimagedb($file,$url,$userRow['username']);
        replicateimagedb($file,$url,$userRow['username']);
} else{
	echo "Encoded JPEG information not received.";
}
?>


