<?php
/* @author: Hemanth Yagnapu 
   @studenID: 100039130 
   This page validates Registration detalis*/
session_start();
$_SESSION["customer"] = "";

$error=0;
$customer_array =array();

 if(empty($_GET['fname']))
 {
	 echo "Enter your First Name"."</br>";
	 $error=1;
 }
 
 if(empty($_GET['lname']))
 {
	 $error=0;
	 echo "Enter your Last Name"."</br>";
	 
 } 

if (empty($_GET["password"])) 
{
	$error=0;

   	echo "Password required"."</br>";

 } 
else 
{
	if (empty($_GET["confirmPassword"])) 
	{	$error=0;

    		echo "Confirm password required"."</br>";
		$cp = $_GET["confirmPassword"];
		echo $cp;

 	 } 
	else
	{
	$cp = $_GET["confirmPassword"];
    	$password = $_GET["password"];
		
				if ($password!=$cp)
				{   $error=1;

      						echo "Confirm Password does not match with the Password"."</br>";
		 		}
	}
}
	

if(!empty($_GET['contact']))
 {
	$contact = $_GET["contact"];
					if(!preg_match("/^[0-9]{10}$/", $contact))
					{
					//checking the input format of the phone number
						$error=1;
					echo "Invalid Phone Number"."</br>";					
				}
 } 
if(empty($_GET['email']))
 {
	$error=0;
	 echo "Please enter email address"."</br>";
 } 
if(!empty($_GET['email']))
 {
	 
	
	 if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$_GET['email']))
	 {
		 $error=1;
		 echo "Invalid Email"."</br>";
		 
	 }
 
 else {
 
 //Creating XML file if it doesn't exist else add new customers
//adding parent and child


 $emailid=$_GET['email'];
		
		$xmlFile = '../../data/customer.xml';
		 $HTML = "";
		 $dom=null;
		 $temp=null;
					$url="../../data/customer.xml"; //XML file 
					if (file_exists($url)) {
						 
						$xmlInfo = new SplFileInfo($xmlFile);
						if((int) $xmlInfo->getSize() > 0)
						{
							$dom = DOMDocument::load($xmlFile);
							
							$tag=$dom->getElementsByTagName('Customers')->item(0);
								if($tag->hasChildNodes())
								{
									$temp = $dom->getElementsByTagName("Customer"); 
									 // checking if registered email ID is already present in database
									foreach($temp as $node) 
									{ 
										 $email = $node->getElementsByTagName("email");
										 $email = $email->item(0)->nodeValue;
								  
										if($email == $emailid)
										{
											
											echo "Email address is already registered"."</br>";
											$error=1;
										}		
									}
								}
									
							
						}
						else{
						
						$doc = new DOMDocument( );
						$doc->preserveWhiteSpace =false;
						$doc->formatOutput =true;

						$ele = $doc->createElement( 'Customers' );
						$doc->appendChild( $ele );
						
						$doc->save($url);
					}
		
					
					}
					else{
						
						$doc = new DOMDocument( );
						$doc->formatOutput =true;
						
						$doc->preserveWhiteSpace =false;
						$ele = $doc->createElement( 'Customers' );
						$doc->appendChild( $ele );
						
						$doc->save($url);
					}
		
 }
 
 }
 
 if($error==0)
 {
	 
	  	
				if(!empty($_GET['email']) && !empty($_GET['fname']) && !empty($_GET['lname']))
				{
					//Generates a unique customer id
					$customer_id=uniqid();

					$fname=$_GET['fname'];
					$lname=$_GET['lname'];
					$email=$_GET['email'];
					$pass = $_GET["password"];
										
					//storing values in session
					$customer_array["id"]=$customer_id;
					$customer_array["fname"]=$fname;
					$customer_array["lname"]=$lname;
					$customer_array["email"]=$email;
					$customer_array["password"]=$pass;
					//$customer_array["contact"]=$contact;
					$_SESSION["customer"]=$customer_array;
					//checks if xml already exist
					$url="../../data/customer.xml";
						if (file_exists($url)) {
						
						$xmlInfo = new SplFileInfo($url);
							if((int) $xmlInfo->getSize() > 0)
							{
								
								$xml = new SimpleXMLElement("../../data/customer.xml", null, true);

								$book = $xml->addChild('Customer');
								$book->addChild('id', $customer_id);
								$book->addChild('fname', $fname);
								$book->addChild('lname', $lname);
								$book->addChild('email', $email);
								$book->addChild('password', $pass);
								//$book->addChild('contact', $contact);

								$xml->asXML('../../data/customer.xml');
								echo "Sucessfully Registered";

							}
							else
							{
								$doc = new DOMDocument( );
								$doc->formatOutput =true;
								$doc->preserveWhiteSpace =false;

								$ele = $doc->createElement( 'Customers' );
								$doc->appendChild( $ele );
								
								$doc->save($url);
								
								$xml = new SimpleXMLElement("../../data/customer.xml", null, true);

								$book = $xml->addChild('Customer');
								$book->addChild('id', $customer_id);
								$book->addChild('fname', $fname);
								$book->addChild('lname', $lname);
								$book->addChild('email', $email);
								$book->addChild('password', $pass);
								$book->addChild('contact', $contact);


								$xml->asXML('../../data/customer.xml');
								echo "Sucessfully Registered";
							}
							
						}
						else
						{

							$doc = new DOMDocument( );
							$doc->preserveWhiteSpace =false;
								$doc->formatOutput =true;

							$ele = $doc->createElement( 'Customers' );
							$doc->appendChild( $ele );
							
							$doc->save($url);
							
							$xml = new SimpleXMLElement("../../data/customer.xml", null, true);

							$book = $xml->addChild('Customer');
							$book->addChild('id', $customer_id);
							$book->addChild('fname', $fname);
							$book->addChild('lname', $lname);
							$book->addChild('email', $email);
							$book->addChild('password', $pass);
							$book->addChild('contact', $contact);

							$xml->asXML('../../data/customer.xml');
							chmod('customer.xml',0755);
							echo "Sucessfully Registered";

							
						}
						
					
							
					}
			}
			
	
		
	 
 


?>