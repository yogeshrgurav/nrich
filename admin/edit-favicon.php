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
			$favi = $_FILES["favi"]["name"];
      		move_uploaded_file($_FILES["favi"]["tmp_name"], "logo/".$_FILES["favi"]["name"]);
			$id = intval($_GET['id']);
			$sql = mysqli_query($conn,"update favicon set favi = '$favi',updationdate = '$currentTime' where id = '$id'");
			$_SESSION['msg'] = "Logo updated ||";
			echo "<script>alert('successfully updated'); window.location='favicon.php';</script>";
		}
		
	}
 ?>



 <?php 
 include("admin.php");
  ?>
  <div class="content">
  		<h3>Edit Favicon</h3>
  		<div class="card">	
 								
 								<div class="card-body">	
 									<?php 
							$id = intval($_GET['id']);
							$query = mysqli_query($conn,"select * from favicon where id = '$id'");
							while($row = mysqli_fetch_array($query))
							{ ?> 
 								<form method="post" enctype="multipart/form-data">
 									<img src="favicon/<?php echo htmlentities($row['favi']); ?>">
	 							<input type="file" name="favi">
	 											<br>
	 							<button type="submit" class="btn btn-primary" name="submit">create</button>
													</form>
												<?php } ?>
 								</div>
 				</div>
 			</div>
 		</div>
 
   <?php include("footer.php"); ?>