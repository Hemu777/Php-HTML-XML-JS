
<?php
/* @author: Hemanth Yagnapu 
   @studenID: 100039130 
   This page cancels the purchanse of shopping cart*/

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
	$newVal=0;
	$fileUpdated=0;
//Loading XML file
//retrieving data and working and updating it
		$xmlInfo = new SplFileInfo($xmldoc);
		if((int) $xmlInfo->getSize() > 0)
		{
			$dom = DOMDocument::load($xmldoc);
			$item = $dom->getElementsByTagName("item");
			foreach($item as $node) 
			{ 
					 
				$itemnumber = $node->getElementsByTagName("itemnum");
				$itemnumber = $itemnumber->item(0)->nodeValue;
			
					$qty= $node->getElementsByTagName("qty");
					$oldqty=$qty->item(0)->nodeValue;
					$qtyOnHold= $node->getElementsByTagName("qtyOnHold");
					$oldVal= $qtyOnHold->item(0)->nodeValue;
					$newQty=$oldVal+$oldqty;
					$qty->item(0)->nodeValue= $newQty;//adding hold value to quantiy and updating it

					
					$qtyOnHold= $node->getElementsByTagName("qtyOnHold");
					$qtyOnHold->item(0)->nodeValue= $newVal; //making hold value 0
		
					$dom->save($xmldoc);    
					$fileUpdated="1";
				
			}

		}

}

else
{
	 echo "Error Loading Page ";
}


?>