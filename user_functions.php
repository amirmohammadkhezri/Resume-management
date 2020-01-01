<?php
include_once 'functions.php';
function user_login($data){
    $connection=config();
    $sql="SELECT * FROM admin_tbl WHERE username='$data[username]'";
    $row=mysqli_query($connection,$sql);
    $res=mysqli_fetch_assoc($row);
    if($res['password']==$data['password']){
    	$_SESSION['username']=$res['name'];
    	header("location:index.php");
    }
    else{
	    header("location:login.php");
    }
}
?>