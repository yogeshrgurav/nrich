




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
		// 	$favi = $_FILES["favi"]["name"];
  //     		move_uploaded_file($_FILES["favi"]["tmp_name"], "favicon/".$_FILES["favi"]["name"]);
		// 	$sql = mysqli_query($conn,"insert into Favicon (favi) values('$favi')");
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

 				<h3>Manage Favicon</h3>
 		<table class="table table-striped">
 			<thead>
 				<tr>
 					<th>Sr No.</th>
 					<th>Favicon</th>
 					<th>Action</th>
 				</tr>
 			</thead>
 			<tbody>	
 					<?php $query = mysqli_query($conn,"select * from Favicon");
								$cnt = 1;
								while($row = mysqli_fetch_array($query))
								{
								 ?>
								 <tr>
								 	<td><?php echo htmlentities($cnt); ?></td>
								 	<td><img src="favicon/<?php echo htmlentities($row['favi']); ?>"></td>
								 	<td><a href="edit-favicon.php?id=<?php echo htmlentities($row['id']); ?>" class="btn btn-warning">Edit</a>
								 		
								 </tr>
								 <?php $cnt = $cnt+1; 
								}?>		
 			</tbody>
 		</table>
  </div>
  

</div>


  <?php include("footer.php"); ?>