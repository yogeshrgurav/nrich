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
			$faddress = $_POST['faddress'];
			$haddress = $_POST['haddress'];
			$mobile = $_POST['mobile'];
			$phone = $_POST['phone'];
			$email1 = $_POST['email1'];
			$email2 = $_POST['email2'];
			$id = intval($_GET['id']);
			$sql = mysqli_query($conn,"update details set factoryaddress = '$faddress',headaddress = '$haddress',mobileno = '$mobile',phoneno='$phone',email1='$email1',email2='$email2',updationdate = '$currentTime' where id = '$id'");
			$_SESSION['msg'] = "Datails updated ||";
			echo "<script> alert('sucessfully updated'); window.location='setpersonaldetails.php';</script>";
		}
		
	}
 ?>



 <?php 
 include("admin.php");
  ?>
 	<div class="content">
 		<div id="topic">Details</div>
 				<div class="card" id="edit-image">	
 								<div class="card-header">
 											Edit Details
 								</div>
 								<div class="card-body">	
 												
 													<?php 
							$id = intval($_GET['id']);
							$query = mysqli_query($conn,"select * from details where id = '$id'");
							while($row = mysqli_fetch_array($query))
							{ ?> 
		 										<form method="post">				
	 							<div class="form-group">
	 								<label>Head Office Address</label>
	 								<textarea class="form-control" name="haddress"><?php echo htmlentities($row['headaddress']); ?></textarea>
	 							</div>
	 							<div class="form-group">
	 								<label>Factory Address</label>
	 								<textarea class="form-control" name="faddress"><?php echo htmlentities($row['factoryaddress']); ?></textarea>
	 							</div>
	 							<div class="form-group">
	 								<label>Mobile No:</label>
	 								<input type="text" name="mobile" class="form-control" value="	<?php 	echo htmlentities($row['mobileno']) ?>">
	 							</div>
	 							<div class="form-group">
	 								<label>Phone No :</label>
	 								<input type="text" name="phone" class="form-control" value="	<?php echo htmlentities($row['phoneno']); ?>">
	 							</div>

	 							<div class="form-group">
	 								<label>Email Id 1 :</label>
	 								<input type="email" name="email1" class="form-control" value="	<?php echo htmlentities($row['email1']); ?>">
	 							</div>
	 							<div class="form-group">
	 								<label>Email Id 2 :</label>
	 								<input type="email" name="email2" class="form-control" value="	<?php echo htmlentities($row['email2']); ?>">
	 							</div>
	 							
	 							<button type="submit" class="btn btn-primary" name="submit">Edit</button>
													</form>
												<?php 	} ?>
 								</div>
 				</div>
 			</div>
 <?php 
 include("footer.php");
  ?>