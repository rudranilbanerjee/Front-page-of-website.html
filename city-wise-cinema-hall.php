<?php
session_start();
$cities=$_POST['cityname'];
$SESSION['cities']=$cities;
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php $SESSION['cities']; ?></title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/moviebookingwebsite/Front-page-stylesheet.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        function closebar()
       {
        var a=document.querySelector(".pop-up");
        a.style.display="none";
       }
       function popupload()
       {
        var a=document.querySelector(".pop-up");
        a.style.display="block";
       }
        function hwopacity()
       {
        var a=document.querySelector(".city-selector");
        a.style.opacity="1";
       }
       function lwopacity()
       {
        var a=document.querySelector(".city-selector");
        a.style.opacity="0.9";
       }
        function menubar()
        {
            var menu=document.querySelector(".menu-bar");
            menu.style.display="block";
            menu.style.left="1185px";
        }

       document.addEventListener('mouseup',function(event){
        var box = document.getElementById('menu');
        var box1= document.getElementById('menu1');
        var box2= document.getElementById('notify');
        var box3= document.getElementById('submenu');
        var box4= document.getElementById('notibar');
        var box5= document.getElementById('account');
        if(event.target == box)
        {
            box.style.display="block";
        }
        else if(event.target.parentNode == box1)
        {
            box.style.display="block";
        }
        else if(event.target.parentNode == box2)
        {
            box.style.display="block";
        }
        else if(event.target.parentNode == box3)
        {
            alert("yes");
            box.style.display="block";
        }
        else if(event.target.parentNode == box4)
        {
            box.style.display="block";
        }
        else if(event.target.parentNode == box5)
        {
            box.style.display="block";
        }
        else
            box.style.display="none";
       });

       function back()
       {
        var navigation=document.querySelector(".navigation-bar");
        var notification=document.querySelector(".notification");
        navigation.style.display="block";
        notification.style.display="none";
       }
       function notification()
       {
        var navigation=document.querySelector(".navigation-bar");
        var notification=document.querySelector(".notification");
        navigation.style.display="none";
        notification.style.display="block";
       }
       var cons=1;
       function submenu()
       {
        cons += cons;
        var submenu=document.querySelector(".sub-menu");
        if(cons===2)
        {
            submenu.style.display="block";
        }
        else
        {
            cons=1;
            submenu.style.display="none";
        }
       }

        let currentScrollPosition = 0;
	   function scrollrightHorizontally(val)
        {
        	var btn1=document.getElementById("btn1");
            var btn2=document.getElementById("btn2"); 
            var btn3=document.getElementById("btn3");
            var btn4=document.getElementById("btn4");
          let scrollAmount = 2385;
          const sCont = document.querySelector(".image-container");
          currentScrollPosition += (val * scrollAmount);
          if(currentScrollPosition===-2385)
          {
            sCont.style.left = currentScrollPosition + "px";
            currentScrollPosition=currentScrollPosition+1135;
            btn1.classList.remove("active");
            btn2.classList.add("active");
            btn3.classList.remove("active");
            btn4.classList.remove("active");
          }
          else if(currentScrollPosition===-3635)
          {
          	sCont.style.left = currentScrollPosition + "px";
          	currentScrollPosition=currentScrollPosition+1125;
          	btn1.classList.remove("active");
            btn2.classList.remove("active");
            btn3.classList.add("active");
            btn4.classList.remove("active");
          }
          else if(currentScrollPosition===-4895)
          {
            sCont.style.left = currentScrollPosition + "px";
            currentScrollPosition=1260;
            btn1.classList.remove("active");
            btn2.classList.remove("active");
            btn3.classList.remove("active");
            btn4.classList.add("active");
          }
          else
          {	
          	sCont.style.left = currentScrollPosition + "px";
            currentScrollPosition=0;
            btn1.classList.add("active");
            btn2.classList.remove("active");
            btn3.classList.remove("active");
            btn4.classList.remove("active");
          }
        }  

        function scrollleftHorizontally(val)
        {
          let scrollAmount = -4895;
          var btn1=document.getElementById("btn1");
          var btn2=document.getElementById("btn2"); 
          var btn3=document.getElementById("btn3");
          var btn4=document.getElementById("btn4");
          const sCont = document.querySelector(".image-container");
          currentScrollPosition += (val * scrollAmount);
          if(currentScrollPosition===-4895)
          {
            sCont.style.left = currentScrollPosition + "px";
            currentScrollPosition=1260;
            btn1.classList.remove("active");
            btn2.classList.remove("active");
            btn3.classList.remove("active");
            btn4.classList.add("active");
              
          }
          else if(currentScrollPosition===-3635)
          {
            
            sCont.style.left = currentScrollPosition + "px";
            currentScrollPosition=currentScrollPosition+6145;
            btn1.classList.remove("active");
            btn2.classList.remove("active");
            btn3.classList.add("active");
            btn4.classList.remove("active");
            
          }
          else if(currentScrollPosition===-2385)
          {
          	
            sCont.style.left = currentScrollPosition + "px";
            currentScrollPosition=currentScrollPosition+6155;
            btn1.classList.remove("active");
            btn2.classList.add("active");
            btn3.classList.remove("active");
            btn4.classList.remove("active");
            
          }
          else
          {
          	
            sCont.style.left = currentScrollPosition + "px";
            currentScrollPosition=0;
             btn1.classList.add("active");
            btn2.classList.remove("active");
            btn3.classList.remove("active");
            btn4.classList.remove("active");
          }
        }

       function fetchcities(str)
        {
          if(str.length==0)
          {
            document.getElementById("cities").innerHTML=" ";
            document.getElementById("cities").style.display="none";
          }
          else
          {
            var req=new XMLHttpRequest();
            req.open("GET","http://localhost/moviebookingwebsite/film-cities.php?searchbox="+str,true);
            req.send();
            req.onreadystatechange=function(){
            if(req.readyState==4 && req.status==200)
            {
              var dropdown=document.getElementById("cities");
              dropdown.style.display="block";
             document.getElementById("cities").innerHTML=req.responseText;
            }
            };
          }
          $(document).on('click','#cities div',function(){
            $('.search-bar').val($(this).text());
            $("#cities").fadeOut();
            var city=$('.search-bar').val();
            var req=new XMLHttpRequest();
            req.open("GET","http://localhost/moviebookingwebsite/city-wise-cinema-hall.php?city="+city,true);
            req.send();
            req.onreadystatechange=function(){
              if(req.readyState==4 && req.status==200)
              {
                x=req.responseText;
                console.log(x);
              }
            }
          });
          $(document).on('click','#cities div',function(){
            document.getElementById("mysearch").submit();
          });
         }
     </script>
