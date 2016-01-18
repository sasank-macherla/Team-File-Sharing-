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


<!DOCTYPE html>
<html>
<head>
<title> Gallery </title>
<meta http-equiv="Content-Type" content="text/html"; charset="iso-8859-1">
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
  <li><a id = "link" href="retrieve.php">Gallery</a></li>
  <li><a id = "link" href="slideshow.php">Slideshow</a></li>
  <li><a id = "link" href="search.php">Search</a></li>
</ul>




<?php
mysql_connect("localhost","host","sasank");
mysql_select_db("sasankdb");
$res=mysql_query("select * from imageinfo");
echo "<table>";
while($row=mysql_fetch_array($res))
{
echo "<tr>";
echo "<td>"; echo $row["filename"]; echo "</td>";
echo "<td>";?> <img src="<?php echo $row["filepath"]; ?>" height="100" width="100"> <?php echo "</td>";

echo "</tr>";

}
echo "</table>";
?>
</body>
</html>