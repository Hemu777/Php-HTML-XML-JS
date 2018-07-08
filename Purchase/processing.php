
<?php 
/* @author: Hemanth Yagnapu 
   @studenID: 100039130 
   This page deals with processing items*/ 
session_start();
if($_SESSION["managerid"]== "")
{
	echo "redirect";
}


$xmldoc="../../data/goods.xml";
if(file_exists($xmldoc))
{ 

	$xmlInfo = new SplFileInfo($xmldoc);
	if((int) $xmlInfo->getSize() > 0)
	{
		$xmlDoc = new DomDocument;  
	  	$xmlDoc->load("../../data/goods.xml");  
	  
	  	$xslDoc = new DomDocument;   
	  	$xslDoc->load('processing.xsl'); 
	  	$proc = new XSLTProcessor;  
	 	  	$proc->importStyleSheet($xslDoc);

	 	echo $proc->transformToXML($xmlDoc); 
		} 
	 else
 	{
	 	echo "No Goods Available to be Bought";
 	}

 }
 
 else
 {
	 echo "Error ";
 }
?>  