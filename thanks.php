<?php
/* Displays all error messages */
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Thank You</title>
  <?php include 'css/css.html'; ?>
</head>
<body>
<div class="form">
    <h1>Thank You For Filing Your Complaints</h1>
    <p>
    We are glad you filed your complaint. Our team will get back to you as soon as possible
	
	Copyright &copy; <?php echo date("Y");?>
    </p>     
    <a href="profile.php"><button class="button button-block"/>Home</button></a>
</div>
</body>
</html>
