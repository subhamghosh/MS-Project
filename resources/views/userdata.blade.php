<!DOCTYPE html>
<html>
<head>
<style>

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

$sql = "SELECT id, name, email FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	echo'<h2 style="text-align: center;">USER List</h2>';
    echo "<table class='table table-striped table-bordered table-hover table-responsive'><tr><th>ID</th><th>Name</th><th>EMail</th><th>Action</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
     // echo "<tr><td>" . $row["id"]. "</td><td>" . $row["name"]. "</td><td>" . $row["email"]."</td><td>"."<button class='btn btn-danger btn-sm' onclick=''>".'Delete'."</button>"."</td></tr>";
		 echo "<tr><td>" . $row["id"]. "</td><td>" . $row["name"]. "</td><td>" . $row["email"]."</td><td><a class='btn btn-danger btn-lg'href=delete?id=".$row['id'].">Delete</a>"."</td></tr>";
		//echo "<tr><td><a href=delete?id=".$row['id'].">Delete</a>"."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?> 

</body>
</html>

