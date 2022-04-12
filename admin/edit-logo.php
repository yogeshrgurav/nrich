<?php 
	session_start();
	include('config.php');
	if(strlen($_SESSION['alogin'])==0) {
		header('location:adminlogin.php');
	}
	else{
		date_default_timezone_set('Asia/Kolkata');
		$currentTime = date('d-m-y h:i:s A',time());
		if (isset($_POST['submit'])) {
			$image = $_FILES["image"]["name"];
      		move_uploaded_file($_FILES["image"]["tmp_name"], "logo/".$_FILES["image"]["name"]);
			$id = intval($_GET['id']);
			$sql = mysqli_query($conn,"update logo set image = '$image',updationdate = '$currentTime' where id = '$id'");
			$_SESSION['msg'] = "Logo updated ||";
			echo "<script> alert('sucessfully updated'); window.location='changelogo.php';</script>";
		}
		
	}
 ?>



 <?php 
 include("admin.php");
  ?>
  <div class="content">
  		<h1>Edit Logo</h1>
  		<div class="card">	
 							
 								<div class="card-body">	
 									<?php 
							$id = intval($_GET['id']);
							$query = mysqli_query($conn,"select * from logo where id = '$id'");
							while($row = mysqli_fetch_array($query))
							{ ?> 
 								<form method="post" enctype="multipart/form-data">
 									<div class="form-group">
 									<img src="logo/<?php echo htmlentities($row['image']); ?>">
 									</div>
 									<div class="form-group">
	 							<input type="file" name="image">
	 						</div>
	 									<div class="form-group">
	 							<button type="submit" class="btn btn-primary" name="submit">create</button>
	 						</div>
													</form>
												<?php } ?>
 								</div>
 				</div>
 			</div>
 		</div>
 <?php 
 include("footer.php");
  ?>