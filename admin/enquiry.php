<?php 
  session_start();
  include('config.php');
  if(strlen($_SESSION['alogin'])==0){
    header('location:adminlogin.php');
  }
  if(isset($_GET['del'])) {
      $id=$_GET['id'];
      mysqli_query($conn,"delete from enquiry where id='".$_GET['id']."'");
      $_SESSION['delmsg'] = "Category deleted ||";
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
<body style="overflow-x: auto;">


 <?php 
 include("admin.php");
  ?>
<div class="content">
  		<div id="topic">Enquiry</div>
  			
              <h5>See Customer Enquiry</h5>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Sr No.</th>
          <th>Name</th>
          <th>Email</th>
          <th>Contact</th>
          <th>Subject</th>
          <th>Requirement</th>
          <th>Reg date</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody> 
        <?php 
          $query = mysqli_query($conn,"select  * from enquiry");
            $cnt = 1;
          while($row = mysqli_fetch_array($query)){
         ?>
            <tr>
              <th><?php echo $cnt; ?></th>
              <th><?php echo htmlentities($row['name']); ?></th>
              <th><?php echo htmlentities($row['email']); ?></th>
              <th><?php echo htmlentities($row['contact']); ?></th>
              <th><?php echo htmlentities($row['subject']); ?></th>
              <th><?php echo htmlentities($row['description']); ?></th>
              <th><?php echo htmlentities($row['creationdate']); ?></th>
              <th><a href="enquiry.php?id=<?php echo $row['id'] ?>&del=delete" class="btn btn-danger">Delete</a></th>
            </tr>
            <?php $cnt = $cnt +1;} ?>
      </tbody>
    </table>
            </div>
          </div>
          </body>
          </html>