

<?php
/*
//Display Images From A Folder with PHP
$files = glob("images/*.*");
//echo "<h3>Advert Images</h3>";
for ($i=1; $i<count($files); $i++)
{
	$num = $files[$i];
	echo '<img src="'.$num.'" alt="random image" style="border: 1px solid #ddd;border-radius: 8px;padding: 5px; width: 250px; height:250px;">'."&nbsp;&nbsp;";
	}*/
?>


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
$sql = "SELECT name,image FROM products ORDER BY updated_at DESC";
$result = $conn->query($sql);
echo'<h2 style="text-align: center;">Advert Gallery</h2>';
if ($result->num_rows > 0) {	
    echo "<table>";
    // output data of each row
	$i=0;
    while($row = $result->fetch_assoc()) {
		if($i%4==0){
			echo"<tr>";
			
		}
		echo"<td><img src='images/{$row['image']}' alt='{$row['name']}' style='border: 1px solid #ddd;border-radius: 8px;padding: 5px; width: 250px; height:250px;' > &nbsp;&nbsp; </td>";
		if($i%4==4){
			echo"</tr>";
		}
		$i++;
		
    }
    echo "</table>";
} else {
    echo '<mark class="text-info bg-info">No Image Posted</mark>';
}

$conn->close();
?> 
</body>
</html>

