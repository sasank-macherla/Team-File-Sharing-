<?php
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['user']))
{
	header("Location: index.php");
	
}
$res=mysql_query("SELECT * FROM userinfo WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);
$fetch="SELECT verify FROM userinfo WHERE username = '$userRow[username]'";
	$result=mysql_query($fetch);
	$row = mysql_fetch_assoc($result);
	if($row["verify"]==0)
	{
	header("Location: verify.php");
	}
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome - <?php echo $userRow['username']; ?></title>
<link rel="stylesheet" href="style.css" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>
</head>
<body>
<div id="header">
	<div id="left">
    <label><b>Photo Smart App</b></label>
    </div>
    <div id="right">
    	<div id="content">
        	Welcome <?php echo $userRow['username']; ?>&nbsp;&nbsp;<a href="logout.php?logout"><b>Sign Out</b></a>
        </div>
    </div>
</div>

<ul>
  <li><a id = "link" href="home.php">Home</a></li>
  <li><a id = "link" href="draganddrop.php">Upload</a></li>
  <li><a id = "link" href="index1.php">Take a Photo</a></li>
  <li><a id = "link" href="demo.php">Gallery</a></li>
  <li><a id = "link" href="slideshow.php">Slideshow</a></li>
  <li><a id = "link" href="search.php">Search</a></li>
</ul>
<div id="body">
	<p>This application is about uploading images to your server.You can choose a picture from your computer/Drag and Drop or take a photo using your webcam. This application also has Gallery and Slide Show. <br />
    
</div>

</body>
</html>