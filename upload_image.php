<?php
    // Get image string posted from Android App
    include 'curl_updateimagedb.php';
	include 'updateimagedb.php';

    $base=$_REQUEST['image'];
    // Get file name posted from Android App
    $filename = $_REQUEST['filename'];
    // Decode Image
    $binary=base64_decode($base);
    header('Content-Type: bitmap; charset=utf-8');
    // Images will be saved under 'www/imgupload/uplodedimages' folder
    $file = fopen('uploads/'.$filename, 'wb');
    // Create File
    fwrite($file, $binary);
    fclose($file);
    //$user_check="naresh";
    //$url="http://www.sasankmacherla.com/uploads/" . $filename;
    echo 'Image upload complete, Please check your php file directory';

	insertimagedb($filename,$url,$user_check);
    replicateimagedb($filename,$url,$user_check);
 


?>