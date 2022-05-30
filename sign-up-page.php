<html>
<head>
<script>
function usernamevalidation(str)
{
 var result=true;
 var y=document.getElementById("validusername");
 var user = str;
 var usercheck1= /^[A-Za-z][A-Za-z ]{0,6}$/;
 var usercheck= /^[A-Za-z][A-Za-z ]{7,30}$/;
 if(str.length==0 || str.length<7)
 {
   if(!usercheck1.test(user) && str.length!=0)
  {
   y.innerHTML="**Username is invalid!";
   y.style.color="red";
   return 0;
  }else{
   y.innerHTML=" "; 
   return 0;
  } 
 }
 else
 {
  if(usercheck.test(user)){
   y.innerHTML=" ";
   return 1;
  }else{
   y.innerHTML="**Username is invalid!";
   y.style.color="red";
   return 0;
  }
 }
}
function passwordvalidation(str)
{
 var result=true;
 var p=document.getElementById("validpassword");
 var passwordcheck1= /^[A-Z][A-Za-z0-9!@#$%^&*]{0,10}$/;
 var passwordcheck= /^[A-Z](?=.*[a-z])(?=.*[0-9])(?=.*[!@#$%^&*])[A-Za-z0-9!@#$%^&*].{9,18}$/;
if(str.length==0 || str.length<11)
{
 if(!passwordcheck1.test(str) && str.length !=0)
  {
   p.innerHTML="**First letter is must be capital letter!";
   p.style.color="red";
   return 0;
  }
  else if(str.length!=0)
  {
   p.innerHTML="**password must be between 11 to 15 character!!";
   p.style.color="red"; 
   return 0;
  } 
  else
  {
   p.innerHTML=" ";
   return 0;
  }
}
else
{ 
 if(passwordcheck.test(str)){
  p.innerHTML=" ";
  return 1;
 }else{
   p.innerHTML="**invalid password!";
   p.style.color="red";
   return 0;
  }
 }
}
function compasswordvalidation(str)
{
 var compassword=document.getElementById("validcompassword");
 var password = document.getElementById("pass").value;
 var p=document.getElementById("validpassword");
 if(str.length!=0 && password.length==0)
  {
   p.innerHTML="First fill the password box!!"
   p.style.color="red";
   password.style.border="red";
   return 0;
  }
 else if(str.length==0)
  {
   compassword.innerHTML=" ";
   return 0;
  }
  else
  { 
   if(password!=str && str.length!=0)
   {
   compassword.innerHTML="**password does not match!";
   compassword.style.color="red";
   return 0;
   }else{
   compassword.innerHTML=" ";
   return 1;
  }
 }
}
function emailvalidation(str)
{
 var m = document.getElementById("validemailid");
 var EmailIdcheck= /^[A-Za-z][A-Za-z0-9_.]{2,}@[A-Za-z]{3,}[.]{1}[A-Za-z]{2,5}/;
 if(str.length==0 || str.length<=11)
  {
   if(str.length==0)
   {
   m.innerHTML=" ";
   return 0;
   } 
   else
   {
    m.innerHTML="**Fill your email id properly";
    m.style.color="red";
    return 0;
   }
  }
 else if(EmailIdcheck.test(str))
  {
   m.innerHTML=" ";
   return 1;
  }
  else
  {
   m.innerHTML="**invalid Email id !! ";
   m.style.color="red";
   return 0;
  }
}
 
function uservalidation(str)
{
 var mob=0;
 var mobilenocheck= /^[6789][0-9]{9}$/;
 var validmob = document.getElementById("validmob");
  var req = new XMLHttpRequest();
  req.open("GET","http://localhost/moviebookingwebsite/user.php?phoneno="+str,true); 
  req.send();
  req.onreadystatechange = function(){
   if(req.readyState==4 && req.status==200 && str.length>0)
   {
    var x=req.responseText;
    if(x==1)
    {
     validmob.innerHTML="**This Phone no already exist";
     validmob.style.color="red";
     document.getElementById("addvalue").innerHTML=" ";
     document.getElementById("addvalue").setAttribute("xyz","0");
    }
    else if(x==0)
    {
     if(mobilenocheck.test(str))
     {
      document.getElementById("addvalue").innerHTML="**valid";
      document.getElementById("addvalue").style.color="green";
      document.getElementById("addvalue").setAttribute("xyz","5");
     }
     else{ 
     validmob.innerHTML="**Pls enter a valid phone no!!";
     validmob.style.color="red";
     document.getElementById("addvalue").innerHTML=" ";
     document.getElementById("addvalue").setAttribute("xyz","0");
     }
    }
   }
   else
   {
    validmob.innerHTML=" ";
    document.getElementById("addvalue").innerHTML=" ";
    document.getElementById("addvalue").setAttribute("xyz","0");
   }
  };
element=document.getElementById("addvalue").getAttribute("xyz");
return element;
}

function enable()
{
 var btn= document.getElementById("btn");
 var username= document.getElementById("username").value;
 var phoneno= document.getElementById("phoneNo").value;
 var emailId= document.getElementById("emailid").value;
 var password= document.getElementById("pass").value;
 var compassword= document.getElementById("compass").value;
 var a=emailvalidation(emailId);
 var b=usernamevalidation(username);
 var c=compasswordvalidation(compassword);
 var d=passwordvalidation(password);
 var e=uservalidation(phoneno);
 if(a==1 && b==1 && c==1 && d==1 && e==5)
 {
 btn.removeAttribute('disabled');
 btn.style.opacity="1";
 }
 else
 {
 btn.setAttribute('disabled','disabled');
 btn.style.opacity="0.5";
 }
}
</script>
<link rel="stylesheet" type="text/css" href="http://localhost/moviebookingwebsite/sign-up form style.css">
<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  <div class="container">
  	<div><img class="image-set" src="http://localhost/moviebookingwebsite/s6.jpg" width="600" height="500"></img></div>
  	<div class="form-container">
  	  <div style="padding-top:20px; margin-bottom: 14px;"><img src="http://localhost/moviebookingwebsite/logo-of-company.jpg" width="220" height="40"></img></div>	
      <form action="http://localhost/moviebookingwebsite/new-user-homepage.php" method="post">
        <div class="input-name">
        	<i class="fa fa-user-circle-o lock"></i><input class="text-name" type="text" placeholder="Name" name="username" oninput="usernamevalidation(this.value)" id="username" onkeyup="enable()" required/><div id="validusername"></div>
        </div>
        <div class="input-name">
        	<i class="fa fa-mobile lock" style="margin-right: 12px; font-size: 26px; padding-bottom:10px;"></i><input class="text-name" type="text" placeholder="Phone Number" id="phoneNo" name="phone_no" oninput="uservalidation(this.value)" onkeyup="enable()" required/><span id="addvalue"></span><div id="validmob"></div>
        </div>
        <div class="input-name">
        	<i class="fa fa-envelope lock"></i><input class="text-name" type="text" placeholder="Email Address" name="email_id" oninput="emailvalidation(this.value)" id="emailid" onkeyup="enable()" required/><div id="validemailid"></div>
        </div>
        <div class="input-name">
        	<i class="fa fa-key lock"></i><input class="text-name" type="Set Password" placeholder="Enter password" id="pass" name="password" oninput="passwordvalidation(this.value)" onkeyup="enable()" required/><div id="validpassword"></div>
        </div>
        <div class="input-name">
        	<i class="fa fa-lock lock" style="margin-right: 9px; font-size: 20px;"></i><input class="text-name" type="text" placeholder="Confirm Password" id="compass" oninput="compasswordvalidation(this.value)" onkeyup="enable()" required/><div id="validcompassword"></div>
        </div>
        <div style="font-size:15px; margin-top: 5px; margin-bottom: 12px;">
        	<label style="font-weight: bold;">By signing up, you agree to our <a style="color:black; color:#FF0080"  href="***">Terms of use</a> and <a style="color:black; color:#FF0080"  href="***"> Privacy policy</a></label>
        </div>
        <input style="margin-top: 5px; border-radius: 5px; opacity:0.5; background-color:#FF0080; color:white;" id="btn" type="submit" value="Sign Up" disabled="disabled"/>
      </form>
      <div style="text-align: center; font-size: 17px; margin-top: 18px;">
      <span >Already a member?</span><a style="color:red;" href="http://localhost/moviebookingwebsite/log-in-page.php"> LOG IN</a>
      </div>
    <div>
  </div>
</body>
</html>