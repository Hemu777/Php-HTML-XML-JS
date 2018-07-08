
<?php
/* @author: Hemanth Yagnapu 
   @studenID: 100039130 
   This page confirms the purchase of a product*/

session_start();

if($_SESSION["customer"]== "")
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
				
				$qty= $node->getElementsByTagName("qtyOnHold");
				$oldqty= $qty->item(0)->nodeValue;
				$price = $node->getElementsByTagName("price");
				$singlePrice = $price ->item(0)->nodeValue;
				$priceOfProduct=$oldqty * $singlePrice;
				$total+=$priceOfProduct;

				$qtySold= $node->getElementsByTagName("qtySold");
				$oldSoldQty= $qtySold->item(0)->nodeValue;
				$qtyOnHold= $node->getElementsByTagName("qtyOnHold");
				$oldQtyOnHold= $qty->item(0)->nodeValue;
				$newSoldQty=$oldQtyOnHold;
				$qtySold->item(0)->nodeValue= $newSoldQty;

					
				
					$qtyOnHold= $node->getElementsByTagName("qtyOnHold");
					$qtyOnHold->item(0)->nodeValue= $newVal;
		
					$dom->save($xmldoc);    
					$fileUpdated="1";
				
			}

		}
		if($fileUpdated==1){
		echo "";
echo "Purchase Confirmed. Total is $";
echo $total;}

}

else
{
	 echo "Error";
}
?>	