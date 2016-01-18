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

<meta property="og:image" content="URL" /> 

<title>Gallery</title>
<link rel="stylesheet" type="text/css" href="lightbox/css/jquery.lightbox-0.5.css" />
<link rel="stylesheet" type="text/css" href="demo.css" />
<link rel="stylesheet" href="style.css" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="lightbox/js/jquery.lightbox-0.5.pack.js"></script>
<script type="text/javascript" src="script.js"></script>

</head>

<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

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

<div id="container">

<div id="heading">
<h1>Gallery</h1>
</div>

<div id="gallery">

<?php

$directory = 'uploads';

$allowed_types=array('jpg','jpeg','gif','png');
$file_parts=array();
$ext='';
$title='';
$i=0;

$dir_handle = @opendir($directory) or die("There is an error with your image directory!");

while ($file = readdir($dir_handle)) 
{
	if($file=='.' || $file == '..') continue;
	
	$file_parts = explode('.',$file);
	$ext = strtolower(array_pop($file_parts));

	$title = implode('.',$file_parts);
	$title = htmlspecialchars($title);
	
	$nomargin='';
	
	if(in_array($ext,$allowed_types))
	{
		if(($i+1)%4==0) $nomargin='nomargin';
	
		echo '
		<div class="pic '.$nomargin.'" style="background:url('.$directory.'/'.$file.') no-repeat 50% 50%;">
		<div class="fb-share-button" href="'.$directory.'/'.$file.'" data-layout="button"></div>
		<a href="'.$directory.'/'.$file.'" title="'.$title.'" target="_blank">'.$title.'</a>
		</div>';
		
		$i++;
	}
}

closedir($dir_handle);
?>

<div class="clear"></div>
</div>

</div>

</body>
</html>