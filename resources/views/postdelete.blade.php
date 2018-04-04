
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

$sql = "DELETE FROM products WHERE ID='$_GET[id]'";
/*if ($result = $conn->query($sql))
{
	//echo "Deleted";
	//return redirect()->route('admin');
	return ('/admin');
	
	
}*/

if($result = $conn->query($sql)){
   header ("refresh:1; url=admin");
   echo "User Post Deleted";
  }  
   else {
   echo "Not Delete";
  }
  ?>
