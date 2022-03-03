<?php
session_start();
if(isset($_SESSION['user_data'])){
	if($_SESSION['user_data']['usertype']==1){
		header("Location:teacher_home.php");
	}
	else{
		header("Location:student_home.php");	
	}
if ($_POST["password"] === $_POST["confirm_password"]) {
   // success!
}
else {
   // failed :(
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>

	<?php include 'css.php'; ?>

	<style type="text/css">
		.container{					/*container Style*/	  
			margin-top: 30px;
		}
		.body {				/*Body Style*/
		  padding-top: 40px;
		  padding-bottom: 40px;
		  background-color: #eee;
		}

		.form-signin {				/*SignIn Style*/
		  max-width: 330px;
		  padding: 15px;
		  margin: 0 auto;
		}
		.form-signin .form-signin-heading,
		.form-signin .checkbox {		/*SignIn */
		  margin-bottom: 10px;
		}
		.form-signin .checkbox {
		  font-weight: normal;
		}
		.form-signin .form-control {
		  position: relative;
		  height: auto;
		  -webkit-box-sizing: border-box;
		     -moz-box-sizing: border-box;
		          box-sizing: border-box;
		  padding: 10px;
		  font-size: 16px;
		}
		.form-signin .form-control:focus {
		  z-index: 2;
		}
		.form-signin input[type="email"] {
		  margin-bottom: -1px;
		  border-bottom-right-radius: 0;
		  border-bottom-left-radius: 0;
		}
		.form-signin input[type="password"] {
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
	     <form class="form-signin" action="login.php" method="post">
	     	<div class="form-group">
	    	    <h2 class="form-signin-heading text-center"><b>Project Management System</h2>
		    </div><br>
	        <div class="form-group">
		        <label for="inputEmail" class="sr-only">Email address</label>
		        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
	  		</div>
	        <div class="form-group">
		        <label for="inputPassword" class="sr-only">Password</label>
		        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
		    </div><br>
		    <div class="form-group">
		        <button class="btn btn-lg btn-primary btn-block" type="submit">Log In</button><br>
				<a href="http://localhost/oops/Register.php">
				<input type="button" class="btn btn-lg btn-primary btn-block" value = "Sign Up"/> </a>
		    </div>
		 </form>
		 </div>
	    <div class="col-lg-4">
   		</div>
	  </div>
    </div>
</body>
</html>