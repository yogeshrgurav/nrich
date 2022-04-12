<?php  
	session_start();
	include('config.php');
	if(strlen($_SESSION['alogin'])==0){
		header('location:adminlogin.php');
	}
	else{
		if(isset($_POST['submit'])){
			$subcategory = $_POST['subcategory'];
			$slug = str_replace(' ', '-', strtolower($subcategory));
			$catid = $_POST['catid'];
			$image = $_FILES["image"]["name"];
     	    $dir = "subcategoryimages/$subcategory";
      		mkdir($dir);
      		move_uploaded_file($_FILES["image"]["tmp_name"], "subcategoryimages/$subcategory/".$_FILES["image"]["name"]);
			$sql = mysqli_query($conn,"insert into subcat (subcategory,slug,catid,image) values('$subcategory','$slug','$catid','$image')");
			$_SESSION['msg'] = "category created||";
		}
		if(isset($_GET['del'])) {
			$id=$_GET['id'];
			mysqli_query($conn,"delete from subcat where id='".$_GET['id']."'");
			$_SESSION['delmsg'] = "Category deleted ||";
		}
	}
 ?>





 <?php 
 include("admin.php");
  ?>
 	<div class="content">
 	<h1 class="text-center">Sub Category</h1>
 				<div class="card" id="category">	
 								<div class="card-header">
 											<h4 class="text-center">Create New Sub Category</h4>
 								</div>
 								<div class="card-body">	

 										<div class="row">
 											<div class="col-md-3"></div>
 											<div class="col-md-6 ">
 														<form method="post" enctype="multipart/form-data">
		 										<div class="form-group">
		   										
		   										<input type="text"  id="cat" name="subcategory" placeholder="Enter sub Category Name" class="form-control">
		 										</div>
		 										<div class="form-group">
              
                                                    <select name="catid" class="form-control">
                                                        <option>Select category</option>
                                                      <?php 
                                                        
                                            $query = mysqli_query($conn,"select * from category");
                                            while($row = mysqli_fetch_array($query)){
                                            
                                           ?>
                                                        <option value="<?php echo htmlentities($row['slug']); ?>"><?php echo htmlentities($row['categoryname']); ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>

	 												<div class="form-group">
	 												<label >Sub Category Image
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
              <?php $query = mysqli_query($conn,"select * from subcat");
								$cnt = 1;
								while($row = mysqli_fetch_array($query))
								{
								 ?>
								 <tr>
								 	<td><?php echo htmlentities($cnt); ?></td>
								 	<td><?php echo htmlentities($row['subcategory']); ?></td>
								 	<td><img class="img-responsive"src="subcategoryimages/<?php echo htmlentities($row['subcategory']); ?>/<?php echo htmlentities($row['image']); ?>"></td>
								 	<td><a href="edit-sub-category.php?id=<?php echo $row['id'] ?>" class="btn btn-warning">Edit</a>
								 		<a href="sub-category.php?id= <?php echo $row['id'] ?>&del=delete" onClick="return confirm('Are you sure you want to delete?')" class="btn btn-danger">Delete</a></td>
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

















