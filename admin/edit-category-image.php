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
			$category = $_POST['category'];
			$image = $_FILES['image']['name'];
			$bgimage = $_FILES['bgimage']['name'];
			$dir = "categoryimages/$category";
     	    $dir2 = "slider/$category";
      		mkdir($dir);
      		mkdir($dir2);
            move_uploaded_file($_FILES["image"]["tmp_name"], "categoryimages/$category/".$_FILES['image']['name']);
            move_uploaded_file($_FILES["bgimage"]["tmp_name"], "slider/$category/".$_FILES['bgimage']['name']);
			$id = intval($_GET['id']);
			$sql = mysqli_query($conn,"update category set categoryname = '$category',image = '$image',bgimage = '$bgimage',updationdate = '$currentTime' where id = '$id'");
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
 		<div id="topic">Edit Category </div>
 				<div class="card" id="edit-image">	
 								<div class="card-header">
 											Create Category
 								</div>
 								<div class="	card-body">	
 												<form method="post" enctype="multipart/form-data">
 													<?php 
							$id = intval($_GET['id']);
							$query = mysqli_query($conn,"select * from category where id = '$id'");
							while($row = mysqli_fetch_array($query))
							{ ?> 
		 							<div class="form-group">
		   											<input type="text" name="category" class="form-control" value="<?php echo htmlentities($row['categoryname']); ?>">
		   										</div>
		   									<div class="form-group">
 											<img src="categoryimages/<?php echo htmlentities($row['categoryname']); ?>/<?php echo htmlentities($row['image']); ?>" style="width:150px; height:150px;">
 										</div>

 										<div class="form-group">
	 												<br>
	 												<input type="file" name="image">
	 											</div>

 										<div class="form-group">
 											<img src="slider/<?php echo htmlentities($row['categoryname']); ?>/<?php echo htmlentities($row['bgimage']); ?>" style="width:480px; height:250px;">
 										</div>

 										<div class="form-group">
	 												<br>
	 												<input type="file" name="bgimage">
	 											</div>
 									<?php } ?>	
		   										
	 											

	 											
	 												<button type="submit" class="btn btn-primary" name="submit">update</button>
													
													</form>
												
 								</div>
 				</div>
 			</div>
 		</body>
 		</html>