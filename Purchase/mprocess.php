
<?php
/* @author: Hemanth Yagnapu 
   @studenID: 100039130 
   This page processess the manager login*/

session_start();
if($_SESSION["managerid"]== "")
{
	echo "redirect";
}


$xmldoc="../../data/goods.xml";
if(file_exists($xmldoc))
{ 
	$total=0;
	$newSoldQty=0;
	$error=0;
	$newVal=0;
	$fileUpdated=0;
		$xmlInfo = new SplFileInfo($xmldoc);
		if((int) $xmlInfo->getSize() > 0)
		{
			$dom = DOMDocument::load($xmldoc);
			$item = $dom->getElementsByTagName("item");
			foreach($item as $node) 
			{ 
				
				$qtyHold= $node->getElementsByTagName("qtyOnHold");
				$oldHoldQty= $qtyHold->item(0)->nodeValue;

				$qtySold= $node->getElementsByTagName("qtySold");
				$oldSoldQty= $qtySold->item(0)->nodeValue;

				$qty= $node->getElementsByTagName("qty");
				$oldqty= $qty->item(0)->nodeValue;
				
				//echo $oldHoldQty;

				if($oldSoldQty>0)
				{
					$qtySold= $node->getElementsByTagName("qtySold");

					$qtySold->item(0)->nodeValue= $newVal;
					


				}
					
				if(($oldHoldQty==0)&&($oldqty==0))
				{
	
   					$node->parentNode->removeChild($node);


				}
				$dom->save($xmldoc);  
				$fileUpdated="1";}

		}
		if($fileUpdated==1){
		echo "";
echo "Goods have been processed";
}

		
}

else
{
	 echo "Error";
}
?>	