<?php
function insertimagedb($filename,$filepath,$user1)
{
$host = "localhost"; 
$user = "host"; 
$pass = "sasank"; 

$r = mysql_connect($host, $user, $pass);
if(!$r)
{

}
else
{

}
if(mysql_select_db("sasankdb"))
{

}
else
{

}
$sql = "INSERT INTO imageinfo (filename,filepath,user) VALUES ( '$filename','$filepath','$user1')";
$retval = mysql_query($sql,$r);
if(! $retval )
{
  die('Could not enter data: ' . mysql_error());
}
//echo "entered data successfully";
mysql_close($r);
}

?>