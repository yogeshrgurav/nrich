 <?php 
 session_start();
  ?>
 <!DOCTYPE html>
<html>
<head>
  <title>Admin</title>
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
	 	<h1>Add Company Broucher</h1>
	 <form method="post" enctype="multipart/form-data">
	 	<input type="file" name="file">
	 	<input type="submit" name="Upload" value="Upload">
	 </form>
	 <?php 
	 	if (isset($_POST['Upload'])){
	 		$file = $_FILES["file"];
	 		move_uploaded_file($file["tmp_name"], "upload/".$file["name"]);
	 	}
	 	$files = scandir("upload");
	 	for($a = 2;$a<count($files);$a++){

	 	?>
	 	<p>
	 	<a download="<?php echo $files[$a]; ?>" href="upload/<?php echo $files[$a]; ?>"><?php echo $files[$a]; ?></a>
	 	</p>
<?php } ?>
	</div>
	 </div>
	 </body>
	</html>
