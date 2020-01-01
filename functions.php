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
    $sql="INSERT INTO menu_tbl (firstname,lastname,run,pivast,tel) VALUES('$data[firstname]','$data[lastname]','$data[run]','$to','$data[tel]')";
    
	mysqli_query($connection,$sql);
	}

?>