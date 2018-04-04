
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
$sql = "SELECT id, name, description, image FROM products WHERE user_id=$currentUserId ORDER BY updated_at DESC";



$result = $conn->query($sql);
if ($result->num_rows > 0) {
	echo'<h4 style="text-align: center;">'.$username.' Advert List</h4>';
    echo "<table class='table table-striped table-bordered table-hover table-responsive'><tr><th>Name</th><th>Description</th><th>Action</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $num= $row["id"]; 
		echo "<tr><td>" . $row["name"]. "</td><td style='word-wrap: break-word;'>" . $row["description"]."</td><td><a class='btn btn-info'href='product/$num'>View</a>  <a class='btn btn-warning'href=userpostedit?id=".$row['id'].">Edit</a>    <a class='btn btn-danger' href=userpostdelete?id=".$row['id'].">Delete</a>"."</td></tr>";
		
    }
    echo "</table>";
} else {
    echo '<mark class="text-info bg-info">No Advert Posted</mark>';
}

$conn->close();
?> 
</body>
</html>

