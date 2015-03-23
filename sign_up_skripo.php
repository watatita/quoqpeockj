<?php
define('DB_HOST','localhost');
define('DB_NAME','temp_skripo');
define('DB_USER','root');
define('DB_PASSWORD','');

$skripo_connect=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD);
$db=mysql_select_db(DB_NAME,$skripo_connect) or die("failed to connect to mysql" . mysql_error());

function new_user()
{
	$nama		= $_POST['nama'];
	$username	= $_POST['username'];
	$email		= $_POST['email'];
	$password	= $_POST['password'];
	$querry		= "INSERT INTO temp_skripo_user (username,nama,password,email) VALUES ('$username','$nama','$password','$email')";
	$data		= mysql_query($querry);
	if($data)
	{
		echo "Selamat " . $username . ", anda terdaftar dalam Skripo";
	}
}

function SignUp()
{
	if(!empty($_POST['username']))
	{
		$querry = mysql_query("SELECT * FROM temp_skripo_user WHERE username = '$_POST[username]'") or die(mysql_error());
		if(!$row=mysql_fetch_array($querry))
		{
			new_user();
		}else
		{
			echo "Maaf, username anda sudah terdaftar";
		}
	}
}

if(isset($_POST['signup_submit']))
{
	SignUp();
}

?>