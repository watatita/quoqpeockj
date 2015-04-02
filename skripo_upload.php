<?php
$target_dir	="uploads/";
$target_file=$target_dir . basename($_FILES["skripoFileUpload"]["name"]);
$uploadOk=1;
$imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);
if(isset($_POST["uploadSubmit"]))
{
	$check=getimagesize($_FILES["skripoFileUpload"]["tmp_name"]);
	if($check!==false)
	{
		$uploadOk=1;
	}else
	{
		$uploadOk=0;
	}
}
if(file_exists($target_file))
{
	echo "file already exist";
	$uploadOk=0;
}

if($uploadOk==0)
{
	echo "unable to upload file";
}else
{
	if(move_uploaded_file($_FILES["skripoFileUpload"]["tmp_name"],$target_file))
	{
		echo "your file has been uploaded";
	}else
	{
		echo "sorry, an error has occured while uploading your file";
	}
}
/*
diambil dari
www.w3schools.com/php/php_file_upload.asp

untuk referensi lebih lanjut:
www.w3schools.com/php/php_ref_filesystem.asp

*/
?>