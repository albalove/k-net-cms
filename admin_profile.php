<?php
// Initialize the session
session_start();
include 'db.php';
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true){
    header("location: admin_login.php");
    exit;
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
    <title>Admin Page</title>
	<style>
		body{
			background-image:url("hero.jpg");
		}
		
	</style>
  </head>
  <body>
  <!-- Image and text -->
		<nav class="navbar navbar-light bg-light">
		  <a class="navbar-brand" href="#">
			<img src="knet logo.png" width="300" height="80" class="d-inline-block align-top" alt="">
		   <a class="nav-link float-right" href="admin_logout.php">Logout</a>
					  
		  </a>
		</nav>
 
   <div class="container pt-4" >
  
  <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active font-weight-bold" data-toggle="tab" href="#grad">Inbox</a>
  </li>
  <li class="nav-item">
    <a class="nav-link font-weight-bold" data-toggle="tab" href="#org">Create a New Admin Account</a>
  </li>
</ul>

<!-- Tab panes -->
<div class="justify-content-center py-4">
<div class="tab-content">
  <div class="tab-pane active" id="grad">
  <!--<div style="padding-top:30px;"></div>-->
	<form class="form-inline my-2 my-lg-0 pb-4 justify-content-end" name="frmSearch">
	   <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name='txtKeyword' autofocus value="<?php if(isset($strKeyword)){echo $strKeyword;}?>">
	   <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
	</form>	
	
	<?php
	ini_set('display_errors', 1);
	error_reporting(~0);
	$strKeyword = null;
	if(isset($_POST["txtKeyword"]))
	{
	$strKeyword = $_POST["txtKeyword"];
	}
	if(isset($_GET["txtKeyword"]))
	{
	$strKeyword = $_GET["txtKeyword"];
	}
	?>
	<?php
	$serverName = "localhost";
	$userName = "root";
	$userPassword = "";
	$dbName = "cms";
	$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
	$sql = "SELECT * FROM tasks WHERE CONCAT(`id`, `firstname`, `lastname`, `othername`, `telephone`, `organization`, `address`, `comment`, `complaint_date`) LIKE '%".$strKeyword."%' ";
	$query = mysqli_query($conn,$sql);

	$num_rows = mysqli_num_rows($query);
	$per_page = 4;   // Number Per Page
	$page  = 1;
	if(isset($_GET["Page"]))
	{
	$page = $_GET["Page"];
	}
	 
	$prev_page = $page-1;
	$next_page = $page+1;
	$row_start = (($per_page*$page)-$per_page);
	if($num_rows<=$per_page)
	{
	$num_pages =1;
	}
	else if(($num_rows % $per_page)==0)
	{
	$num_pages =($num_rows/$per_page) ;
	}
	else
	{
	$num_pages =($num_rows/$per_page)+1;
	$num_pages = (int)$num_pages;
	}
	$row_end = $per_page * $page;
	if($row_end > $num_rows)
	{
	$row_end = $num_rows;
	}
	$sql .= " ORDER BY id ASC LIMIT $row_start ,$row_end ";
	$query = mysqli_query($conn,$sql);

	?>
	<table class='table table-hover table-striped ' width="600">
	<thead class='thead-primary'>
	<tr class='table-primary'>
	    <th>No.</th>
        <th>First Name</th>
		<th>Last Name</th>
		<th>Other Name</th>
		<th>Mobile No.</th>
		<th>Organization</th>
        <th>Address</th>
        <th>Comment</th>
        <th>Complaint Date</th>
		<th>Action</th>
        </tr>
    </thead>
    <tbody>
	<?php
	while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
	{
	?>
	<tr>
	<td><?php echo $result['id'];?></td>
	<td><?php echo $result["firstname"];?></td>
	<td><?php echo $result["lastname"];?></td>
	<td><?php echo $result["othername"];?></td>
	<td><?php echo $result["telephone"];?></td>
	<td><?php echo $result["organization"];?></td>
	<td><?php echo $result["address"];?></td>
	<td><?php echo $result["comment"];?></td>
	<td><?php echo $result["complaint_date"];?></td>
	<td><a href="update.php?id=<?php echo $result['id']; ?>" class="edit_btn" name="update">Response</a></td>                               
	</tr>
	<?php
	}
	?>
	</tbody>
	</table>
	<br>

	Total <?php echo $num_rows;?> Record : <?php echo $num_pages;?> Page :
	<?php
	if($prev_page)
	{
	echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$prev_page&txtKeyword=$strKeyword'><< Back</a> ";
	}
	for($i=1; $i<=$num_pages; $i++){
	if($i != $page)
	{

	echo "[ <a href='$_SERVER[SCRIPT_NAME]?Page=$i&txtKeyword=$strKeyword'>$i</a> ]";
	}
	else
	{
	echo "<b> $i </b>";
	}
	}
	if($page!=$num_pages)
	{
	echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$next_page&txtKeyword=$strKeyword'>Next>></a> ";
	}
	$conn = null;
	?>
  
  
  </div>
  
  <div class="tab-pane container fade " id="org">
	<div class="card">
	<div class="card-header py-2 bg-info"><h4 class="font-weight-bold text-center">Please Fill this Form to Create an Account.</h4></div>
	<div class="card-body bg-light">
			
                <form class="form p-4" role="form" method="POST" action='admin_reg_log.php'>
              <div class="form-group row ">
                  <label for="name" >Username <i class="fa fa-user-o" style="font-size:20px"></i></label>
                  <input type="text" class="form-control rounded-1" name="name" required>
                  
              </div>
                <div class="form-group row">
                    <label for="email">Email <i class="fa fa-user-o" style="font-size:20px"></i></label>
                    <input type="email" class="form-control  rounded-1" name="email" required>
                    
                </div>
                <div class="form-group row">
                    <label>Password <i class="fa fa-lock" style="font-size:20px"></i></label>
                    <input type="password" class="form-control  rounded-1" required name="pass1">
                    
                </div>
                <div class="form-group row ">
                    <label>Confirm Password <i class="fa fa-lock" style="font-size:20px"></i></i></label>
                    <input type="password" class="form-control  rounded-1"  required name="pass2">
                   
                </div>
				<div class="form-group row mx-auto">
						<button type="submit" class="btn btn-primary mr-sm-2" name="reg_submit">Submit <i class="fa fa-check-square-o" style="font-size:20px"></i></button>
						<button type="reset" class="btn btn-primary mr-sm-2" name="cancel">Cancel <i class="fa fa-remove" style="font-size:20px"></i></button>

					</div>
            </form>
            
        </div>
	</div>
   </div>
 </div>
</div>
</div>
<script>
	function myFunction(){
		documnet.getElementById("demo").innerHTML = "Complaint Resolved.";
	}
</script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>