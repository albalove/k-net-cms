<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cms";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if (isset($_GET['id'])) {
	$id = $_GET['id'];

$sql = "UPDATE tasks SET response='Resolved' WHERE id='$id'";
}
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
	header('location: admin_profile.php');
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>