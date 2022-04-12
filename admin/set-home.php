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
      $about = $_POST['aboutus'];
      $image = $_FILES['image']['name'];
      
	  move_uploaded_file($_FILES["image"]["tmp_name"], "home/".$_FILES["image"]["name"]);

      $sql = mysqli_query($conn,"insert into home (aboutus,image) values ('$about','$image')");
      echo "<script>alert('hello');</script>";
      $_SESSION['msg'] = "category created||";
    }
    if(isset($_GET['del'])) {
      $id=$_GET['id'];
      mysqli_query($conn,"delete from home where id='".$_GET['id']."'");
      $_SESSION['delmsg'] = "Category deleted ||";
    }
  }
 ?>

<!DOCTYPE html>
<html>
<head>
  <title>Set Details</title>
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
  		<div id="topic">  Set Home <span><button class="btn btn-primary" onclick="show()" style="float:right;margin-right: 50px;" ><i class="fa fa-plus"></i> Add New Aboutus</button></span></div>
        <div class="card" id="category">  
                <div class="card-header">
                      Create Home About us
                </div>
                <div class="card-body"> 
                        <form method="post" enctype="multipart/form-data">
                        <textarea cols="15" rows=10 class="form-control" name="aboutus"></textarea>
                        <br>
                        Add Image:
                        <input type="file" name="image">
                          <button type="submit" class="btn btn-primary" name="submit">create</button>
                          </form>
                </div>
        </div>

  		<div class="card">	
 								<div class="card-header">
                  <h1>Home About Us</h1>
                </div>
 								<div class="card-body">	
                    <div class="form-group">
                      <?php 
                        $query = mysqli_query($conn,"Select * from home LIMIT 1");
                        while($row = mysqli_fetch_array($query)) {
                      echo htmlentities($row['aboutus']);
                      
                      
                       ?>
                        <br><br>
                        <img src="home/<?php echo htmlentities($row['image']); ?>">
                    </div>
                    <div class="form-group">
                        <a href="edit-home.php?id=<?php echo htmlentities($row['id']); ?>" class ="btn btn-primary">Edit Content</a>
                        <a href="edit-home-image.php?id=<?php echo htmlentities($row['id']); ?>" class ="btn btn-primary">Edit image</a>
                        <a href="set-home.php?id=<?php echo htmlentities($row['id']); ?>&del=delete" class="btn btn-danger">Delete</a>
                    </div>
                  <?php } ?>
                  
                </div>
              </div>
            </div>
          </div>
          <script>
  function show(){
    document.getElementById('category').style.display = "block";
  }
</script>
          </body>
          </html>