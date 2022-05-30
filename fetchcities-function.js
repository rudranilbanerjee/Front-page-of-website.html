function fetchcities(str)
{
	 if(str.length==0)
	 {
       document.getElementById("cities").innerHTML=" ";
	 }
	 else
	 {
	   var req=new XMLHttpRequest();
	   req.open("GET","http://localhost/moviebookingwebsite/film-cities.php?searchbox="+str,true);
	   req.send();
	   req.onreadystatechange=function(){
         if(req.readyState==4 && req.status==200)
         {
     	  document.getElementById("cities").innerHTML=req.responseText;
         }
	   };
     }
}
