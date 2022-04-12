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
			$infraimage1 = $_FILES['infraimage1']['name'];
			$infraimage2 = $_FILES['infraimage2']['name'];
            move_uploaded_file($_FILES["infraimage1"]["tmp_name"], "aboutus/".$_FILES["infraimage1"]["name"]);
            move_uploaded_file($_FILES["infraimage2"]["tmp_name"], "aboutus/".$_FILES["infraimage2"]["name"]);
			$id = intval($_GET['id']);
			$sql = mysqli_query($conn,"update aboutus set infraimage1 = '$infraimage1',infraimage2 = '$infraimage2',updationdate = '$currentTime' where id = '$id'");
			$_SESSION['msg'] = "Category updated ||";
			echo "<script> alert('sucessfully update'); window.location='setaboutus.php';</script>";
		}
		
	}
 ?>



 <?php 
 include("admin.php");
  ?>
 	<div class="content">
 		<h3>Edit Infrastructure Image</h3>
 				<div class="card" id="edit-image">	
 							
 								<div class="	card-body">	
 												<form method="post" enctype="multipart/form-data">
 													<?php 
							$id = intval($_GET['id']);
							$query = mysqli_query($conn,"select * from aboutus where id = '$id'");
							while($row = mysqli_fetch_array($query))
							{ ?> 

		   									<div class="form-group">
 									        <img src="aboutus/<?php echo htmlentities($row['infraimage1']); ?>" style="width:150px;height:150px;">

 									    </div>
 									     
 									        <div class="form-group">
	 											<input type="file" name="infraimage1">
	 											</div>
	 										<div class="form-group">
 									        <img src="aboutus/<?php echo htmlentities($row['infraimage2']); ?>" style="width:150px;height:150px;">
 										</div>

 										   <div class="form-group">
	 												
	 												<input type="file" name="infraimage2">
	 											</div>
 									<?php } ?>	
		   										
	 											

	 												<button type="submit" class="btn btn-primary" name="submit">update</button>
													
													</form>
												
 								</div>
 				</div>
 			</div>

 <?php 
 include("footer.php");
  ?>