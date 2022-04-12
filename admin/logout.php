<?php 
	session_start();
	include("config.php");
	$_SESSION["alogin"]=="";
	date_default_timezone_set('Asia/kolkata');
	$date = date("d-m-y h:i:s A", time());
	mysqli_query($conn,"UPDATE userlog SET logout = '$date' WHERE useremail = '".$_SESSION['login']."'ORDER BY id DESC LIMIT 1");
	session_unset();
	session_destroy();
	$_SESSION['errmsg'] = "You have successfully logout";
 ?>
 <script type="text/javascript">
 	alert('successfully Loged out');
 	document.location = "adminlogin.php";
 </script>