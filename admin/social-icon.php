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
		// 	$facebook = $_POST['facebook'];
		// 	$twitter = $_POST['twitter'];
		// 	$sql = mysqli_query($conn,"insert into social (facebook,twitter) values('$facebook','$twitter')");
		// 	$_SESSION['msg'] = "created||";
		// }
		// if(isset($_GET['del'])) {
		// 	$id=$_GET['id'];
		// 	mysqli_query($conn,"delete from social where id='".$_GET['id']."'");
		// 	$_SESSION['delmsg'] = "Category deleted ||";
		// }
	}
 ?>





 <?php 
 include("admin.php");
  ?>
<div class="content">
<!--   		<div id="topic">Set Details <span><button class="btn btn-primary" onclick="show()" style="float:right;margin-right: 50px;"	><i class="fa fa-plus"></i> Add New Details</button></div> -->
  <!-- 		<div class="card" id="category">	
 								<div class="card-header">
 											Change Address
 								</div>
 								<div class="card-body">	
 								<form method="post">				
	 							<div class="form-group">
	 								<label>Facebook</label>
	 								<input type="text" name="facebook" class="form-control">
	 							</div>
	 							
	 							<div class="form-group">
	 								<label>Twitter</label>
	 								<input type="text" name="twitter" class="form-control">
	 							</div>
	 							
	 							
	 							<button type="submit" class="btn btn-primary" name="submit">create</button>
													</form>
 								</div>
 				</div> -->
 				<table class="table table-striped">
 			<thead>
 				<tr>
 					<th>Sr No.</th>
 					<th>Facebook</th>
 					<th>Twitter</th>
 					<th>Action</th>
 				</tr>
 			</thead>
 			<tbody>	
 					<?php $query = mysqli_query($conn,"select * from social");
								$cnt = 1;
								while($row = mysqli_fetch_array($query))
								{
								 ?>
								 <tr>
								 	<td><?php echo htmlentities($cnt); ?></td>
								 	<td><?php echo htmlentities($row['facebook']); ?></td>
								 	<td><?php echo htmlentities($row['twitter']); ?></td>
								 	<td><a href="edit-social.php?id=<?php echo htmlentities($row['id']); ?>" class="btn btn-warning btn-xs">Edit</a>	
								 		</td>
								 </tr>
								 <?php $cnt = $cnt+1; 
								}?>		
 			</tbody>
 		</table>
 				
 			</div>

</div><script>
	function show(){
		document.getElementById('category').style.display = "block";
	}
</script>


  <?php include("footer.php"); ?>