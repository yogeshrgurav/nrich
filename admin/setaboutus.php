<?php  
  session_start();
  include('config.php');
  if(strlen($_SESSION['alogin'])==0){
    header('location:adminlogin.php');
  }
  else{
    // date_default_timezone_set('Asia/kolkata');
    // $currentTime = date('d-m-y h:i:s A',time());
    // if(isset($_POST['submit'])){
    //   $about = $_POST['aboutus'];
    //   $image = $_FILES['image']['name'];
	   //  move_uploaded_file($_FILES["image"]["tmp_name"], "aboutus/".$_FILES["image"]["name"]);
    //   $sql = mysqli_query($conn,"insert into aboutus (aboutus,image) values ('$about','$image')");
    //   $_SESSION['msg'] = "category created||";
    // }
    // if(isset($_GET['del'])) {
    //   $id=$_GET['id'];
    //   mysqli_query($conn,"delete from aboutus where id='".$_GET['id']."'");
    //   $_SESSION['delmsg'] = "Category deleted ||";
    // }
  }
 ?>


 <?php 
 include("admin.php");
  ?>
<div class="container">

  	<!-- 	<div id="topic">  Set About Us <span>
        <button class="btn btn-primary" onclick="show()" style="float:right;margin-right: 50px;" ><i class="fa fa-plus"></i> Add New Aboutus</button>
      </span></div> -->
  <!--       <div class="card" id="category">  
                <div class="card-header">
                      Create About us
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
        </div> -->

        <div class="row">
           <div class="col-md-12">
             <h1>About Us</h1>
           </div>
          <?php 
              $query = mysqli_query($conn,"Select * from aboutus LIMIT 1");
              while($row = mysqli_fetch_array($query)) {
              ?>
          <div class="col-md-4">
             <p><?php echo htmlentities($row['aboutus']); ?></p>

          </div>
          <div class="col-md-4">
            <img src="aboutus/<?php echo htmlentities($row['image']); ?>" class="img-responsive">
          </div>
          <div class="col-md-3">
            <a href="edit-aboutus.php?id=<?php echo htmlentities($row['id']); ?>" class ="btn btn-primary">Edit Content</a>
                        <a href="edit-aboutus-image.php?id=<?php echo htmlentities($row['id']); ?>" class ="btn btn-primary">Edit image</a>
          </div>

            <?php } ?>
        </div>




        <div class="row">
          <div class="col-md-12">
            <br>
            <h1 class="text-center">Infrastructure</h1>
          </div>
           <?php 
                        $query = mysqli_query($conn,"Select * from aboutus LIMIT 1");
                        while($row = mysqli_fetch_array($query)) {
                       ?>

          <div class="col-md-3">
            <p><?php echo htmlentities($row['infra']); ?></p>
          </div>
          <div class="col-md-3">
             <h3>Infrastructure 1</h3>
                        <img src="aboutus/<?php echo htmlentities($row['infraimage1']); ?>" class="img-responsive">
          </div>
          <div class="col-md-3">
            <h3>Infrastructure 2</h3>
                        <img src="aboutus/<?php echo htmlentities($row['infraimage2']); ?>" class="img-responsive">
          </div>
          <div class="col-md-3">
              <a href="edit-infra.php?id=<?php echo htmlentities($row['id']); ?>" class ="btn btn-primary btn-xs">Edit Content</a>
                        <a href="edit-infra-image.php?id=<?php echo htmlentities($row['id']); ?>" class ="btn btn-primary btn-xs">Edit image</a>
          </div>
       
     <?php } ?>
      </div>


  		<div class="card">	
 								
         

              

                <div class="card-header">
                  <h1>vision</h1>
                </div>
                <div class="card-body"> 
                    <div class="form-group">
                      <?php 
                        $query = mysqli_query($conn,"Select * from aboutus LIMIT 1");
                        while($row = mysqli_fetch_array($query)) {
                          ?>
                        <p><?php echo htmlentities($row['vision']); ?></p>
                        
                    </div>
                    <div class="form-group">
                        <a href="edit-vision.php?id=<?php echo htmlentities($row['id']); ?>" class ="btn btn-primary">Edit Content</a>
                        
                        
                    </div>
                  <?php } ?>
                  
                </div>

                <div class="card-header">
                  <h1>Mission</h1>
                </div>
                <div class="card-body"> 
                    <div class="form-group">
                      <?php 
                        $query = mysqli_query($conn,"Select * from aboutus LIMIT 1");
                        while($row = mysqli_fetch_array($query)) {
                          ?>
                        <br><br>
                        <p><?php echo htmlentities($row['mission']); ?></p>
                    </div>
                    <div class="form-group">
                        <a href="edit-mission.php?id=<?php echo htmlentities($row['id']); ?>" class ="btn btn-primary">Edit Content</a>
                        
                        
                    </div>
                  <?php } ?>
                  
                </div>
              </div>
      

          </div>
          <script>
  function show(){
    document.getElementById('category').style.display = "block";
  }
</script>
  <?php include("footer.php"); ?>