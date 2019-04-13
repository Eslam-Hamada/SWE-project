<?php

$MyVar = $_POST["myVar"];

//connecting with database
$conn=mysql_connect("localhost" , "root" , "" , "tasks");

//executing the query
$result= mysql_query($conn , "SELECT * FROM `follower` WHERE user_id=" . $MyVar);

//array to recoed the data
$data=array();

while ($row=mysqli_fetch_assoc($result))
{
	$data[]= $row;
}
//returning the array of data to the client 
echo json_encode($data) ;