<?php
session_start();
$username=$_POST['username'];
$phone_no=$_POST['phone_no'];
$email_id=$_POST['email_id'];
$password=$_POST['password'];
$con=$con = mysqli_connect('localhost','rudranil','rudra@123');
mysqli_select_db($con,'moviebooking');
$q="insert into user (username,phone_no,email_id,password) values ('$username','$phone_no','$email_id','$password')";
mysqli_query($con,$q);
$_SESSION['username']=$username;
header('location:http://localhost/moviebookingwebsite/home-page-for booking.php');
?>
