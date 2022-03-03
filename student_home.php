<?php
session_start();
include 'connect.php';
?>

	
<?php 



if(isset($_SESSION['user_data'])){
	if($_SESSION['user_data']['usertype']!=1){
		header("Location:student_home.php");
	}

	$data=array();
	$qr=mysqli_query($con,"select * from teams");
	while($row=mysqli_fetch_assoc($qr)){
		array_push($data,$row);
	}


	$data1=array();
	$qrr=mysqli_query($con,"select * from users where usertype='2' && team_id='0'");
	while($row1=mysqli_fetch_assoc($qrr)){
		array_push($data1,$row1);
	}

	$data2=array();
	$qr2=mysqli_query($con,"select * from projects");
	while($row2=mysqli_fetch_assoc($qr2)){
		array_push($data2,$row2);
	}

	if(isset($_POST['download'])){
	$name = $_POST['download']
	$file_url = 'localhost/oops/uploads/';  
header('Content-Type: application/octet-stream');  
header("Content-Transfer-Encoding: Binary");   
header("Content-disposition: attachment; filename=\"" . basename($file_url . $name) . "\"");   
readfile($file_url);  
}

if(isset($_POST['save'])){

	$title = $_POST['title'];
	$dateofsub = $_POST['submitdate'];
	$desc = $_POST['description'];

	$filename = $_FILES['myfile']['name'];
    $destination = 'uploads/' . $filename;
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
   
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
        echo "You file extension must be .zip, .pdf or .docx";
    } elseif ($_FILES['myfile']['size'] > 1000000) { 
        echo "File too large!";
    } else {
       
        if (move_uploaded_file($file, $destination)) {
            
                echo "File uploaded successfully";
            
        } else {
            echo "Failed to upload file.";
        }
    }


	$qrr = mysqli_query($con,"insert into projects (`title`, `teacher_id`, `dateofsub`, `description`, `file`) VALUES ('$title','1','$dateofsub','$desc','$filename')");
}
 
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Home Page</title>
	<?php include 'css.php'; ?>
</head>
<body>
<div class="container">

	<div class="row">
   		<?php if(isset($_REQUEST['error'])) { ?>
   		<div class="col-lg-12">
   			<span class="alert alert-danger" style="display: block;">
   				<?php echo $_REQUEST['error']; ?>	
			</span>
   		</div>
	   	<?php } ?>
	 </div>
	 <div class="row">
   		<?php if(isset($_REQUEST['success'])) { ?>
   		<div class="col-lg-12">
   			<span class="alert alert-success" style="display: block;">
   				<?php echo $_REQUEST['success']; ?>	
			</span>
   		</div>
	   	<?php } ?>
	 </div>
	<div class="row">
		<a href="create_team.php" class="btn btn-success" style="margin:10px;">Create Team</a>
		<a href="logout.php" class="btn btn-success" style="margin:10px;">Logout</a>
	</div>
	<h1>Current Teams:</h1>
	<div class="row">
		<div class="col-lg-12">
			<div>
			<table class="table table-bordered">
				<tr>
					<th>Project Title</th>
					<th>Leader</th>
					<th>Team</th>
					<th>Members</th>
					<th>Action</th>												
				</tr>
				<?php
				  foreach($data as $d) {
				 ?>
				 <tr>
					<td><?php echo $d['project']; ?></td>
				 	<td><?php echo $d['leader']; ?></td>
				 	<td><?php echo $d['name']; ?></td>
				 	<td><?php echo $d['mem1'] .", ". $d['mem2']; ?></td>	 	
				 	<td><a class="btn btn-info" href="manage.php?id=<?php echo $d['leader']; ?>">Manage</a></td>	 	
				 </tr>
				 <?php
				  } 
				?>
			</table>
			</div>
		</div>
	</div>

<h1> Assignments: </h1>
<div class="row">
		<div class="col-lg-12">
			<div>
			<table class="table table-bordered">
				<tr>
					<th>Project Title</th>
					<th>Date of Submission</th>
					<th>Description</th>
					<th>File</th>
														
				</tr>
				<?php
				  foreach($data2 as $d2) {
				 ?>
				 <tr>
					<td><?php echo $d2['title']; ?></td>
				 	<td><?php echo $d2['dateofsub']; ?></td>
				 	<td><?php echo $d2['description']; ?></td>
				 	<td><form action="student_home.php" method="post" ><input type="submit" name="download" value="<?php echo $d2['file']; ?>"> </form></td>	
				 	 	
				 </tr>
				 <?php
				  } 
				?>
			</table>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<br>
	<h1>Unlisted Students (not in team):</h1><br>
	<div class="row">
		<div class="col-lg-12">
			<div>
			<table class="table table-bordered">
				<tr>
					<th>Roll</th>
					<th>Name</th>
					<th>Email</th>												
				</tr>
				<?php
				  foreach($data1 as $d) {
				 ?>
				 <tr>
					<td><?php echo $d['id']; ?></td>
				 	<td><?php echo $d['name']; ?></td>
				 	<td><?php echo $d['email']; ?></td>
				 </tr>
				 <?php
				  } 
				?>
			</table>
			</div>
		</div>
	</div>

	</div>
</body>
</html>
<?php
}
else{
	header("Location:index.php?error=UnAuthorized Access");
}