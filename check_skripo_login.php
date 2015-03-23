<?php
/*
	without mysql injection protection version
	
	reference http://www.phpeasystep.com/phptu/6.html
*/

define('DB_HOST','localhost');
define('DB_NAME','temp_skripo');
define('DB_USER','root');
define('DB_PASSWORD','');

$skripo_connect=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);
$db=mysql_select_db(DB_NAME,$skripo_connect);

$username=$_POST['username'];
$password=$_POST['password'];
$tablename="temp_skripo_user";

$sql="SELECT * FROM $tablename WHERE username='$username' AND password='$password'";
$result=mysql_query($sql);
$count=mysql_num_rows($result);
if($result>=1)
{
	echo "welcome " . $username;
}else
{
	echo "Wrong username or password";
}

?>