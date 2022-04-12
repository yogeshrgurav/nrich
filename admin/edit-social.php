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
			$facebook = $_POST['facebook'];
			$twitter = $_POST['twitter'];
			$id = intval($_GET['id']);
			$sql = mysqli_query($conn,"update social set facebook = '$facebook',twitter = '$twitter',updationdate = '$currentTime' where id = '$id'");
			$_SESSION['msg'] = "Social updated ||";
			echo "<script>alert('successfully updated'); window.location='social-icon.php';</script>";
		}
		
	}
 ?>



 <?php 
 include("admin.php");
  ?>
 	<div class="content">
 		<h3>Edit Details</h3>
 		<br>
 				<div class="card" id="edit-image">	
 								
 								<div class="card-body">	
 												
 													<?php 
							$id = intval($_GET['id']);
							$query = mysqli_query($conn,"select * from social where id = '$id'");
							while($row = mysqli_fetch_array($query))
							{ ?> 
		 										<form method="post">				
	 							<div class="form-group">
	 								<label>Facebook</label>
	 								<input type="text" class="form-control" name="facebook" value="<?php echo htmlentities($row['facebook']); ?>">
	 							</div>
	 							
	 							<div class="form-group">
	 								<label>Twitter</label>
	 								<input type="text" name="twitter" class="form-control" value="<?php echo htmlentities($row['twitter']) ?>">
	 							</div>
	 							
	 							
	 							<button type="submit" class="btn btn-primary " name="submit">Edit</button>
													</form>
												<?php 	} ?>
 								</div>
 				</div>
 			</div>


  <?php include("footer.php"); ?>