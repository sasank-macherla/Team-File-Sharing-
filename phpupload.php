<?php
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['user']))
{
	header("Location: index.php");
}
$res=mysql_query("SELECT * FROM userinfo WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);
?>
<?php

//include 'updateimagedb.php';
//include 'curl_updateimagedb.php';


header('Content-Type: application/json');

$uploaded = array();
include 'updateimagedb.php';

if(!empty($_FILES['file']['name'][0])) {
	while(list($position,$name) = each($_FILES['file']['name'])) {
		if(move_uploaded_file($_FILES['file']['tmp_name'][$position], 'uploads/'.$name)) {
		$fileContent = file_get_contents($_FILES['file']['tmp_name']);
       		$filename=$_FILES['file']['name'][$position];
      		$url="http://www.sasankmacherla.com/uploads/"."$filename";
      		$user_check=$userRow['username'];
       		insertimagedb($filename,$url,$user_check);
       		//replicateimagedb($filename,$url,$user_check);
		 $uploaded[] = array(
			'name' => $name,
			'file' => 'uploads/' . $name
			);
		}
	}

}

echo json_encode($uploaded);