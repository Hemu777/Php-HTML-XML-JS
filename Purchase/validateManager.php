<?php
/* @author: Hemanth Yagnapu 
   @studenID: 100039130 
   This page validates Manager's credentials*/
session_start();
$_SESSION['managerid']="";
$path = '../../data/ManagerCredentials.txt';
$error=1;
 if(!empty($_GET['mid']) && !empty($_GET['pwd']) )
 {
	 if (file_exists($path)) {
    	$contents = file_get_contents($path);
    	$contents = explode("\n", $contents);

    	$users = array();
	
    	foreach ($contents as $value) {
        $user = explode(',', $value);
        if($user[0] == $_GET['mid'] && $user[1] == $_GET['pwd'] )
	{
		$_SESSION["managerid"]=$user[0];
		$error=0;
		echo"redirect";
	}
	}
	 }
    if($error == 1)
	{
		echo "Invalid Credentials";
	}
	 
	 
 }
 
 ?>