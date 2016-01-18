<?php
if(!mysql_connect("localhost","host","sasank"))
{
	die('oops connection problem ! --> '.mysql_error());
}
if(!mysql_select_db("sasankdb"))
{
	die('oops database selection problem ! --> '.mysql_error());
}

?>