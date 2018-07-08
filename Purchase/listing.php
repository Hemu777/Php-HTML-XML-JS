<?php
/* @author: Hemanth Yagnapu 
   @studenID: 100039130 
   This page lists the goods in shopping cart*/
session_start();
if($_SESSION["managerid"]== "")
{
	echo "redirect";
}
else{
$errorStatus=0;

$itemname=$_GET['item'];
$description=$_GET['description'];
$price=$_GET['price'];
$qty=$_GET['qty'];



 if(empty($_GET['item']))
 {
		$errorStatus=1;
	echo "Item Name is mandatory"."</br>";
	//echo $_SESSION["managerid"]."<br />";
	}
 

if(empty($_GET['description']))
 {
	 $errorStatus=1;
	 echo "Description is mandatory"."</br>";
 } 
  

if($errorStatus == 0)
{
	$managerid=$_SESSION["managerid"];
	$itemnum=uniqid();
	
	// code to insert data to goods.xml

$url="../../data/goods.xml";
						if (file_exists($url)) {
						
						$xmlInfo = new SplFileInfo($url);
							if((int) $xmlInfo->getSize() > 0)
							{
								
								$xml = new SimpleXMLElement("../../data/goods.xml", null, true);
								
								$item = $xml->addChild('item');
								$item->addChild('itemnum', $itemnum);
								$item->addChild('itemName', $itemname);

								$item->addChild('description', $description);
								$item->addChild('price', $price);
								$item->addChild('qty', $qty);
								$item->addChild('qtyOnHold', "0");
								$item->addChild('qtySold', "0");
								$xml->asXML('../../data/goods.xml');
						echo "The item has been listed.";

																

							}
							else
							{
								$doc = new DOMDocument( );
								$doc->formatOutput =true;
								$doc->preserveWhiteSpace =false;

								$ele = $doc->createElement( 'items' );
								$doc->appendChild( $ele );
								
								$doc->save($url);
								
							$xml = new SimpleXMLElement("../../data/goods.xml", null, true);

								$item = $xml->addChild('item');
								$item->addChild('itemnum', $itemnum);
								$item->addChild('itemName', $itemname);
								$item->addChild('description', $description);
								$item->addChild('price', $price);
								$item->addChild('qty', $qty);
								$item->addChild('qtyOnHold', "0");
								$item->addChild('qtySold', "0");
								$xml->asXML('../../data/goods.xml');
						echo "The item has been listed.";
}
														

						}
						else
						{

							$doc = new DOMDocument( );
							$doc->preserveWhiteSpace =false;
								$doc->formatOutput =true;

							$ele = $doc->createElement( 'items' );
							$doc->appendChild( $ele );
							
							$doc->save($url);
							$xml = new SimpleXMLElement("../../data/goods.xml", null, true);

								$item = $xml->addChild('item');
								$item->addChild('itemnum', $itemnum);
								$item->addChild('itemName', $itemname);
								$item->addChild('description', $description);
								$item->addChild('price', $price);
								$item->addChild('qty', $qty);
								$item->addChild('qtyOnHold', "0");
								$item->addChild('qtySold', "0");
								$xml->asXML('../../data/goods.xml');
						echo "The item has been listed";
						}
							
	
}	
}

?>