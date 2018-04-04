@extends('layouts.app')



@section('content')


	<div class="container">
		<div class="row">
@include('components.sidebar')
			<div class=" col-md-6 col-md-offset-3">
@include('components.notification')
				<div class=" well">
					
<!DOCTYPE html>
<html>
<head>
<style>
th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}
tr{
	padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #F0E68C;
    color: black;
	
}

</style>
</head>
<body>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo 'Current script owner: ' . get_current_user();
$currentUserId=auth()->id();
$abc=auth()->user()->email;
//echo $abc;
//echo $currentUserId;
$username=auth()->user()->name;
//$sql = "SELECT id FROM likes WHERE user_id=$currentUserId";
$sql="SELECT products.id,products.name,products.price FROM products INNER JOIN likes ON products.id = likes.likable_id WHERE likes.user_id=$currentUserId ";




$result = $conn->query($sql);
if ($result->num_rows > 0) {
	echo'<h2 style="text-align: center;">'.$username.' Favorite List</h2>';
    echo "<table class='table table-striped table-bordered table-hover table-responsive'><tr><th>Name</th><th>Description</th><th>Action</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {    
$num= $row["id"]; 
		echo "<tr><td>" . $row["name"]. "</td><td style='word-wrap: break-word;'>" . $row["price"]."</td><td><a class='btn btn-info'href='product/$num'>View</a></td></tr>";
		//echo $row["name"];
		echo "<br>";
    }
    echo "</table>";
} else {
    echo '<mark class="text-info bg-info">No Advert Posted</mark>';
}

$conn->close();
?> 

</body>
</html>
@endsection
