<?php
	include_once 'functions.php';
	$introNamber=$_GET['id'];
	$generate = (md5(rand(1000, 7800787)));

	$connections=config();
	$sqls="SELECT * FROM folder WHERE hashing LIKE '%$introNamber%'";
	$results=mysqli_query($connections,$sqls);
	$rows=mysqli_fetch_assoc($results);
	$namber = $rows['introNamber'];


	$connection=config();
	$sql = "UPDATE folder SET hashing = '$generate' WHERE hashing LIKE '%$introNamber'";
	mysqli_query($connection, $sql);

	$genarating = $namber.$generate;
	$connection1=config();
	$sql1 = "UPDATE menu_tbl SET introNamber = '$genarating' WHERE introNamber LIKE '%$introNamber%'";
	mysqli_query($connection1, $sql1);

	
	header("location:addFolder.php")

	?>
