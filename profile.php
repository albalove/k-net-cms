<?php
// Initialize the session
session_start();
include 'db.php';
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true){
    header("location: index.php");
    exit;
}
?>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
if (isset($_POST['org_submit'])) { //user logging in

// Escape all $_POST variables to protect against SQL injections
$title = $mysqli->escape_string($_POST['title']);
$fname = $mysqli->escape_string($_POST['fname']);
$mname = $mysqli->escape_string($_POST['mname']);
$lname = $mysqli->escape_string($_POST['lname']);
$gender = $mysqli->escape_string($_POST['gender']);
$telephone = $mysqli->escape_string($_POST['telephone']);
$org_name = $mysqli->escape_string($_POST['org_name']);
$org_addr = $mysqli->escape_string($_POST['org_addr']);
$comment = $mysqli->escape_string($_POST['comment']);
$status = "No";
$use = $_SESSION['username'];


    $sql = "INSERT INTO tasks (title, firstname, othername, lastname, gender, telephone, organization, address, comment, username, response) " 
            . "VALUES ('$title', '$fname', '$mname', '$lname', '$gender', '$telephone', '$org_name', '$org_addr', '$comment', '$use', '$status')";
			
	 // Add values to the database
    if ($mysqli->query($sql)){
		header("location: thanks.php");
	}
	

    
}
}
?> 
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
    <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
	<link rel="icon" type="./image/png" href="http://example.com/myicon.png">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title></title>
	<style>
		body{
			background-image:url("hero.jpg");
		}
	</style>
  </head>
  <body>
  
   <nav class="navbar navbar-light bg-light">
  <a class="navbar-brand" href="index.php">
      <img src="knet logo.png" width="300" height="60" class="d-inline-block align-top" alt="">
	 
  
  </a>

<div class="navbar navbar-light bg-light justify-content-end">
  <a class="navbar-brand" href="index.php">
    
	 
    <a class="nav-link" href="logout.php">Logout</a>
	<a class="nav-link" href="index.php">Home</a>
    
			  
  </a>
  </div>
</nav>
 
  
	<div style="padding-top:40px;"></div>
   <div class="container" style="width:900px;" >
  
  <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active font-weight-bold" data-toggle="tab" href="#grad">Forms For Complaint Filing</a>
  </li>
  <li class="nav-item">
	<a class="nav-link font-weight-bold" data-toggle="tab" href="#grat">Inbox</a>
  </li>
  
</ul>

<!-- Tab panes -->
<div class="px-4 py-4">
<div class="tab-content">
  <div class="tab-pane active" id="grad">
  <div style="padding-top:30px;"></div>
	<div class="card">
	<div class="card-header py-2 bg-info"><h4 class="font-weight-bold text-center">Please fill this form to file a complaint.</h4></div>
	<div class="card-body bg-light">
			 <div class=""><span></span></div>
			
			<form class="form p-4" role="form" method="POST" action='profile.php'>
                <div class="form-group row">
					<label for="title">Title <i class="fa fa-transgender" style="font-size:20px"></i></label>
					<select class="form-control" name="title" required>
					  <option hidden>Choose A Title</option>
					  <option value="Prof">Prof.</option>
					  <option value="Dr">Dr.</option>
					  <option value="Mr">Mr.</option>
					  <option value="Mrs">Mrs.</option>
					  <option value="Miss">Miss.</option>
					</select>
				</div>
				
				<div class="form-group row">
                    <label for="fname">First Name <i class="fa fa-user-o" style="font-size:20px"></i></label>
                    <input type="text" class="form-control  rounded-1" name="fname" pattern="[A-Za-z]{1,32}" placeholder="First Name " required>
                    
                </div>
                
				<div class="form-group row">
                    <label for="lname">Other/Middle Name <i class="fa fa-user-o" style="font-size:20px"></i></label>
                    <input type="text" class="form-control rounded-1" name="mname" pattern="[A-Za-z]{1,32}" placeholder="optional">
                    
                </div>
				
                <div class="form-group row">
                    <label for="lname">Last Name <i class="fa fa-user-o" style="font-size:20px"></i></label>
                    <input type="text" class="form-control rounded-1" name="lname" pattern="[A-Za-z_]{1,32}" placeholder="Last Name"  required>
                    
                </div>
				
				<div class="form-group row">
					<label for="sex">Gender <i class="fa fa-mars-double" style="font-size:20px"></i></label>
					<select class="form-control" name="gender" required>
					  <option hidden>Choose A Gender</option>
					  <option value="Male">Male</option>
					  <option value="Female">Female</option>
					</select>
				</div>
				
				<div class="form-group row">
                    <label for="number">Mobile / Telephone Number <i class="fa fa-mobile" style="font-size:20px"></i></label>
                    <input type="tel" class="form-control rounded-1" name="telephone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="Format: 123-453-6789" required>
                    <span></span>
                </div>
				
				<div class="form-group row">
                    <label for="organisation">Organization/Institution <i class="fa fa-building" style="font-size:20px"></i></label>
                    <input type="text" class="form-control  rounded-1" name="org_name" pattern="[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~- ]{1,35}" required>
                    
                </div>
				
				<div class="form-group row ">
                    <label for="org_addr" class="col-form-label">Address <i class="fa fa-address-book-o" style="font-size:20px"></i></label>
                    <input type="text" class="form-control" name="org_addr" value="" placeholder="Enter Office Address" required>
                    
                </div>
				
                <div class="form-group row">
                    <label>Comment <i class="fa fa-comment" style="font-size:20px"></i></label>
                    <textarea class="form-control" row="5" name="comment" required></textarea>
                    
                </div>
				
				<div class="form-group row mx-auto">
						<button type="submit" class="btn btn-primary mr-sm-2" name="org_submit">Submit <i class="fa fa-check-square-o" style="font-size:20px"></i></button>
						<button type="reset" class="btn btn-primary mr-sm-2" name="cancel">Cancel <i class="fa fa-remove" style="font-size:20px"></i></button>
					
					</div>
            </form>
            
        </div>
	</div>
  </div>
 
 <div class="tab-pane" id="grat">
  <div style="padding-top:30px;"></div>
	<div class="card">
	<div class="card-header py-2 bg-info"><h4 class="font-weight-bold text-center">View Response</h4></div>
	<div class="card-body bg-light">
	<div class=""><span></span></div>
	<?php
	include 'db.php';
	$find = $_SESSION['username'];
	
	// Attempt select query execution
	$sql = "SELECT * FROM tasks WHERE username='$find'";
	if($result = $mysqli->query($sql)){
		if($result->num_rows > 0){
			echo "<table class='table'>";
				echo "<tr>";
					echo "<th scope='col'>First Name</th>";
					echo "<th scope='col'>Last Name</th>";
					echo "<th scope='col'>Comment</th>";
					echo "<th scope='col'>Date</th>";
					echo "<th scope='col'>Response</th>";
				echo "</tr>";
			while($row = $result->fetch_array()){
				echo "<tr>";
					echo "<td>" . $row['firstname'] . "</td>";
					echo "<td>" . $row['lastname'] . "</td>";
					echo "<td>" . $row['comment'] . "</td>";
					echo "<td>" . $row['complaint_date'] . "</td>";
					echo "<td>" . $row['response'] . "</td>";
				echo "</tr>";
			}
			echo "</table>";
			// Free result set
			$result->free();
		} else{
			echo "No Data Yet.";
		}
	} else{
		echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
	}
	 
	// Close connection
	$mysqli->close();
	?>
	
	
	
    </div>
	</div>
  </div>
  
 </div>
</div>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>