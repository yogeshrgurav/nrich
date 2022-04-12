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
		// 	$faddress = $_POST['faddress'];
		// 	$haddress = $_POST['haddress'];
		// 	$mobile = $_POST['mobile'];
		// 	$phone = $_POST['phone'];
		// 	$email1 = $_POST['email1'];
		// 	$email2 = $_POST['email2'];
		// 	$sql = mysqli_query($conn,"insert into details (factoryaddress, headaddress,mobileno,phoneno,email1,email2) values('$faddress','$haddress','$mobile','$phone','$email1','$email2')");
		// 	$_SESSION['msg'] = "category created||";
		// }
		// if(isset($_GET['del'])) {
		// 	$id=$_GET['id'];
		// 	mysqli_query($conn,"delete from category where id='".$_GET['id']."'");
		// 	$_SESSION['delmsg'] = "Category deleted ||";
		// }
	}
 ?>





 <?php 
 include("admin.php");
  ?>
<div class="container">
	<div class="col-md-12">
 				<table class="table table-striped table-responsive">
 			<thead>
 				<tr>
 					<th>Head Office Address</th>
 					<th>Factory Address</th>
 					<th>Mobile No:</th>
 					<th>Phone No:</th>
 					<th>Email Id 1</th>
 					<th>Email Id 2</th>
 					<th>Action</th>
 				</tr>
 			</thead>
 			<tbody>	
 					<?php $query = mysqli_query($conn,"select * from details");
								$cnt = 1;
								while($row = mysqli_fetch_array($query))
								{
								 ?>
								 <tr>
								 	
								 	<td><?php echo htmlentities($row['headaddress']); ?></td>
								 	<td><?php echo htmlentities($row['factoryaddress']); ?></td>
								 	<td><?php echo htmlentities($row['mobileno']); ?></td>
								 	<td><?php echo htmlentities($row['phoneno']); ?></td>
								 	<td><?php echo htmlentities($row['email1']); ?></td>
								 	<td><?php echo htmlentities($row['email2']); ?></td>
								 	<td><a href="edit-details.php?id=<?php echo htmlentities($row['id']); ?>" class="btn btn-primary btn-xs">Edit</a><br><br>	<a href="setpersonaldetails.php?id=<?php echo $row['id'] ?>&del=delete" class="btn btn-danger btn-xs">Delete</a>
								 		</td>
								 </tr>
								 <?php 
								}?>		
 			</tbody>
 		</table>
 				</div>
 			</div>

</div><script>
	function show(){
		document.getElementById('category').style.display = "block";
	}
</script>

  <?php include("footer.php"); ?>