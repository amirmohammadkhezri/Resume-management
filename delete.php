<?php
	include_once 'functions.php';
	$id=$_GET['id'];
	$connection=config();
	$sql1="SELECT * FROM folder WHERE id='$id'";
	$result=mysqli_query($connection,$sql);
	$row=mysqli_fetch_assoc($result);
	$folder="uploader/".$row['name'];
	$file=$row['pivast'];

	unlink($file);
	rmdir($folder);
	$sql="DELETE FROM folder WHERE id='$id'";
	mysqli_query($connection,$sql);
	header("location:addFolder.php");


	?>
