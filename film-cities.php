<?php
$conn = mysqli_connect("localhost","rudranil","rudra@123","moviebooking") or die("connection Failed");
$search_term = $_GET['searchbox'];
$sql = "SELECT distinct(cities) FROM cinema_hall WHERE cities LIKE '%{$search_term}%'";
$result = mysqli_query($conn,$sql) or die("SQL Query Failed.");
$output = "<div>";
if(mysqli_num_rows($result)>0){
	while($row = mysqli_fetch_assoc($result)){
		$output .= "<div>{$row['cities']}<div>";
	}
}else{
	$output .= "<div>city not found.....<div>";
}
$output .= "</div>";
echo $output;