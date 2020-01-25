<?php
session_start();
    function config(){
        $server="localhost";
        $user="root";
        $password="";
        $db="resume";
        $connect=mysqli_connect($server,$user,$password,$db);
		mysqli_set_charset($connect, "utf8");
		mysqli_query($connect,"SET NAMES 'utf8'");
        return $connect;
    }
	function addmenu($data,$to){
	$connection=config();
    $sql="INSERT INTO menu_tbl (fullname,introNamber,run,pivast,tel,gender) VALUES('$data[fullname]','$data[introNamber]','$data[run]','$to','$data[tel]','$data[gender]')";
	mysqli_query($connection,$sql);
	}
?>