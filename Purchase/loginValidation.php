<?php
 /* @author: Hemanth Yagnapu 
   @studenID: 100039130 
   This page validates the user login*/
 session_start();
 $_SESSION['customer']="";
 $xmlFile = '../../data/customer.xml';
 
 $customer_array=array();
 if (file_exists($xmlFile)) {
 
 $HTML = "";

 
 
 $dom = DOMDocument::load($xmlFile);
 $temp = $dom->getElementsByTagName("Customer"); 

 if(!empty($_GET['email']) && !empty($_GET['password']) )
 {
	
	 $emailid=$_GET['email'];
     $password1=$_GET['password'];
	 $error=0;
	 foreach($temp as $node) 
	{ 
		 $id = $node->getElementsByTagName("id");
		 $id = $id->item(0)->nodeValue;
	  
		 
		 $email = $node->getElementsByTagName("email");
		 $email = $email->item(0)->nodeValue;
		 
		  $password = $node->getElementsByTagName("password");
		 $password = $password->item(0)->nodeValue;
		if($email == $emailid && $password == $password1)
		{
			
			$error=1;
					 
		 
			
		}		
	
	}  
	
	if($error== 0)
	{
		echo "Invalid Login credentials";
		
	}	
	else
	{
		$fname = $node->getElementsByTagName("fname");
		 $fname = $fname->item(0)->nodeValue;
		 		 
		 $lname = $node->getElementsByTagName("lname");
		 $lname = $lname->item(0)->nodeValue;
		 		 
		 $id = $node->getElementsByTagName("id");
		 $id = $id->item(0)->nodeValue;
			
					$customer_array["id"]=$id;
					$customer_array["fname"]=$fname;
					$customer_array["lname"]=$lname;
					$customer_array["email"]=$emailid;
					$customer_array["password"]=$password;

					$_SESSION["customer"]=$fname;
							echo "redirect";
	}
	
 }	
 else {
	 echo "Fields cannot be empty";
 }
 
 
 }
 else{
	 echo"Registration required"."</br>";
 }
 
 
?>

