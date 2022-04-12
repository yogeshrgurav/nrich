<?php 
	session_start();
	include('config.php');
	if(strlen($_SESSION['alogin'])==0) {
		header('location:adminlogin.php');
	}
	else{
		if (isset($_POST['submit'])) {
			$category = $_POST['category'];
			$slug = str_replace(' ', '-', strtolower($category));
			$image = $_FILES['image']['name'];;
			$dir = "categoryimages/$category";
            move_uploaded_file($_FILES["image"]["tmp_name"], "categoryimages/$category/".$_FILES['image']['name']);
			$id = intval($_GET['id']);
			$sql = mysqli_query($conn,"update category set categoryname = '$category',slug = '$slug',image = '$image' where id = '$id'");
			$_SESSION['msg'] = "Category updated ||";
			echo "<script> alert('sucessfully updated'); window.location='category.php';</script>";
		}
		
	}
 ?>



 <?php 
 include("admin.php");
  ?>
 	<div class="content">
 		<h1>Edit Category </h1>
 				<div class="card" id="edit-image">	
 							
 								<div class="card-body">	
 										<div class="row">
 											<div class="col-md-6">
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
 									<?php } ?>	
		   										
	 											

	 											
	 												<button type="submit" class="btn btn-primary" name="submit">update</button>
													
													</form>
 											</div>
 										</div>	
												
 								</div>
 				</div>
 			</div>
  <?php include("footer.php"); ?>