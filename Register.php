<?php
session_start();
include 'connect.php';

if(isset($_POST['submit'])){
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['Password'];
	$password = md5($password);
	if (isset($_POST['usertype'])) {
    $d = mysqli_query($con,"INSERT INTO `users`(`team_id`, `name`, `email`, `password`, `usertype`) VALUES ('0','$name','$email','$password','1')");
	header("Location: login.php");
}else{
	
	$d = mysqli_query($con,"INSERT INTO `users`(`team_id`, `name`, `email`, `password`, `usertype`) VALUES ('0','$name','$email','$password','2')");
	header("Location: login.php");
	}
}
?>

<!DOCTYPE html>		
<html>
<head>
	<title>Sign Up Page</title>
	<link rel="stylesheet" type="text/css" href="css.php">
	<?php include 'css.php'; ?>
	<style type="text/css">
		.container{					  
			margin-top: 50px;
		}
		.body {				
		  padding-top: 40px;
		  padding-bottom: 40px;
		  background-color: #eee;
		}

		.form-signup {				
		  max-width: 330px;
		  padding: 15px;
		  margin: 0 auto;
		}
		.form-signup .form-signup-heading,
		.form-signup .checkbox {		
		  margin-bottom: 10px;
		}
		.form-signup .checkbox {
		  font-weight: normal;
		}
		.form-signup .form-control {
		  position: relative;
		  height: auto;
		  -webkit-box-sizing: border-box;
		     -moz-box-sizing: border-box;
		          box-sizing: border-box;
		  padding: 10px;
		  font-size: 16px;
		}
		.form-signup .form-control:focus {
		  z-index: 2;
		}
		.form-signup input[type="Name"] {
		  margin-bottom: -1px;
		  border-bottom-right-radius: 0;
		  border-bottom-left-radius: 0;
		}
		.form-signup input[type="Email"] {
		  margin-bottom: -1px;
		  border-bottom-right-radius: 0;
		  border-bottom-left-radius: 0;
		}
		.form-signup input[type="password"] {
		  margin-bottom: 10px;
		  border-top-left-radius: 0;
		  border-top-right-radius: 0;
		}
	</style>
</head>
<body>
<div class="container">
   	<div class="row">
   		<?php if(isset($_REQUEST['error'])){ ?>
   		<div class="col-lg-12">
   			<span class="alert alert-danger" style="display: block;"><?php echo $_REQUEST['error']; ?></span>
   		</div>
	   	<?php } ?>
   	</div>
   	<div class="row">
   		<div class="col-lg-4">
   		</div>
		<div class="col-lg-4">
			<form class="form-signup" action="Register.php" method="post">
				<div class="form-group">
	    			<h2 class="form-signin-heading text-center"><b>SIGN UP</h2>
				</div>
				<?php if(isset($_GET['error'])) { ?>
				<p class="error"> <?php echo $_GET['error']; ?></p>
				<?php } ?>
		
				<div class="form-group">
					<label for="inputName" class="sr-only">Name</label>
					<input type="name" name="name" id="Name" class="form-control" placeholder="Name" required autofocus><br><br>
				</div>
		
				<div class="form-group">
					<label for="inputEmail" class="sr-only">Email</label>
					<input type="Email" name="email" id="Email" class="form-control" placeholder="Email" required><br><br>
				</div>
		
				<div class="form-group">
					<label for="inputPassword" class="sr-only">Password</label>
					<input type="password" id="Password" name="Password" class="form-control" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required><br><br>
				</div>

				<div class="form-group">
					<label for="inputPassword" class="sr-only">Re-Password</label>
					<input type="password" id="RPassword" name="RPassword" class="form-control" placeholder="Re-Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required><br><br>
				</div>
				<div class="form-group">
					<h2 class="form-signin-heading text-center"><b> CHECK THIS BOX </h2><br>
					<input type="checkbox" name="usertype" value="1" ><b>  IF FACULTY<br><br><br>
					<button type="submit" class="btn btn-lg btn-primary btn-block" name="submit">Sign Up</button>
				</div>

		</div>
			</form>
</body>
</html>