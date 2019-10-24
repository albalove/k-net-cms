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
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		  <ul class="nav justify-content-end">
  
			  <li class="nav-item">
				<a class="nav-link active" href="Index.php">Home</a>
			  </li>
			</ul>
	  </nav>
	<div style="padding-top:40px;"></div>
   <div class="container" style="width:900px;" >
  
  <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active font-weight-bold" data-toggle="tab" href="#app">Create An Admin Account</a>
  </li>
</ul>

<!-- Tab panes -->
<div class="px-4 py-4">
<div class="tab-content">
  <div class="tab-pane active" id="app">
  <div style="padding-top:30px;"></div>
	<div class="card">
	<div class="card-header py-2 bg-info font-weight-bold text-center">Please Fill This Form To Create An Admin Account.</div>
	<div class="card-body bg-light">
			 <div class=""><span></span></div>
			
            <form class="form p-4" role="form" method="POST" action='admin_reg_log.php'>
              <div class="form-group row ">
                  <label for="name" >Username <i class="fa fa-user-o" style="font-size:20px"></i></label>
                  <input type="text" class="form-control rounded-1" name="name" pattern="[a-zA-Z][a-zA-Z0-9-_.]{1,20}" required>
                  
              </div>
                <div class="form-group row">
                    <label for="fname">Email <i class="fa fa-user-o" style="font-size:20px"></i></label>
                    <input type="email" class="form-control  rounded-1" name="email" required>
                    
                </div>
                <div class="form-group row">
                    <label>Password <i class="fa fa-lock" style="font-size:20px"></i></label>
                    <input type="password" class="form-control  rounded-1" required name="pass1" pattern=".{6,}" title="Six or more characters">
                    
                </div>
                <div class="form-group row ">
                    <label>Confirm Password <i class="fa fa-lock" style="font-size:20px"></i></i></label>
                    <input type="password" class="form-control  rounded-1"  required name="pass2" pattern=".{6,}" title="Six or more characters">
                   
                </div>
				<div class="form-group row mx-auto">
						<button type="submit" class="btn btn-primary mr-sm-2" name="reg_submit">Submit <i class="fa fa-check-square-o" style="font-size:20px"></i></button>
						<button type="reset" class="btn btn-primary mr-sm-2" name="cancel">Cancel <i class="fa fa-remove" style="font-size:20px"></i></button>

					</div>
            </form>
			<p>Already Registered? <a href="admin_login.php">Login here</a>.</p>
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