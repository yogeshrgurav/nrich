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
      $id = intval($_GET['id']);
      $sql = mysqli_query($conn,"update home set aboutus='$about',updationdate = '$currentTime' where id = '$id'");
      $_SESSION['msg'] = "created||";
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
  		<div id="topic">Set About us</div>
  		<div class="card">	
 								<div class="card-header">
 											Add About Us
 								</div>
 								<div class="card-body">	
                   <form method="post">
                    <div class="form-group">
                      <?php 
                      $id = intval($_GET['id']);
                        $query = mysqli_query($conn,"Select * from home where id= '$id'");
                        while($row = mysqli_fetch_array($query)) {
                      
                       ?>
                      <textarea rows=20 cols=10 class="form-control" name="aboutus"><?php 
                          echo htmlentities($row['aboutus']);
                         ?></textarea> 
                    
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-primary">
                    </div>
                  <?php } ?>
                  </form>
                </div>
              </div>
            </div>
          </div>
          </body>
          </html>