/* @author: Hemanth Yagnapu 
   @studenID: 100039130 
   This page validates the login credentials of the customer*/
var xHRObject = false;

if (window.XMLHttpRequest)
    xHRObject = new XMLHttpRequest();
else if (window.ActiveXObject)
    xHRObject = new ActiveXObject("Microsoft.XMLHTTP");



function validateLoginDetails() 
{
      var email=document.getElementById('email').value;
	var password=document.getElementById('password').value;
	  xHRObject.open("GET", "loginValidation.php?email=" + email+"&password=" + password, true);
      xHRObject.onreadystatechange = function() {
           if (xHRObject.readyState == 4 && xHRObject.status == 200)
		   {
			   
			   if(xHRObject.responseText.match("redirect"))
			   {
				  
				   window.location.replace('../Assignment2/buying.html');
			   }
			   else
			   {
				   document.getElementById('information').innerHTML = xHRObject.responseText;
			   }
		   }
      }
      xHRObject.send(null); 
	  
		
	 
}








