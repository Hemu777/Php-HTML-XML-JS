/* @author: Hemanth Yagnapu 
   @studenID: 100039130 
   This page helps in listing goods in the shopping cart*/

var xHRObject = false;

if (window.XMLHttpRequest)
    xHRObject = new XMLHttpRequest();
else if (window.ActiveXObject)
    xHRObject = new ActiveXObject("Microsoft.XMLHTTP");


function saveDetails() 
{

      var item=document.getElementById('item').value;
	  
	  
      var description=document.getElementById('description').value;
      var qty=document.getElementById('qty').value;
      var price=document.getElementById('price').value;
      
	  xHRObject.open("GET", "listing.php?item=" + item+"&description=" + description +"&price=" + price +"&qty=" + qty , true);
      xHRObject.onreadystatechange = function() {
           if (xHRObject.readyState == 4 && xHRObject.status == 200)
		   {
			
				 if(xHRObject.responseText.match("redirect"))
			   {
				   
				  
				   window.location.replace('../Assignment 2/mlogin.html');
			   }
			   else
			   {
					document.getElementById('information').innerHTML = xHRObject.responseText;
			   }
			   
		   }   
		   
		   
               
      }
      xHRObject.send(null); 	 
}
