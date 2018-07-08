/* @author: Hemanth Yagnapu 
   @studenID: 100039130 
   This page helps in processing the goods in shopping cart*/

var xHRObject = false;

if (window.XMLHttpRequest)
    xHRObject = new XMLHttpRequest();
else if (window.ActiveXObject)
    xHRObject = new ActiveXObject("Microsoft.XMLHTTP");


function retrieveInformation() 
{
     
	  xHRObject.open("GET", "goods.php",true);
      xHRObject.onreadystatechange = function() {
           if (xHRObject.readyState == 4 && xHRObject.status == 200)
		   {
			   
				
				
				   document.getElementById('test').innerHTML = xHRObject.responseText;
			   
		   }
      xHRObject.send(null); 
	  
	  }
	  
	  
	  
	  xHRObject.open("POST", "goods.php", true);
	xHRObject.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xHRObject.onreadystatechange = getData;
	xHRObject.send();
	 
}

function getData () 
{    
	if ((xHRObject.readyState == 4) &&(xHRObject.status == 200))   
	{    
		
			var div = document.getElementById('test');
		div.innerHTML = xHRObject.responseText;
	
		
    }
} 


function checkFile(i)
{
	var itemnum=document.getElementById("itemnum"+i).innerHTML;
	
	var qty=document.getElementById("qty"+i).innerHTML;
	  xHRObject.open("GET", "checkExistence.php.php?itemnum="+itemnum+"&qty="+qty , true);
      xHRObject.onreadystatechange = function() {
           if (xHRObject.readyState == 4 && xHRObject.status == 200)
		   {
			   
				
				
				   document.getElementById('test1').innerHTML = xHRObject.responseText;
			   
		   }
      xHRObject.send(null); 
	  
	  }
	  
	  
	  
	  xHRObject.open("POST", "checkExistence.php?itemnum="+itemnum+"&qty="+qty , true);
	xHRObject.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xHRObject.onreadystatechange = getData1;
	xHRObject.send();
	 
}

function getData1 () 
{    
	if ((xHRObject.readyState == 4) &&(xHRObject.status == 200))   
	{    
		
			var div = document.getElementById('test1');
		div.innerHTML = xHRObject.responseText;
	
		
    }
} 

function remove(i)
{
	var itemnum=document.getElementById("itemnum"+i).innerHTML;
	
	var qtyOnHold=document.getElementById("qtyOnHold"+i).innerHTML;
	  xHRObject.open("GET", "removeGoods.php?itemnum="+itemnum+"&qtyOnHold="+qtyOnHold, true);
      xHRObject.onreadystatechange = function() {
           if (xHRObject.readyState == 4 && xHRObject.status == 200)
		   {
			   
				
				
				   document.getElementById('test1').innerHTML = xHRObject.responseText;
			   
		   }
      xHRObject.send(null); 
	  
	  }
	  
	  
	  
	  xHRObject.open("POST", "removeGoods.php?itemnum="+itemnum+"&qtyOnHold="+qtyOnHold, true);
	xHRObject.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xHRObject.onreadystatechange = getData2;
	xHRObject.send();
	 
}

function getData2 () 
{    
	if ((xHRObject.readyState == 4) &&(xHRObject.status == 200))   
	{    
		
			var div = document.getElementById('test1');
		div.innerHTML = xHRObject.responseText;
	
		
    }
} 

//confirm purschase link

function confirmPurchase() 
{
     
	  	  xHRObject.open("GET", "confirmPurchase.php", true);
      xHRObject.onreadystatechange = function() {
           if (xHRObject.readyState == 4 && xHRObject.status == 200)
		   {
			   
				
				
				   document.getElementById('test2').innerHTML = xHRObject.responseText;
			   
		   }
      xHRObject.send(null); 
	  
	  }
	  
	  
	  
	  xHRObject.open("POST", "confirmPurchase.php", true);
	xHRObject.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xHRObject.onreadystatechange = getData3;
	xHRObject.send();
	 
}

function getData3 () 
{    
	if ((xHRObject.readyState == 4) &&(xHRObject.status == 200))   
	{    
		
			var div = document.getElementById('test2');
		div.innerHTML = xHRObject.responseText;
	
		
    }
} 

//cancel purchase link 
function cancelPurchase() 
{
     
	 	  xHRObject.open("GET", "cancelPurchase.php",true);
      		xHRObject.onreadystatechange = function() {
           if (xHRObject.readyState == 4 && xHRObject.status == 200)
		   {

				   document.getElementById('information3').innerHTML = xHRObject.responseText;
			   
		   }
      xHRObject.send(null); 
	  
	  }
	  
	  
	  
	  xHRObject.open("POST", "cancelPurchase.php",true);
	xHRObject.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xHRObject.onreadystatechange = getData4;
	xHRObject.send();
	 
}


function getData4 () 
{    
	if ((xHRObject.readyState == 4) &&(xHRObject.status == 200))   
	{    
		
			var div = document.getElementById('information3');
			alert("Purchase Request Cancelled");
			div.innerHTML = xHRObject.responseText;
	
		
    }
} 



