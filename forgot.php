<?php
include_once 'dbconnect.php';
if(isset($_POST['btn-forgot'])) {
	$username=$_POST['uname'];
	$newpass= "XcyZ6";
	$pass = md5($newpass);
	$sql="UPDATE userinfo SET password='$pass' WHERE username='$username'";
	$result=mysql_query($sql) or trigger_error("Query Failed: " . mysql_error());




	$res=mysql_query("SELECT * FROM userinfo WHERE username='$username'");
	$row=mysql_fetch_array($res);
	if($username == $row['username'])
	{
        $to =$row['email'];
	$subject = "Temporary password to login";	
	$txt = "Your temporary password is " . $newpass;
	$headers = "From: admin@sasankmacherla.com";

	mail($to,$subject,$txt,$headers);
	?>
	<script>alert('Temporary password is sent to your email');
         window.location="index.php";
        </script>
        <?php
	} else 
	{ ?>
	<script>alert('Please enter the correct username');</script>
         
        <?php
	
	}

}



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Password reset</title>
<link rel="stylesheet" href="style.css" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>
</head>

<body>

<center>
<div id="hea"> Enter your username here  </div>
<div id="login-form">
<form method="post">
<table align="center" width="30%" border="0">
<tr>
<td><input type="username" name="uname" placeholder="Your username" required /></td>
</tr>
<tr>

<td align="center"><button type="submit" name="btn-forgot" >Submit</button></td>
</tr>
<tr>
</table>
</form>
</div>
</center>

</body>
</html>