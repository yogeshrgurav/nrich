<?php  
	session_start();
	include('config.php');
	if(strlen($_SESSION['alogin'])==0){
		header('location:adminlogin.php');
	}
	else{
		// date_default_timezone_set('Asia/kolkata');
		// $currentTime = date('d-m-y h:i:s A',time());
		// if(isset($_POST['submit'])){
		// 	$image = $_FILES["image"]["name"];
  //     		move_uploaded_file($_FILES["image"]["tmp_name"], "logo/".$_FILES["image"]["name"]);
		// 	$sql = mysqli_query($conn,"insert into logo (image) values('$image')");
		// 	$_SESSION['msg'] = "category created||";
		// }
		// if(isset($_GET['del'])) {
		// 	$id=$_GET['id'];
		// 	echo "<script>alert('$id');</script>";
		// 	mysqli_query($conn,"delete from logo where id='".$_GET['id']."'");
		// 	$_SESSION['delmsg'] = "Category deleted ||";
		// }
	}
 ?>



 <?php 
 include("admin.php");
  ?>
  <div class="content">
  <!-- 		<div id="topic">Logo</div>
  		<div class="card">	
 								<div class="card-header">
 											Set Logo
 								</div>
 								<div class="card-body">	
 								<form method="post" enctype="multipart/form-data">				
	 							<input type="file" name="image">
	 											<br>
	 							<button type="submit" class="btn btn-primary" name="submit">create</button>
													</form>
 								</div>
 				</div> -->
 				<h1>Manage Logo</h1>
 		<table class="table table-striped">
 			<thead>
 				<tr>
 					<th>Sr No.</th>
 					<th>Image</th>
 					<th>Action</th>
 				</tr>
 			</thead>
 			<tbody>	
 					<?php $query = mysqli_query($conn,"select * from logo");
								$cnt = 1;
								while($row = mysqli_fetch_array($query))
								{
								 ?>
								 <tr>
								 	<td><?php echo htmlentities($cnt); ?></td>
								 	<td><img src="logo/<?php echo htmlentities($row['image']); ?>"></td>
								 	<td><a href="edit-logo.php?id=<?php echo htmlentities($row['id']); ?>" class="btn btn-warning">Edit</a>
								 		<a href="changelogo.php?id=<?php echo $row['id'] ?>&del=delete" onClick="return confirm('Are you sure you want to delete?')" class="btn btn-danger">Delete</a></td>
								 </tr>
								 <?php $cnt = $cnt+1; 
								}?>		
 			</tbody>
 		</table>
  </div>
  

</div>
</body>
</html>