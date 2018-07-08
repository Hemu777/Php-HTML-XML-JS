<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:date="http://exslt.org/dates-and-times" extension-element-prefixes="date"  xsl:extension-element-prefixes="php" xmlns:php="http://php.net/xsl"> 

   <xsl:output method="html" indent="yes" version="4.0"/>  

   <xsl:template match="/">     
   
   <HTML>       
	<HEAD>        
<TITLE> Shopping Cart</TITLE>   
</HEAD>           
<BODY> 
<table  align="center"  width="500"  height= "300" style="background-color:white;"  border="1"> 
<tr><td><b><center>Item Number</center></b></td><td><b><center>Name</center></b></td><td><b><center>Description</center></b></td><td><b><center>Price</center></b></td><td><b><center>Quantity</center></b></td><td><b><center>Add</center></b></td></tr>
<xsl:for-each select="/items/item">
 <xsl:variable name="i" select="position()" />

<xsl:variable name="qty" select="qty" />

<xsl:choose>
 <xsl:when test="$qty &gt; 0">
   	

		<tr><td>	<span id="itemnum{$i}"> <xsl:value-of select="itemnum"/> </span></td> 
		<td>		<span id="itemName{$i}"> <xsl:value-of select="itemName"/> </span></td>
		<td>		<span id="description{$i}"> <xsl:value-of select="substring(description/text(),1,20)"/> </span></td>
		<td>		<span id="buyprice{$i}"> <xsl:value-of select="price"/> </span></td>
		<td>		<span id="qty{$i}"> <xsl:value-of select="qty"/></span></td>
		<td>		<center><input type="button" value="Add one to Cart" onclick="checkFile({$i});"></input></center></td></tr>
		
		
		</xsl:when>
	</xsl:choose>
          </xsl:for-each>  	
	</table>	
	</BODY>     
   </HTML>   
  </xsl:template>
</xsl:stylesheet> 



			
			
   
	
	