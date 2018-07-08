
<?php
/* @author: Hemanth Yagnapu 
   @studenID: 100039130 
   This page helps in deleting items*/
session_start();

if($_SESSION["customer"]== "")
{
	echo "redirect";
}
//Loading XML file
//retrieving data and working and updating it


$xmldoc="../../data/goods.xml";
if(file_exists($xmldoc))
{ 
	$val=0;
	$error=0;
	$qtyOnHold=$_GET['qtyOnHold'];
	$itemnum=$_GET['itemnum']; 
	$newVal=0;
	if(($_GET['qtyOnHold'])>0)
	{
		$fileUpdated=0;
		$xmlInfo = new SplFileInfo($xmldoc);
		if((int) $xmlInfo->getSize() > 0)
		{
			$dom = DOMDocument::load($xmldoc);
			$item = $dom->getElementsByTagName("item");
			foreach($item as $node) 
			{ 
					 
				$itemnumber = $node->getElementsByTagName("itemnum");
				$itemnumber = $itemnumber->item(0)->nodeValue;
				if($itemnumber == $itemnum)
				{
					$qty= $node->getElementsByTagName("qty");
					$oldqty=$qty->item(0)->nodeValue;
					$qtyOnHold= $node->getElementsByTagName("qtyOnHold");
					$oldVal= $qtyOnHold->item(0)->nodeValue;
					$newQty=$oldVal+$oldqty;
					$qty->item(0)->nodeValue= $newQty; //updating quantity avalble
					
					$qtyOnHold= $node->getElementsByTagName("qtyOnHold");
					$qtyOnHold->item(0)->nodeValue= $newVal; //updating quantity on hold
			
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
	}
			
		if($fileUpdated == 0)
		{
			echo "Sorry could not process your cart";
		}


	}

else
{
	 echo "Error Loading Page ";
}

?>