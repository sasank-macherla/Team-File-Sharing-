<?php
session_start();
if(isset($_SESSION['user'])!="")
{
	
	header("Location: home.php");
	
	
}
include_once 'dbconnect.php';
include_once '\ReCaptcha\ReCaptcha.php';
include_once '\ReCaptcha\RequestMethod\Post.php';
include_once '\ReCaptcha\Response.php';
include_once '\ReCaptcha\RequestMethod.php';
include_once '\ReCaptcha\RequestParameters.php';

include_once 'ReCaptcha.php';

if(isset($_POST['btn-signup']))
{
	$uname = mysql_real_escape_string($_POST['uname']);
	$email = mysql_real_escape_string($_POST['email']);
	$upass = md5(mysql_real_escape_string($_POST['pass']));
	$phoneno1 = mysql_real_escape_string($_POST['phone']);
	 
	
 

       
 
   
	if (!empty($uname)&& !empty($upass)) {
	$uLen = strlen($uname);
	$pLen = strlen($upass);
	
	$sql = "SELECT username FROM userinfo WHERE username = '" . $uname . "' LIMIT 1"; 
	
	$query = mysql_query($sql) or trigger_error("Query Failed: " . mysql_error());
	
	if ($uLen <= 4 || $uLen >= 20) { ?>
	
	<script>alert('Username must be between 4 and 20 characters');</script>
	<?php
	} elseif ($pLen < 6) { ?>
	
	<script>alert('Password must be longer then 6 characters');</script>
	<?php
	} elseif (mysql_num_rows($query) == 1) { ?>
	
	<script>alert('Username already exists');</script>
	
	<?php
    	} else {
    	if((isset($_POST['g-recaptcha-response'])&& $_POST['g-recaptcha-response']))
    	{
        
     // var_dump($_POST);
        $secret = "6LcgVAYTAAAAALGFOVhkzo_FLUpirzGnUTtUka-T";
        $ip = $_SERVER['REMOTE_ADDR'];
        $captcha = $_POST['g-recaptcha-response'];
        $rsp  = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha&remoteip$ip");
      // var_dump($rsp);
        $arr = json_decode($rsp,TRUE);
        if($arr['success']){ ?>
            <script>alert('ReCaptcha entered correctly');</script>
           
           
            <?php
             $verify=0;
      $code=rand (1000,9999);
      $sql = "INSERT INTO userinfo(username,email,password,verify,code,phoneno) VALUES('$uname','$email','$upass','$verify','$code','$phoneno1')"; 
       
      $query = mysql_query($sql) or trigger_error("Query Failed: " . mysql_error()); 
       
      if ($query) { 
         
        $to =$email;
	$subject = "Verification Code from Photosmart App";	
	$txt = "Your verification code is " . $code;
	$headers = "From: admin@sasankmacherla.com";

	mail($to,$subject,$txt,$headers);
	$res=mysql_query("SELECT * FROM userinfo WHERE username='$uname'");
	$row=mysql_fetch_array($res);
	
        $_SESSION['user'] = $row['user_id'];
	
        ?>
        <script>alert('Registered successfully! Press Enter the verification code sent to your email');
         window.location="verify.php";
        </script>
        
       <?php }
        }else{ ?>
            <script>alert('Please enter the ReCaptcha');</script>
            <?php
        }
        
    }
    	
  }      	
    	
      
     
        
	 
     }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Photo Smart App Registration</title>
<link rel="stylesheet" href="style.css" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>
<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
<center>
<div id="head"> Welcome to Photo Smart App <br> Register to have fun!!! </div> 
<div id="login-form">
<form method="post">
<table align="center" width="40%" border="0">
<tr>
<td><p id="p">Username:</p></td>
<td><input type="text" name="uname" placeholder="username" required /></td>
</tr>
<tr>
<td><p id="p">Email:</p></td>
<td><input type="email" name="email" placeholder="Your Email" required /></td>
</tr>
<tr>
<td><p id="p">Contact:</p></td>
<td><input type="tel" name="phone" placeholder="Your Phone No." required /></td>
</tr>
<tr>
<td><p id="p">Password:</p></td>
<td><input type="password" name="pass" placeholder="Your Password" required /></td>
</tr>
<tr>
<td colspan="2" align="center"><div class="g-recaptcha" data-sitekey="6LcgVAYTAAAAAMV-Zqmik_juCkZZChWmSzxqjOCd"></div></td>
</tr>
<tr>
<td colspan="2" align="center"><button type="submit" name="btn-signup">Register</button></td>
</tr>

</table>
</form>

</div>
</center>
</body>
</html>