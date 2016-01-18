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






<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2">
		
		<meta name="description" content="Webcam Photo Booth made with ActionScript 3" />
		<meta name="keywords" content="photo, photo booth, image, flash, actionscript," />
		<title>Take A Photo</title>
		<script src="swfobject.js" language="javascript"></script>
		<link rel="stylesheet" href="style.css" type="text/css" />
		<link href='http://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>
		<script type="text/javascript">
			var flashvars = {};
			
			var parameters = {};
			parameters.scale = "noscale";
			parameters.wmode = "window";
			parameters.allowFullScreen = "true";
			parameters.allowScriptAccess = "always";
			
			var attributes = {};

			swfobject.embedSWF("take_picture.swf", "main", "700", "400", "9", 
					"expressInstall.swf", flashvars, parameters, attributes);
		</script>
		
		<script type="text/javascript">
			var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
			document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
		</script>
		
		<script type="text/javascript">
			var pageTracker = _gat._getTracker("UA-3097820-1");
			pageTracker._trackPageview();
		</script>
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
		<center>
			<div id="main">	
				<div>
					<h1>You need FlashPlayer 9 or higher!</h1>
					<p><a href="http://www.adobe.com/go/getflashplayer"><img 
					src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" 
					alt="Get Adobe Flash player" /></a></p>
				</div>
			</div>
			<br/>
			
		</center>
	</body>
</html>