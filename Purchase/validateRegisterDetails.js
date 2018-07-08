/* @author: Hemanth Yagnapu 
   @studenID: 100039130 
   This page validates Registration details*/

var xHRObject = false;

if (window.XMLHttpRequest)
    xHRObject = new XMLHttpRequest();
else if (window.ActiveXObject)
    xHRObject = new ActiveXObject("Microsoft.XMLHTTP");



function validateInformation() 
{
      var id=document.getElementById('email').value;
	var fname=document.getElementById('first').value;
	var sname=document.getElementById('last').value;
	var password=document.getElementById('password').value;
	var confirmPassword=document.getElementById('confirmPassword').value;
	var phone=document.getElementById('phone').value;

	  xHRObject.open("GET", "validateRegisterDetails.php?email=" + id+"&fname=" + fname +"&lname=" +sname+"&password="
	  	+password+"&confirmPassword=" +confirmPassword +"&contact=" +phone, true);
      xHRObject.onreadystatechange = function() {
           if (xHRObject.readyState == 4 && xHRObject.status == 200)
		   {
			   if(xHRObject.responseText.match("redirect"))
			   {
				   window.location.replace('../Assignment2/buying.html');
			   }
			   else
			   {
				   document.getElementById('test').innerHTML = xHRObject.responseText;
			   }
		   }   
		   
               
      }
      xHRObject.send(null); 
	  
		
	 
}








