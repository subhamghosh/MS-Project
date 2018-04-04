
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

$sql = "SELECT * FROM products WHERE ID='$_GET[id]'";


//echo $_GET['id'];

if($result = $conn->query($sql)){
	
   /*header ("refresh:1; url=home");
   echo "User Post Updated";*/
   //echo $_GET['id'];
   $num=$_GET['id'];
   header ("refresh:1; url=product/$num/edit");


  }
  
  
   else {
   echo "Not Updated";
  }
  ?>
