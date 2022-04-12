<?php
session_start();
error_reporting(0);
include("config.php");

if(isset($_POST['submit']))
{
  $email=$_POST['email'];
    $password=$_POST['password'];
    $ret=mysqli_query($conn,"SELECT * FROM admin WHERE email='$email' and password='$password'");
    $num=mysqli_fetch_array($ret);

    if($num>0)
    {
      $extra="index.php";
      $_SESSION['alogin']=$_POST['email'];
      $_SESSION['id']=$num['id'];
      $host=$_SERVER['HTTP_HOST'];
      $uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
      header("location:http://$host$uri/$extra");
      exit();
    }
    else
    {
      echo "<script> alert('Invalid email or Password'); window.location='adminlogin.php';</script>";
      $_SESSION['errmsg']="Invalid email or password";
      $extra="adminlogin.php";
      $host=$_SERVER['HTTP_HOST'];
        $uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
        header("location:http://$host$uri/$extra");
        exit();
    }
}
?>

 <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/ionicons.min.css">
  <link rel="stylesheet" href="css/datepicker3.css">
  <link rel="stylesheet" href="css/all.css">
  <link rel="stylesheet" href="css/select2.min.css">
  <link rel="stylesheet" href="css/dataTables.bootstrap.css">
  <link rel="stylesheet" href="css/AdminLTE.min.css">
  <link rel="stylesheet" href="css/_all-skins.min.css">

  <link rel="stylesheet" href="style.css">
</head>

<body class="hold-transition login-page sidebar-mini">

<div class="login-box">
  <div class="login-logo">
    <b>Admin Panel</b>
  </div>
    <div class="login-box-body">
      <p class="login-box-msg">Log in to start your session</p>
    


    <form action="" method="post">
      <div class="form-group has-feedback">
        <input class="form-control" placeholder="Email address" name="email" type="email" autocomplete="off" autofocus>
      </div>
      <div class="form-group has-feedback">
        <input class="form-control" placeholder="Password" name="password" type="password" autocomplete="off" value="">
      </div>
      <div class="row">
        <div class="col-xs-8"></div>
        <div class="col-xs-4">
          <input type="submit" class="btn btn-primary btn-block btn-flat login-button" name="submit" value="Log In">
        </div>
      </div>
    </form>
  </div>
</div>


<script src="js/jquery-2.2.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>
<script src="js/select2.full.min.js"></script>
<script src="js/jquery.inputmask.js"></script>
<script src="js/jquery.inputmask.date.extensions.js"></script>
<script src="js/jquery.inputmask.extensions.js"></script>
<script src="js/moment.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/icheck.min.js"></script>
<script src="js/fastclick.js"></script>
<script src="js/jquery.sparkline.min.js"></script>
<script src="js/jquery.slimscroll.min.js"></script>
<script src="js/app.min.js"></script>
<script src="js/demo.js"></script>

</body>
</html>