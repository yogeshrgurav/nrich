<?php  
	session_start();
	include('config.php');
	if(strlen($_SESSION['alogin'])==0){
		header('location:adminlogin.php');
	}
	else{
		date_default_timezone_set('Asia/kolkata');
		$currentTime = date('d-m-y h:i:s A',time());
		if(isset($_POST['submit'])){
			$name = $_POST['clientname'];
			$description = $_POST['description'];
			$image = $_FILES["image"]["name"];
     	    $dir = "client/$name";
      		mkdir($dir);
      		move_uploaded_file($_FILES["image"]["tmp_name"], "client/$name/".$_FILES["image"]["name"]);
			$sql = mysqli_query($conn,"insert into clients (clientname, clientdescription,image) values('$name','$description','$image')");
			$_SESSION['msg'] = "category created||";
			
		}
		if(isset($_GET['del'])) {
			$id=$_GET['id'];
			mysqli_query($conn,"delete from clients where id='".$_GET['id']."'");
			$_SESSION['delmsg'] = "Category deleted ||";
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
 		<div id="topic">	Clients <span><button class="btn btn-primary" onclick="show()" style="float:right;margin-right: 50px;"	><i class="fa fa-plus"></i> Add Category</button></span></div>
 				<div class="card" id="category">	
 								<div class="card-header">
 											Create Clients
 								</div>
 								<div class="card-body">	
 												<form method="post" enctype="multipart/form-data">
		 										<div class="form-group">
		   										
		   										<input type="text"  id="cat" name="clientname" placeholder="Enter Client Name" onkeypress="white_space(this)">
		 										</div>
	 											<div class="form-group">
	   												
	   													<textarea  id="desc" class="form-control" placeholder="Enter Description" name="description"></textarea>
	 																				</div>
	 											
	 												<input type="file" name="image">
	 											
	 												<button type="submit" class="btn btn-primary" name="submit">create</button>
													</form>
 								</div>
 				</div>


<h5>Manage Categories</h5>
 		<table class="table table-striped">
 			<thead>
 				<tr>
 					<th>Sr No.</th>
 					<th>Category Name</th>
 					<th>Description</th>
 					<th>Date Added</th>
 					<th>Updation Date</th>
 					<th>Action</th>
 				</tr>
 			</thead>
 			<tbody>	
 					<?php $query = mysqli_query($conn,"select * from clients");
								$cnt = 1;
								while($row = mysqli_fetch_array($query))
								{
								 ?>
								 <tr>
								 	<td><?php echo htmlentities($cnt); ?></td>
								 	<td><?php echo htmlentities($row['clientname']); ?></td>
								 	<td><?php echo htmlentities($row['clientdescription']); ?></td>
								 	<td><?php echo htmlentities($row['creationdate']); ?></td>
								 	<td><?php echo htmlentities($row['updationdate']); ?></td>
								 	<td><a href="edit-client.php?id= <?php echo $row['id'] ?>" class="btn btn-warning">Edit</a>
								 		<a href="add-client.php?id= <?php echo $row['id'] ?>&del=delete" onClick="return confirm('Are you sure you want to delete?')" class="btn btn-danger">Delete</a></td>
								 </tr>
								 <?php $cnt = $cnt+1; 
								}?>		
 			</tbody>
 		</table>

 		<h5>Manage Categories Images</h5>
 		<table class="table table-striped">
 			<thead>
 				<tr>
 					<th>Sr No.</th>
 					<th>Category Name</th>
 					<th>Image</th>
 					<th>Updation Date</th>
 					<th>Action</th>
 				</tr>
 			</thead>
 			<tbody>	
 					<?php $query = mysqli_query($conn,"select * from clients");
								$cnt = 1;
								while($row = mysqli_fetch_array($query))
								{
								 ?>
								 <tr>
								 	<td><?php echo htmlentities($cnt); ?></td>
								 	<td><?php echo htmlentities($row['clientname']); ?></td>
								 	<td><img src="client/<?php echo htmlentities($row['clientname']); ?>/<?php echo htmlentities($row['image']); ?>"></td>
								 	<td><?php echo htmlentities($row['updationdate']); ?></td>
								 	<td><a href="edit-client-image.php?id=<?php echo $row['id'] ?>" class="btn btn-warning">Edit</a>
								 		</td>
								 </tr>
								 <?php $cnt = $cnt+1; 
								}?>		
 			</tbody>
 		</table>



 	</div>
    






 </div>




<script>
	function show(){
		document.getElementById('category').style.display = "block";
	}

</script>



</body>
</html>

















