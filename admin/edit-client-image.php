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
			$name = $_POST['name'];
			$image = $_FILES['image']['name'];
            move_uploaded_file($_FILES["image"]["tmp_name"], "client/$name/".$_FILES["image"]["name"]);
			$id = intval($_GET['id']);
			$sql = mysqli_query($conn,"update clients set image = '$image',updationdate = '$currentTime' where id = '$id'");
			$_SESSION['msg'] = "Category updated ||";
			echo "<script>alert('successfully updated ');</script>";
		}
		
	}
 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Category</title>
  <!-- <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script> -->
  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>


 <?php 
 include("admin.php");
  ?>
 	<div class="content">
 		<div id="topic">Edit Client </div>
 				<div class="card" id="edit-image">	
 								<div class="card-header">
 											Edit Clients Image
 								</div>
 								<div class="card-body">	
 												<form method="post" enctype="multipart/form-data">
 													<?php 
							$id = intval($_GET['id']);
							$query = mysqli_query($conn,"select * from clients where id = '$id'");
							while($row = mysqli_fetch_array($query))
							{ ?> 
		 							<div class="form-group">
		   											<input type="text" name="name" class="form-control" value="<?php echo htmlentities($row['clientname']); ?>">
		   										</div>
		   									<div class="form-group">
 											<img src="client/<?php echo htmlentities($row['clientname']); ?>/<?php echo htmlentities($row['image']); ?>" style="width:150px;height:150px;">
 										</div>
 									<?php } ?>	
		   										
	 											<div class="form-group">
	 												<br>
	 												<input type="file" name="image">
	 											</div>
	 												<button type="submit" class="btn btn-primary" name="submit">update</button>
													
													</form>
												
 								</div>
 				</div>
 			</div>
 		</body>
 		</html>