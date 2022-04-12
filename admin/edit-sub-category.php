<?php 
	session_start();
	include('config.php');
	if(strlen($_SESSION['alogin'])==0) {
		header('location:adminlogin.php');
	}
	else{
		if (isset($_POST['submit'])) {
			$subcategory = $_POST['subcategory'];
			$slug = str_replace(' ', '-', strtolower($subcategory));
			$image = $_FILES['image']['name'];
			$dir = "subcategoryimages/$subcategory";
     	    $dir2 = "slider/$subcategory";
            move_uploaded_file($_FILES["image"]["tmp_name"], "subcategoryimages/$subcategory/".$_FILES['image']['name']);
			$id = intval($_GET['id']);
			$sql = mysqli_query($conn,"update subcat set subcategory = '$subcategory',slug = '$slug',image = '$image' where id = '$id'");
			$_SESSION['msg'] = "Category updated ||";
			echo "<script> alert('sucessfully updated'); window.location='sub-category.php';</script>";
		}
		
	}
 ?>



 <?php 
 include("admin.php");
  ?>
 	<div class="content">
 		<h1>Edit Sub Category </h1>
 				<div class="card" id="edit-image">	
 							
 								<div class="card-body">	
 										<div class="row">
 											<div class="col-md-6">
 												<form method="post" enctype="multipart/form-data">
 													<?php 
							$id = intval($_GET['id']);
							$query = mysqli_query($conn,"select * from subcat where id='$id'");
							while($row = mysqli_fetch_array($query))
							{ ?> 
		 							<div class="form-group">
		   											<input type="text" name="subcategory" class="form-control" value="<?php echo htmlentities($row['subcategory']); ?>">
		   										</div>
		   									<div class="form-group">
 											<img src="subcategoryimages/<?php echo htmlentities($row['subcategory']); ?>/<?php echo htmlentities($row['image']); ?>" style="width:150px; height:150px;">
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