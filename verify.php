<?php
session_start();
include_once 'dbconnect.php';



if(isset($_POST['btn-submit']))
{
	
	$verifycode = $_POST['code'];
	$res=mysql_query("SELECT * FROM userinfo WHERE user_id=".$_SESSION['user']);
	$userRow=mysql_fetch_array($res);
	
	if($userRow['code']==$verifycode)
	{
	$newverify = 1;
	$result = mysql_query("UPDATE userinfo SET verify='$newverify' WHERE user_id=".$_SESSION['user']);
	
	
	?>
	<script>alert('Enjoy your app!!!');
         window.location="home.php";
        </script>
	<?php
	}
	else
	{
		?>
        <script>alert('Incorrect Verification code. Please try again.');</script>
        <?php
	}
	
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Photo Smart App Verification</title>
<link rel="stylesheet" href="style.css" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>
<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
<center>
<div id="head"> Please Enter the verification code to verify your account </div> 
<div id="login-form">
<form method="post">
<table align="center" width="35%" border="0">
<tr>
<td><p id="p">Verification code</p></td>
<td><input type="text" name="code" align="center" placeholder="- - - - " size="2" required /></td>
</tr>
<tr>
<td colspan="2" align="center"><button type="submit" name="btn-submit">Submit</button></td>
</tr>

</table>
</form>
 
</tr>
</div>
</center>
</body>
</html>