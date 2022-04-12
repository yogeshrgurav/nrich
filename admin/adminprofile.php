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
			$name = $_POST["name"];
			$email = $_POST["email"];
			
			$sql = mysqli_query($conn,"update admin set name = '$name',email='$email',updationdate = '$currentTime' where id = '".$_SESSION['id']."'");
			$_SESSION['msg'] = "Category updated ||";
			echo "<script>alert('successfully updated ');</script>";
		}
		if (isset($_POST['image'])) {
			$image = $_FILES['image']['name'];
			$dir = "profile/$name";
      		mkdir($dir);
      		move_uploaded_file($_FILES["image"]["tmp_name"], "profile/$name/".$_FILES["image"]["name"]);
			$sql = mysqli_query($conn,"update admin set image = '$image',updationdate = '$currentTime' where id = '".$_SESSION['id']."'");
			$_SESSION['msg'] = "Category updated ||";
			echo "<script>alert('successfully updated ');</script>";
		}
		
	}
 ?>

	<?php 
		include("admin.php");
	 ?>
	 <div class="content" id="profile">
	 	<div class="card">
	 		<div class="card-header">
	 			<h1>Admin profile</h1>
	 		</div>
	 		<div class="card-body">
	 			<form method="post" enctype="multipart/form-data">
	 				<?php 
	 					$query = mysqli_query($conn,"select * from admin where id = '".$_SESSION['id']."'");
	 					while($row = mysqli_fetch_array($query)) {
	 					
	 					
	 				 ?>
	 				<div class="form-group">
	 					<label style="float:left;">Name: </label>
	 					<input type="text" name="name" class="form-control" value="<?php echo htmlentities($row['name']); ?>">
	 				</div>
	 				<div class="form-group">
	 					<label style="float:left;">Email: </label>
	 					<input type="email" name="email" class="form-control" value="<?php echo htmlentities($row['email']); ?>">
	 				</div>
	 				<div class="form-group">
	 					<label>Profile Image: </label>
	 						<img src="profile/<?php echo htmlentities($row['name']); ?>/<?php echo $row['image'] ?>">
	 				</div>
	 				<div class="form-group">
	 					<label>Set New Image: </label>
	 					<input type="file" name="image">
	 				</div>
	 				<div class="form-group">
	 					<button class="btn btn-primary" type="submit" name="submit">Submit</button>
	 					<button class="btn btn-primary" type="submit" name="image">Change Image</button>
	 				</div>
	 			<?php } ?>
	 			</form>
	 		</div>
	 	</div>
	 </div>
	</div>
	<?php 
		include("footer.php");
	 ?>