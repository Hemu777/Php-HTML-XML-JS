<?php
/* @author: Hemanth Yagnapu 
   @studenID: 100039130 
   This page helps in logging out the session*/
 session_start();
  
  echo "Thank you ";
	echo $_SESSION["managerid"];
 session_destroy();  
 ?>