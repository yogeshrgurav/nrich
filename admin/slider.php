<?php
	session_start();
	include("config.php");
	if(strlen($_SESSION['alogin'])==0)
	{
		header('location:adminlogin.php');
	}
	else{
		if(isset($_POST['submit']))
		{
			$image=$_FILES["image"]["name"];
  				$dir = "slides/mainsliderimages";
  			mkdir($dir);
  			move_uploaded_file($_FILES["image"]["tmp_name"], "slides/mainsliderimages/".$_FILES["image"]["name"]);
  			$sql = mysqli_query($conn,"insert into slider (image) values('$image');");
  			echo "<script type='text/javascript'>alert('Images Successfully added');</script>";
		}
		if(isset($_GET['del'])) {
			$id=$_GET['id'];
			mysqli_query($conn,"delete from slider where id='".$_GET['id']."'");
			$_SESSION['delmsg'] = "Category deleted ||";
		}
	}
?>







 <?php 
 include("admin.php");
  ?>
 	<div class="content">
 		<h1>Add Slider Image</h1>
 		<br>
 		<div class="card" id="category">	
 							
 								<div class="	card-body">	
 												<form method="post" enctype="multipart/form-data">
		 										<div class="form-group">
		   										<label>Add Image</label>
		   										<input type="file"  id="cat" name="image">
		 										</div>
	 											
	 
	 												<button type="submit" class="btn btn-primary" name="submit">create</button>
													</form>
 								</div>
 				</div>
 				<h3>Manage Slider</h3>
 				<table class="table table-striped">
 			<thead>
 				<tr>
 					<th>Sr No.</th>
 					<th>Images</th>
 					
 					<th>Action</th>
 				</tr>
 			</thead>
 			<tbody>
 				<?php 
 					$query = mysqli_query($conn,"select * from slider");
 					$cnt = 1;
 					while($row = mysqli_fetch_array($query)){
 				 ?>
 				<tr>
 					<td><?php echo $cnt; ?></td>
 					<td><img class="img-responsive" src="slides/mainsliderimages/<?php echo htmlentities($row['image']); ?>"></td>
 				
 					<td><a href="edit-slider.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">Edit</a> <a href="slider.php?id=<?php echo $row['id']; ?>&del=delete" class="btn btn-danger">Delete</a></td>
 				</tr>
 			<?php $cnt = $cnt + 1;} ?>
 			</tbody>
 		</table>
 		
 	</div>
 	</div>







 	<script>
	function topSlideShow(){
		document.getElementById('category').style.display = "block";
	}
	function middleSlideShow(){
		document.getElementById('middle-slide').style.display = "block";
	}
</script> 

  <?php include("footer.php"); ?>