</head>
<body>
	<div class="pop-up">
        <div><button id="close" onclick="closebar()">&times;</button></div>
        <form action="http://localhost/moviebookingwebsite/city-wise-cinema-hall.php" method="post" id="mysearch"><div><i class="fa fa-search " style="color:#FF0080; padding:13px 65px; position: absolute; font-size:22px;"></i><input style="font-size:15px;" oninput="fetchcities(this.value)" class="search-bar" type="text" name="cityname" placeholder="Search for your city"><input style="display:none;" type="submit" value="Search"/>
          <div class="dropdown" id="cities">
            <div><a href="**">Hello World</a></div>  
          </div></form>
        </div>
        <div style="color:#FF0080; font-weight:bold; text-align: center; margin:25px;margin-bottom:5px;">Popular Cities</div>
        <div class="block">
            <a style="text-decoration:none;" href="**"><img class="state" src="gate-of-india.png" width="90" height="90"></img><div style="color:black;">Delhi</div></a>
            <a style="text-decoration:none;" href="**"><img class="state" src="india-gate.png" width="90" height="90"></img><div style="color:black;">Mumbai</div></a>
            <a style="text-decoration:none;" href="**"><img class="state" src="bangaluru-icon.png" width="90" height="90"></img><div style="color:black;">Bengaluru</div></a>
            <a style="text-decoration:none;" href="**"><img class="state" src="kolkata-icon.jpg" width="90" height="90"></img><div style="color:black;">Kolkata</div></a>
            <a style="text-decoration:none;" href="**"><img class="state" src="hyderabad-charminar.png" width="90" height="90"><div style="color:black;">Hyderabad</div></img></a>
            <a style="text-decoration:none;" href="**"><img class="state" src="chandigarh-icon.png" width="90" height="90"><div style="color:black;">Chandigarh</div></img></a>
            <a style="text-decoration:none;" href="**"><img class="state" src="chennai-icon.png" width="90" height="90"><div style="color:black;">Chennai</div></img></a>
            <a style="text-decoration:none;" href="**"><img class="state" src="Ahmedabad-icon.jfif" width="90" height="90"><div style="color:black;">Ahmedabad</div></img></a>
            <a style="text-decoration:none;" href="**"><img class="state" src="kochi-icon.png" width="90" height="90"><div style="color:black;">Kochi</div></img></a>
        </div>
        <div style="margin-bottom:15px;"><a style="color:#FF0080; text-decoration:none; font-weight:bold; text-align: center;" href="**">View all cities</a></div>
    </div>
    <div class="menu-bar" id="menu">
        <div style="padding-top: 14px;" class="first-content" id="menu1">
            <div style="display: inline-flex;">
                <div style="color:#F5F5F5; font-weight: 30px; font-size:20px; margin-top:5px;">Hey!</div>
                <a style="text-decoration: none;" href="http://localhost/moviebookingwebsite/sign-up-page.php"><div style="width:130px; height: 45px; border:solid #FF0080 2px; border-radius:7px; margin-left:150px; background-color:#E0E0E0; padding-top:10px; cursor:pointer;">
                    <div style="color:#FF0080;text-align: center; font-size: 16px; font-weight: 20px;">Log in/Register</div>
                </div></a>
            </div>
        </div>
     <div class="notification" id="notibar">
         <div class="back-button" id="submenu" onclick="back()"><i style="color:#FF0080; font-size:16px; " class="fa fa-angle-left"></i> Back</div>
     </div>
     <div class="navigation-bar"> 
        <div class="next-content" id="notify" onclick="notification()">
            <div style="font-size: 17px;margin-top:5px; ">
             <i style="color:#FF0080; font-size:16px; " class="fa fa-bell-o"></i> Notifications <i class="fa fa-angle-right"></i>
            </div>
        </div>

        <div style="opacity:0.3;" class="next-content" disabled="disabled">
            <div style="font-size: 17px;margin-top:5px; ">
            <i style="color:#FF0080; font-size:16px;" class="fa fa-google-wallet" aria-hidden="true"></i> Wallet <i class="fa fa-angle-right"></i>
            </div>
        </div>

        <div class="next-content">
            <div style="font-size: 17px;margin-top:5px; ">
             <i style="color:#FF0080; font-size:16px; " class="fa fa-ticket"></i> Tickets <i class="fa fa-angle-right"></i>
            </div>
        </div>

        <div style="opacity:0.3;" class="next-content" disabled="disabled">
            <div style="font-size: 17px;margin-top:5px; ">
            <i style="color:#FF0080; font-size:16px; " class="fa fa-money"></i> Purchase History <i class="fa fa-angle-right"></i>
            </div>
        </div>

        <div class="next-content">
            <div style="font-size: 17px;margin-top:5px; ">
            <i style="color:#FF0080; font-size:16px; "class="fa fa-comments-o"></i> Help & Support <i class="fa fa-angle-right"></i>
            </div>
        </div>

        <div style="opacity:0.3;" disabled="disabled" class="next-content" id="account">
            <div style="font-size: 17px;margin-top:5px;" onclick="submenu()">
            <i style="color:#FF0080; font-size:16px; "class="fa fa-cog"></i> Account & Setting <i class="fa fa-angle-right"></i></div>
        </div>

        <div class="sub-menu">
            <div class="sub-menu1" style="font-size:16px;">My Account</div>
            <div class="sub-menu1" style="font-size:16px;">Saved Payment Method</div>
        </div>

        <div class="next-content">
            <div style="font-size: 17px;margin-top:5px; ">
            <i style="color:#FF0080; font-size:16px; "class="fa fa-shopping-bag"></i> Reward <i class="fa fa-angle-right"></i>
            </div>
        </div>
     </div> 
    </div>
    
    <div class="first-header">
    	<div style="margin-left:10px; margin-top: -15px;"><img src="logo-of-company.jpg" width="250" height="70"><img></div>
    	<div style="margin-left:-70px; margin-top: 0px;"><i class="fa fa-search " style="color:#FF0080; padding:10px 90px; position: absolute; font-size:22px;"></i><input class="search-bar1" style="width: 550px;height:40px; margin-left:80px; padding-left:35px;" type="text" name="searched_city_name"  placeholder="Search for Movies,Events,Plays,Sports and Activities"/></div>
    	<div class="city-selector" onclick="popupload()" onmouseover="hwopacity()" onmouseout="lwopacity()"><div id="change-city">Select your city</div><i class="fa fa-chevron-down" aria-hidden="true"></i></div>
    	<div><a href="http://localhost/moviebookingwebsite/log-in-page.php"><button class="sign-in">Sign in</button></a></div>	
    	<div style="margin-left: 25px;"><i onclick="menubar()" style="color:#FF0080; font-size: 25px;" class="fa fa-bars" aria-hidden="true"></i></div>
    </div>
    <div class="second-header">
    	<div><a href="**">Movies</a></div>
    	<div><a href="**">Stream</a></div>
    	<div><a href="**">Event</a></div>
    	<div><a href="**">Plays</a></div>
        <div><a href="**">Sports</a></div>
        <div><a href="**">Activities</a></div>
        <div><a href="**">Buzz</a></div>
        <div><a style="margin-left: 500px; "class="xyz" href="**">ListYourShow</a></div>
        <div><a href="**">Corporates</a></div>
        <div><a href="**">Offers</a></div>
        <div><a href="**">Gift cards</a></div>
    </div>
    <div class="container">
    	<div class="image-container">
    	   <div><a href="**"><img style="margin-left:0px;"src="slide2.jpg" width="1250" height="350px"></a></div>
    	   <div><a href="**"><img src="slide3.jpg" width="1250" height="350px"></a></div>
    	   <div><a href="**"><img src="slide4.jpg" width="1250" height="350px"></a></div>
    	   <div><a href="**"><img src="slide5.jpg" width="1250" height="350px"></a></div>
    	   <div><a href="**"><img src="slide2.jpg" width="1250" height="350px"></a></div>
    	   <div><a href="**"><img src="slide3.jpg" width="1250" height="350px"></a></div>
        </div>
        <div class="indicators">
           <span id="btn1" class="active"></span>
           <span id="btn2"></span>
           <span id="btn3"></span>
           <span id="btn4"></span>
        </div>
    	<div><button class="btn-scroll" id="btn-scroll-left" onclick="scrollleftHorizontally(1)"><i class="fa fa-chevron-left"></i></button></div>
        <div><button class="btn-scroll" id="btn-scroll-right" onclick="scrollrightHorizontally(-1)"><i class="fa fa-chevron-right"></i></button></div>
    </div>
    <div class="city-wise-movie-box">
    	<div class="filters">
          <h1>Filters</h1>

    	</div>
    	<div class="movies">
    		<h1>Movies in <?php echo $SESSION['cities']; ?></h1>
    		<div class="language">
    			<div>Hindi</div>
    			<div>English</div>
    			<div>Bengali</div>
    			<div>Tamil</div>
    			<div>Telegu</div>
    		</div>
    		<div class="coming-soon">Coming Soon....</div>
    		<div class="recommended">
    			<h1 style="color:#454545; font-size: 30px; margin-bottom: 20px; padding-left:50px;">Recommended Movies</h1>
    			<div class="image-box">
                   <div class="image-container1">
                   	  <div><a href="**"><img src="slider6.jpg" width="230" height="350px"><div class="img-link">ANEK<div>Action/Political/Thriler</div></div></a></div>
                   </div>
                </div>
    		</div>
    	</div>
    </div>
</body>
</html>