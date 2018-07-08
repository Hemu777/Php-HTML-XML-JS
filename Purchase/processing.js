/* @author: Hemanth Yagnapu 
   @studenID: 100039130 
   This page helps in processing the items in shopping cart*/

var xHRObject = false;

if (window.XMLHttpRequest)
    xHRObject = new XMLHttpRequest();
else if (window.ActiveXObject)
    xHRObject = new ActiveXObject("Microsoft.XMLHTTP");


function myFunction() 
{
     
	  xHRObject.open("GET", "processing.php",true);
      xHRObject.onreadystatechange = function() {
           if (xHRObject.readyState == 4 && xHRObject.status == 200)
		   {
			   
				
				
				   document.getElementById('information').innerHTML = xHRObject.responseText;
			   
		   }
      xHRObject.send(null); 
	  
	  }
	  
	  
	  
	  xHRObject.open("POST", "processing.php", true);
	xHRObject.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xHRObject.onreadystatechange = getData;
	xHRObject.send();
	 
}

function getData () 
{    
	if ((xHRObject.readyState == 4) &&(xHRObject.status == 200))   
	{    
		
			var div = document.getElementById('information');
		div.innerHTML = xHRObject.responseText;
	
		
    }
} 



function process() 
{
     
	 	  xHRObject.open("GET", "mprocess.php",true);
      		xHRObject.onreadystatechange = function() {
           if (xHRObject.readyState == 4 && xHRObject.status == 200)
		   {

				   document.getElementById('information1').innerHTML = xHRObject.responseText;
			   
		   }
      xHRObject.send(null); 
	  
	  }
	  
	  
	  
	  xHRObject.open("POST", "mprocess.php",true);
	xHRObject.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xHRObject.onreadystatechange = getData4;
	xHRObject.send();
	 
}

function getData4 () 
{    
	if ((xHRObject.readyState == 4) &&(xHRObject.status == 200))   
	{    
		
			var div = document.getElementById('information1');
						div.innerHTML = xHRObject.responseText;
	
		
    }
} 



