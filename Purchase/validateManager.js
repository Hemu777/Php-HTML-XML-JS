/* @author: Hemanth Yagnapu 
   @studenID: 100039130 
   This page validates the maganer credentials*/

var xHRObject = false;

if (window.XMLHttpRequest)
    xHRObject = new XMLHttpRequest();
else if (window.ActiveXObject)
    xHRObject = new ActiveXObject("Microsoft.XMLHTTP");



function retrieveInfo() 
{
      var id=document.getElementById('mid').value;
	var pwd=document.getElementById('pwd').value;
	  xHRObject.open("GET", "validateManager.php?mid=" + id+"&pwd=" + pwd, true);
      xHRObject.onreadystatechange = function() {
           if (xHRObject.readyState == 4 && xHRObject.status == 200)
		   {
			   
			   if(xHRObject.responseText.match("redirect"))
			   {
				  
				   window.location.replace('listing.html');
			   }
			   else
			   {
				   document.getElementById('errorinformation').innerHTML = xHRObject.responseText;
			   }
		   }
      }
      xHRObject.send(null); 
	  
		
	 
}









