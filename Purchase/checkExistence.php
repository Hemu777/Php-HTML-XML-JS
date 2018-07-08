<?php
/* @author: Hemanth Yagnapu 
   @studenID: 100039130 
   This page checks if the product available from the xml file*/
session_start();

if($_SESSION["customer"]== "")
{
	echo "redirect";
}


$xmldoc="../../data/goods.xml";
if(file_exists($xmldoc))
{ 
	$val=0;
	$error=0;
	$qty=$_GET['qty'];
	$itemnum=$_GET['itemnum']; 
		if(($_GET['qty'])>0)
	{
		$newQty=$qty - 1;
			
		$fileUpdated=0;

		$xmlInfo = new SplFileInfo($xmldoc);
		if((int) $xmlInfo->getSize() > 0)
		{
			$dom = DOMDocument::load($xmldoc);
			$item = $dom->getElementsByTagName("item");
			//$qtyHold = $dom->getElementsByTagName("qtyOnHold");
			//echo $qtyHold;
			
			foreach($item as $node) 
			{ 
					 
				$itemnumber = $node->getElementsByTagName("itemnum");
				$itemnumber = $itemnumber->item(0)->nodeValue;
				$newQtyOnHold=0;
				
				$newQtyOnHold=$newQtyOnHold+1;
				
				if($itemnumber == $itemnum)
				{
					
					$qty= $node->getElementsByTagName("qty");
					$qty->item(0)->nodeValue= $newQty;
					
					$qtyOnHold= $node->getElementsByTagName("qtyOnHold");
					$oldVal= $qtyOnHold->item(0)->nodeValue;
					$newVal=$oldVal+1;
					$qtyOnHold->item(0)->nodeValue= $newVal;
											
					$dom->save($xmldoc);    
					$fileUpdated="1";

					$xmlDoc = new DomDocument;  
	  				$xmlDoc->load("../../data/goods.xml");  
	  
					
					$xslDoc = new DomDocument;   
	  				$xslDoc->load('ShoppingCart.xsl'); 
	  				$proc = new XSLTProcessor;  
	 	  			$proc->importStyleSheet($xslDoc);

					 echo $proc->transformToXML($xmlDoc);

				}
			}	
		}
			
		if($fileUpdated == 0)
		{
			echo "Unavble to process cart";
		}
	}
		
	else
	{
		echo "Item not for sale";
	}

}

else
{
	 echo "Error";
}
?>