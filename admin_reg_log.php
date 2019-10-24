<?php
session_start();
require 'db.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
		 if (isset($_POST['log_submit'])) { //user logging in

/* User login process, checks if user exists and password is correct */

// Escape email to protect against SQL injections
    $email = $mysqli->escape_string($_POST['ail']);
	$username = $mysqli->escape_string($_POST['ail']);
	$result = $mysqli->query("SELECT * FROM admins WHERE email='$email' OR name='$username'");

if ( $result->num_rows == 0 ){ // User doesn't exist
    $_SESSION['message'] = "User with that email doesn't exist!";
    header("location: userexist.php");
}
else { // User exists
    $user = $result->fetch_assoc();

    if ( password_verify($_POST['pwd1'], $user['password']) ) {
        
        $_SESSION['email'] = $user['email'];
        $_SESSION['name'] = $user['name'];
        
        // This is how we'll know the user is logged in
        $_SESSION['logged_in'] = true;

        header("location: admin_profile.php");
    }
    else {
        $_SESSION['logged_in'] = false;
		$_SESSION['message'] = "Wrong Password";
        header("location: userexist.php");
    }
}
}

else if (isset($_POST['reg_submit'])) { //user logging in

// Escape all $_POST variables to protect against SQL injections

$name = $mysqli->escape_string($_POST['name']);
$email = $mysqli->escape_string($_POST['email']);
$pass1 = $mysqli->escape_string(password_hash($_POST['pass1'], PASSWORD_BCRYPT));
$pass2 = $mysqli->escape_string(password_hash($_POST['pass2'], PASSWORD_BCRYPT));
$hash = $mysqli->escape_string( md5( rand(0,1000) ) );
$pas = $mysqli->escape_string($_POST['pass1']);
$pass = $mysqli->escape_string($_POST['pass2']);

//check if both passwords are the same
if($pas != $pass){

	$_SESSION['message'] = 'Password Mismatch! Please try again.';
    header("location: admin_profile.php");
	exit;
}    else{  
// Check if user with that email already exists
$result = $mysqli->query("SELECT * FROM admins WHERE email='$email' OR username='$username'") or die($mysqli->error);
}
// We know user email exists if the rows returned are more than 0
if ( $result->num_rows > 0 ) {
    
    $_SESSION['message'] = 'User with this email already exists!';
    header("location: admin_login.php");
    
}
else { // Email doesn't already exist in a database, proceed...

    
    $sql = "INSERT INTO admins (name, email, password, hash) " 
            . "VALUES ('$name', '$email', '$pass1', '$hash')";
			
	 // Add user to the database
    if ( $mysqli->query($sql) ){

        $_SESSION['message'] = 'Account has been created successfully!'; // So we know the user admin account has been created
        
        header("location: admin_profile.php"); 

    }
    else {
        $_SESSION['message'] = 'Registration failed!';
        header("location: userexist.php");
    }
}
}
        
    }
	
?>