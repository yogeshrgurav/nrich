<?php
  session_start();
  include("config.php");
  if(strlen($_SESSION['alogin'])==0)
  {
    header('location:adminlogin.php');
  }
  else{
    if(isset($_POST['submit']))
    {
      $productname = $_POST['productname'];
      trim($productname);
      $slug = str_replace(' ', '-', strtolower($productname));
      $subid = $_POST['subid'];
      $catid = $_POST['catid'];
      $productfeature = $_POST['productfeature'];
      $productspec = $_POST['productspec'];

      $modelname = $_POST['modelname'];        
      $brandname = $_POST['brandname'];        
      $stock = $_POST['stock'];        

      $image = $_FILES['image1']['name'];

        // echo $productname;
        // echo $subid;
        // echo $catid;
        // echo $productfeature;
        // echo $productspec;
        // echo $modelname;
        // echo $brandname;
        // echo $stock;
        // echo $image;
        // exit();

        

    for($i=0;$i<count($image);$i++)
    { 
      $folder = "product/";
      $img_name = time().$_FILES['image1']['name'][$i];
      
      $img_type = $_FILES['image1']['type'][$i];
      $img_temp = $_FILES['image1']['tmp_name'][$i];
      $move_img = $folder.$img_name;
      $full_path_img[] = $img_name;
      if($img_type=='image/jpeg' || $img_type=='image/jpg' || $img_type='image/png')
      {   
        move_uploaded_file($img_temp,$move_img);
      }
    }
    $implode_full_path_img = implode(",",$full_path_img);


      $sql = mysqli_query($conn,"insert into products(productname,slug,modelname,brandname,stock,catid,subid,image1,productfeature,productspec) values('$productname','$slug','$modelname','$brandname','$stock','$catid','$subid','$implode_full_path_img','$productfeature','$productspec')");
      echo "<script type='text/javascript'>alert('Product Successfully added');</script>";
    }
    if(isset($_GET['del'])) {
      $id=$_GET['id'];
      mysqli_query($conn,"delete from products where id='".$_GET['id']."'");
      $_SESSION['delmsg'] = "deleted ||";
      echo "<script type='text/javascript'>alert('Product Successfully Deleted');</script>";
    }
  }
?>

  <?php include("admin.php"); ?>



  <section class="content">
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
      <div >
        <h1 class="text-center">Add Product</h1>

        <h4 class="text-center">Enter Product Details</h4>
         <form method="post" enctype="multipart/form-data">

            <div class="form-group">
              <label class=" control-label">Category</label>
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
              <label class=" control-label">Sub-Category</label>
                <select name="subid" class="form-control">
                    <option value="0">Select Sub Category</option>
                  <?php 
                    
        $query = mysqli_query($conn,"select * from subcat");
        while($row = mysqli_fetch_array($query)){
        
       ?>
                    <option value="<?php echo htmlentities($row['slug']); ?>"><?php echo htmlentities($row['subcategory']); ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group ">
              <label class=" control-label">Product Name</label>
            <input type="text" class="form-control" id="cat" name="productname" placeholder="Enter Product Name">
            </div>

            <div class="form-group ">
              <label class=" control-label">Model Name</label>
            <input type="text" class="form-control" id="cat" name="modelname" placeholder="Enter Product Name">
            </div>

            <div class="form-group ">
              <label class=" control-label">Brand Name</label>
            <input type="text" class="form-control" id="cat" name="brandname" placeholder="Enter Product Name">
            </div>

            <div class="form-group">
              <label class=" control-label">Stock</label>
                <select name="stock" class="form-control">
                    <option value="1">In Stock</option>
                    <option value="0">Out of Stock</option>
                </select>
            </div>
          

            <div class="form-group">
              <label class=" control-label">Product Feature</label>
              <div>
                <textarea class="form-control" name="productfeature" id="editor1">
                </textarea>
              </div> 
            </div>

            <div class="form-group">
              <label class=" control-label">Product Specification</label>
              <div>
                <textarea class="form-control" name="productspec" id="editor2">
                </textarea>
              </div> 
            </div>
            
            <div class="form-group">
            <label>Select Image  </label>              
              <input type="file" id="cat" name="image1[]" multiple="multiple">
            </div>
            
            <div class="form-group text-center">
            <button class="btn btn-primary" type="submit" name="submit">Add Product</button>
            </div>
          </form>
      </div>
    </div>
    <div class="col-md-3"></div>
    
  </div>
  </section>        


  <section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-info">
        <div class="box-body table-responsive">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th width="50">SL</th>
                <th width="140">Product Name</th>
                <th width="100">Product Image</th>
                <th width="140">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $query = mysqli_query($conn,"select * from products");
                $cnt = 1;
                while($row = mysqli_fetch_array($query))
                {
                  $image1=explode(",",$row['image1']);
                  $count_product_image=count($image1);
                 ?>
                <tr>
                  <td><?php echo htmlentities($cnt); ?></td>
                  <td><?php echo htmlentities($row['productname']); ?></td>
                  <td>
                    <?php
        for($i=0;$i<1;$i++)
        {
          ?>
          <img src="product/<?php echo $image1[$i];?>" style="height:50px;width:50px;" /></img>
            <?php
          
              }
      ?>
                  </td>
                  <td>                    
                     <a href="edit-product.php?id=<?php echo $row['id'] ?>" class="btn btn-warning btn-xs">Edit</a>
                    <a href="product.php?id=<?php echo $row['id'] ?>&del=delete" onClick="return confirm('Are you sure you want to delete?')" class="btn btn-danger btn-xs">Delete</a>  
                  </td>
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
    





<!-- <script>
  function show(){
    document.getElementById('category').style.display = "block";
  }
</script> -->

<?php include('footer.php'); ?>
















