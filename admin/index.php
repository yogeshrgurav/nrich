<?php
session_start();
include( 'config.php');
if (strlen($_SESSION['alogin'])==0)
{
    header('location:adminlogin.php');
}
else{
    date_default_timezone_set('Asia/Kolkata');//changing according timezone
    $currentTime = date( 'd-m-y h:i:s A', time() );

    if(isset($_POST['submit']))
    {	if ($_POST['new']==$_POST['confirm']) {
    	
    
        $sql=mysqli_query($conn, "SELECT password FROM admin WHERE password='".($_POST['current'])."'&& email='".($_SESSION['alogin'])."'");
        $num=mysqli_fetch_array($sql);
        if($num>0)
        {
            $b=mysqli_query($conn,"update admin set password='" .($_POST['new'])."',updationdate='$currentTime'where email='".$_SESSION['alogin']."'");
            $_SESSION['msg']="Password change successfully ||";
            echo "<script>alert('Password  changed sucessfully')</script>";
        }
        else
        {
            $_SESSION['msg']="Old Passwordnot match ||";
            echo "<script>alert('Old password didnot matched')</script>";
        }
    }
    else{
    	echo "<script>alert('New password does not match ||');</script>";
    }
    }}
    ?>



  <?php 

  include("admin.php");

   ?>
 	<div class="content">
 		<h1 class="text-center">Dashboard</h1>
 		<div class="row" id="change-password">
 		  <div class="col-md-3"></div>
 		  <div class="col-md-6">
             <div class="card">
               <div class="card-header text-center">
                   <h2>Change Password</h2>
               </div>
               <form method="post">
               <div class="card-body">
                   <div class="form-group">
                        <input type="password" name="current" class="form-control" placeholder="Current Password">
                   </div>
                   <div class="form-group">
                        <input type="password" name="new" class="form-control" placeholder="New Password">
                   </div>
                   <div class="form-group">
                        <input type="password" name="confirm" class="form-control" placeholder="Confirm New Password">
                   </div>
                   <br><br>
                   <div class="text-center">
                  <button class="btn btn-primary" name="submit" type="submit">Submit</button>
                  </div>
                   </form>
               </div>
               </div>     
          </div>
 		  <div class="col-md-3"></div>
 		</div>

 		
 	</div>
    



 







  <?php include("footer.php"); ?>
















