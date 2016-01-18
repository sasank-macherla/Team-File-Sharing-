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



<html lang="en">
<head>
<title>Slideshow</title>
 

<link rel="stylesheet" href="style.css" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>
 

<style>


.fadein img {
    position: absolute;
    left: 400px;
    right: 300px;
    top: 200px;
    z-index: -1;
}


 
</style>
 
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
<div class="fadein">
<?php
mysql_connect("localhost","host","sasank");
mysql_select_db("sasankdb");
$res=mysql_query("select * from imageinfo");
echo "<center>";
echo "<table>";
while($row=mysql_fetch_array($res))
{ 

echo "<tr>";
echo "<td>";?> <img src="<?php echo $row["filepath"]; ?>" height="450" width="550"/> <?php echo "</td>";
  
echo "</tr>";

}
echo "</table>";
echo "</center>";

 
?>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script type="text/javascript">
$(function() {
  $('.fadein img:gt(0)').hide();

  setInterval(function () {
    $('.fadein :first-child').fadeOut()
                             .next('img')
                             .fadeIn()
                             .end()
                             .appendTo('.fadein');
  }, 1000); // 4 seconds
});
</script>

</body>
</html>