<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:date="http://exslt.org/dates-and-times" extension-element-prefixes="date"  xsl:extension-element-prefixes="php" xmlns:php="http://php.net/xsl"> 

   <xsl:output method="html" indent="yes" version="4.0"/>  

   <xsl:template match="/">     
   
   <HTML>       
	<HEAD>        
<TITLE> Shopping Catalog</TITLE>   
</HEAD>           
<BODY> 
<table  align="center"  width="1000"  height= "75" style="background-color:white;" margin="50px" border="1"> 
<tr><td><b><center>Item Number</center></b></td>
<td><b><center>ItemName</center></b></td>
<td><b><center>Price</center></b></td>
<td><b><center>Quantity Available</center></b></td>
<td><b><center>Quantity Hold</center></b></td>
<td><b><center>Quantity Sold</center></b></td></tr>

<xsl:for-each select="/items/item">
 <xsl:variable name="i" select="position()" />

<xsl:variable name="qtySold" select="qtySold" />

<xsl:choose>
 <xsl:when test="$qtySold&gt; 0">
   	

		<tr><td>	<span id="itemnum{$i}"> <xsl:value-of select="itemnum"/> </span></td> 
		<td>		<span id="itemName{$i}"> <xsl:value-of select="itemName"/> </span></td>
		<td>		<span id="price{$i}"> <xsl:value-of select="price"/> </span></td>
		<td>		<span id="qty{$i}"> <xsl:value-of select="qty"/></span></td>
		<td>		<span id="qtyOnHold{$i}"> <xsl:value-of select="qtyOnHold"/></span></td>
		<td>		<span id="qtySold{$i}"> <xsl:value-of select="qtySold"/></span></td></tr>
		
		
		</xsl:when>
	</xsl:choose>
          </xsl:for-each>  	
	</table>
	<table  align="center"  width="1000"  height= "50" style="background-color:white;" margin="50px" border="1">
		<tr><td><b><center><input type="button" value="Process" onclick="process()"/></center></b></td></tr>
	</table>	
	</BODY>     
   </HTML>   
  </xsl:template>
</xsl:stylesheet> 



			
			
   
	
	