<?php
session_start();
$phone_no = $_POST['phoneno'];
$password1 = $_POST['password'];
$con = mysqli_connect('localhost','rudranil','rudra@123');
mysqli_select_db($con,'moviebooking');
$q = "select password from user where phone_no='$phone_no'";
$result = mysqli_query($con,$q);
$num = mysqli_num_rows($result);
$row = mysqli_fetch_array($result);
$a="select username from user where phone_no='$phone_no'";
$result1= mysqli_query($con,$a);
$row1 = mysqli_fetch_array($result1);
if($num==1)
{ 
  if($password1==$row['password'])
  {
   $_SESSION['username']=$row1['username'];
   header('location:http://localhost/moviebookingwebsite/home-page-for booking.php');
  }
  else
  {
?>
   <html>
   <head>
   <title></title>
   <link rel="stylesheet" type="text/css" href="log-in-page-style.css">
   </head>
   <body>
     <div class="login">
        <form class="log-in-form" action="validation.php" method="post">
         <div><input type="test" name="username" placeholder="Mobile Number/Email Id"/></div>
         <div><input type="password" name="password" placeholder="Password"/><div style="color:white;">Password incorrect!</div></div>
         <div style="margin-top:-2px; margin-left:25px"><input style="background-color:#454545; width:300px; font-weight: bold; color:#E0E0E0; font-size:20px; font-family:Times new roman;"type="submit" value="Log in"/></div>
        </form>
     </div>
   </body>
  </html>
 <?php
  }
} 
else
{
  header('location:http://localhost/moviebookingwebsite/log-in-by-invalid-user-id.php');
}
?>