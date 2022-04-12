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
			$product = $_POST['productname'];
            // trim($product);
			$image = $_FILES['image']['name'];
			$dir = "product/$productname";
      		mkdir($dir);
			move_uploaded_file($_FILES["image"]["tmp_name"], "product/$product/".$_FILES["image"]["name"]);
			$id = intval($_GET['id']);
			$sql = mysqli_query($conn,"update products set image1 = '$image',updationdate = '$currentTime' where id = '$id'");
			$_SESSION['msg'] = "Category updated ||";
			echo "<script>alert('successfully updated ');</script>";
		}
		
	}
 ?>



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
							$query = mysqli_query($conn,"select * from products where id = '$id'");
							while($row = mysqli_fetch_array($query))
							{ ?> 
		 							<div class="form-group">
		   											<input type="text" name="productname" class="form-control" value="<?php echo htmlentities($row['productname']); ?>">
		   										</div>
		   									<div class="form-group">
 									        <img src="product/<?php echo htmlentities($row['productname']); ?>/<?php echo htmlentities($row['image1']); ?>" style="width:150px;height:150px;">
 										</div>
 									<?php } ?>	
		   										
	 											<div class="form-group">
	 												
	 												<input type="file" name="image">
	 											</div>
	 												<button type="submit" class="btn btn-primary" name="submit">update</button>
													
													</form>
												
 								</div>
 				</div>
 			</div>
  <?php include("footer.php"); ?>