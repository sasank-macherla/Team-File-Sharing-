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


<!DOCTYPE HTML>
<html>

<head>
<meta charset="utf-8">
<title>Upload a photo </title>
<link rel="stylesheet" href="style.css" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>


</head>
<body class="home">
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
  <li><a id = "link" href="draganddrop.php" class = "draganddrop">Upload</a></li>
  <li><a id = "link" href="index1.php">Take a Photo</a></li>
  <li><a id = "link" href="demo.php">Gallery</a></li>
  <li><a id = "link" href="slideshow.php">Slideshow</a></li>
  <li><a id = "link" href="search.php">Search</a></li>
</ul>
<div class="container-main">
<h1>Upload Images here</h1><br/>
<p><i>Drop images here or choose to upload</i></p><br/>

<p id="uploads"></p>
<div id="dropzone" class="dropzone">Drop Images here</div>	
<form action="upload.php" method="post" id="myForm" enctype="multipart/form-data">
<input type="file" name="upload[]" id="fileToUpload" multiple="multiple" />
<input type="submit" name="submit" value="Upload">
<input type="reset" value="Reset">
</form>
</div>


<script src ="dro.js"></script>
</body>
</html>
				