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
      $infra = $_POST['infra'];
      $id = intval($_GET['id']);
      $sql = mysqli_query($conn,"update aboutus set infra='$infra',updationdate = '$currentTime' where id = '$id'");
      $_SESSION['msg'] = "category created||";
    }
    
  }
 ?>




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
                        $query = mysqli_query($conn,"Select * from aboutus where id= '$id'");
                        while($row = mysqli_fetch_array($query)) {
                      
                       ?>
                      <textarea rows=20 cols=10 class="form-control" name="infra"><?php echo htmlentities($row['infra']);?></textarea> 
                    
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
      <?php include("footer.php"); ?>