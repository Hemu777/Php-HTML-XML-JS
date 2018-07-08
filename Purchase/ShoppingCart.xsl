<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:date="http://exslt.org/dates-and-times" extension-element-prefixes="date"  xsl:extension-element-prefixes="php" xmlns:php="http://php.net/xsl"> 

   <xsl:output method="html" indent="yes" version="4.0"/>  
 <xsl:template match="/">     
 <HTML>       
<HEAD>        
<TITLE> Shopping Cart</TITLE>   
</HEAD>           
<BODY> 
<table  align="center"  width="400"  height= "150" style="background-color:white;" margin="50px" border="1"> 
<tr><td><b><center>Item Number</center></b></td><td><b><center>Price</center></b></td><td><b><center>Quantity</center></b></td><td><b><center>Remove</center></b></td></tr>
<xsl:for-each select="/items/item">
 <xsl:variable name="i" select="position()" />

<xsl:variable name="qtyOnHold" select="qtyOnHold" />

<xsl:choose>
 <xsl:when test="$qtyOnHold&gt; 0">
   	

		<tr><td>	<span id="itemnum{$i}"> <xsl:value-of select="itemnum"/> </span></td> 
		<td>		<span id="price{$i}"> <xsl:value-of select="price"/> </span></td>
		<td>		<span id="qtyOnHold{$i}"> <xsl:value-of select="qtyOnHold"/></span></td>
		<td>		<center><input type="button" value="Remove From Shopping Cart" onclick="remove({$i});"></input></center></td></tr>
		
		
		</xsl:when>
</xsl:choose>
          </xsl:for-each> </table> 
		<table  align="center"  width="400"  height= "100" style="background-color:white;" margin="50px" border="1"> 

			<tr><td><b><center><xsl:text>Total cost:</xsl:text></center></b></td><td><b><center>Price </center></b></td></tr>

			<tr><td><b><center><input type="button" value="Confirm" onclick="confirmPurchase()"/></center></b></td><td><b><center><input type="button" value="Cancel" onclick="cancelPurchase()"/></center></b></td></tr>

		
			

	</table>	

	</BODY>     
   </HTML>   
  </xsl:template>
</xsl:stylesheet> 