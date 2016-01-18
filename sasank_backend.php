<html>
<body>
<?php
$conn = mysql_connect('localhost', 'wolverine', 'sasankmacherla');
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}

mysql_select_db('hostingdb');

if(isset($_POST['agree']))
{
$checkvalue = 'Yes';
} 
else
$checkvalue = 'NO';

$sql = "insert into userinfo (agree,firstname, lastname, gender, suggestion) VALUES ('$checkvalue','$_POST[firstname]','$_POST[lastname]','$_POST[gender]','$_POST[suggestion]')";

if(!mysql_query($sql, $conn))
{
die('Error: ' . mysql_error());
}
$result = mysql_query('SELECT * FROM userinfo ORDER BY id DESC LIMIT 1');
?>
<center><?php echo date("l, F j, Y") ?></center>
<HR>
<p>Thank you</p>
<br /> 
<?php
while($row = mysql_fetch_array($result))
{
  echo $row['firstname'], $row['lastname'];
?>

<p>For suggesting</p>
<?php
  echo $row['suggestion'];

?>

  <br>
<p><? echo "Data from MYSQL Database"; ?> </p>
<table width="400" border="1" cellspacing="0" cellpadding="3"> 
<tr>
<td width ="5%"><b>Agree </b> </td> 
<td width ="15%"><b>First Name</b> </td> 
<td width ="15%"><b>Last Name </b> </td>
<td width ="4%"><b>Gender </b> </td>
<td width ="10%"><b>Suggestion </b> </td>

</tr>

<tr>
<td width = "5%"><? echo $row ['agree'];?></td>	
<td width = "12%"><? echo $row ['firstname'];?></td>
<td width = "12%"><? echo $row ['lastname'];?></td>
<td width = "4%"><? echo $row ['gender'];?></td>
<td width = "10%"><? echo $row ['suggestion'];?></td>
</tr>
<?
}
?>

<?php
mysql_close($conn);
?>
</body>
</html>
