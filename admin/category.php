<?php  
	session_start();
	include('config.php');
	if(strlen($_SESSION['alogin'])==0){
		header('location:adminlogin.php');
	}
	else{
		if(isset($_POST['submit'])){
			$category = $_POST['category'];
			$slug = str_replace(' ', '-', strtolower($category));
			$image = $_FILES["image"]["name"];
     	    $dir = "categoryimages/$category";
      		mkdir($dir);
      		move_uploaded_file($_FILES["image"]["tmp_name"], "categoryimages/$category/".$_FILES["image"]["name"]);
			$sql = mysqli_query($conn,"insert into category (categoryname,slug,image) values('$category','$slug','$image')");
			$_SESSION['msg'] = "category created||";
		}
		if(isset($_GET['del'])) {
			$id=$_GET['id'];
			mysqli_query($conn,"delete from category where id='".$_GET['id']."'");
			$_SESSION['delmsg'] = "Category deleted ||";
		}
	}
 ?>





 <?php 
 include("admin.php");
  ?>
 	<div class="content">
 	<h1 class="text-center">Category</h1>
 				<div class="card" id="category">	
 								<div class="card-header">
 											<h4 class="text-center">Create New Category</h4>
 								</div>
 								<div class="card-body">	

 										<div class="row">
 											<div class="col-md-3"></div>
 											<div class="col-md-6 ">
 														<form method="post" enctype="multipart/form-data">
		 										<div class="form-group">
		   										
		   										<input type="text"  id="cat" name="category" placeholder="Enter Category Name" class="form-control">
		 										</div>

	 												<div class="form-group">
	 												<label >Category Image
	 												<input type="file" name="image">
	 												</label>
	 												</div>

	 												<div class="form-group text-center">
	 												<button type="submit" class="btn btn-primary" name="submit">create</button>
	 												</div>
													</form>
 											</div>
 											<div class="col-md-3"></div>
 										</div>
 								</div>
 				</div>


<h5>Manage Categories</h5>
 	
 	</div>
    

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-info">
        <div class="box-body table-responsive">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th width="50">SL</th>
                <th width="140">Category Name</th>
                <th width="100">Category Image</th>
                <th width="140">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $query = mysqli_query($conn,"select * from category");
								$cnt = 1;
								while($row = mysqli_fetch_array($query))
								{
								 ?>
								 <tr>
								 	<td><?php echo htmlentities($cnt); ?></td>
								 	<td><?php echo htmlentities($row['categoryname']); ?></td>
								 	<td><img class="img-responsive"src="categoryimages/<?php echo htmlentities($row['categoryname']); ?>/<?php echo htmlentities($row['image']); ?>"></td>
								 	<td><a href="edit-category.php?id= <?php echo $row['id'] ?>" class="btn btn-warning">Edit</a>
								 		<a href="category.php?id= <?php echo $row['id'] ?>&del=delete" onClick="return confirm('Are you sure you want to delete?')" class="btn btn-danger">Delete</a></td>
								 </tr>
								 <?php $cnt = $cnt+1; 
								}?>		
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>


</section>




<script>
	function show(){
		document.getElementById('category').style.display = "block";
	}

</script>



  <?php include("footer.php"); ?>

















