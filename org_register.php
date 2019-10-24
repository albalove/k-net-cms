<?php
session_start();
require 'db.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
if (isset($_POST['org_submit'])) { //user logging in

// Escape all $_POST variables to protect against SQL injections

$fname = $mysqli->escape_string($_POST['fname']);
$lname = $mysqli->escape_string($_POST['lname']);
$org_name = $mysqli->escape_string($_POST['org_name']);
$org_addr = $mysqli->escape_string($_POST['org_addr']);
$comment = $mysqli->escape_string($_POST['comment']);



    $sql = "INSERT INTO tasks (firstname, lastname, organization, address, comment) " 
            . "VALUES ('$fname', '$lname', '$org_name', '$org_addr', '$comment')";
			
	 // Add values to the database
    if ( $mysqli->query($sql) ){

        $_SESSION['logged_in'] = true; // So we know the user has logged in
		exit;

    }
    else {
        $_SESSION['message'] = 'failed!';
        header("location: login.php");
    }
}
}
?> 