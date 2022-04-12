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
			$image = $_FILES['image']['name'];
			move_uploaded_file($_FILES["image"]["tmp_name"], "slides/mainsliderimages/".$_FILES["image"]["name"]);
			$id = intval($_GET['id']);
			$sql = mysqli_query($conn,"update slider set image = '$image',updationdate = '$currentTime' where id = '$id'");
			$_SESSION['msg'] = "Category updated ||";
			echo "<script> alert('sucessfully updated'); window.location='slider.php';</script>";
		}
		
	}

 ?>


 <?php 
 include("admin.php");
  ?>
 	<div class="content">
 		<div id="topic">Edit Slider</div>
 				<div class="card">	
 								<div class="card-header">
 											Edit
 								</div>
 								<div class="card-body">
 									<form method="post" enctype="multipart/form-data">
 		<?php 
 			$id = intval($_GET['id']);
 			$query = mysqli_query($conn,"Select * from slider where id= '$id'");
 			while($row = mysqli_fetch_array($query))
 			{
 			 ?>
 										<div class="form-group">
 											<img class="img-responsive" src="slides/mainsliderimages/<?php echo htmlentities($row['image']); ?>">
 										</div>
 									<?php } ?>
 									
 										<div class="form-group">
 										<input type="file" name="image">
 									</div>
 									
 										<button type="submit" name="submit" class="btn btn-primary">Edit</button>
 									
 									</form>
 								</div>
 							</div>
 						</div>
 					</div>
<?php include("footer.php"); ?>
 					 			
