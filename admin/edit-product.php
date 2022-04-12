<?php 
	session_start();
	include('config.php');
	if(strlen($_SESSION['alogin'])==0) {
		header('location:adminlogin.php');
	}
	else{
		$id = intval($_GET['id']);
		if (isset($_POST['submit'])) {
			$productname = $_POST['productname'];
			trim($productname);
      		$slug = str_replace(' ', '-', strtolower($productname));
			$catid = $_POST['catid'];
			$subid = $_POST['subid'];
			$modelname = $_POST['modelname'];
			$brandname = $_POST['brandname'];
			$stock = $_POST['stock'];
			$productfeature = $_POST['productfeature'];
			$productspec = $_POST['productspec'];

			  $img_file = count($_FILES['productimage']['name']);

			  $image = implode(',', $_POST['productimage']);

			  if(count(array($img_file)) > 0) {

			  //     echo "<pre>"; print_r(count($image));
			  // exit();
			    
			    if($_FILES['productimage']['error'][0] == 0)
			      {
			        if(count(@$_POST['productimage'])>0){
			        $image .= ',';
			       }
			    }   
			    
			    for($i=0;$i<$img_file;$i++)
			    {
			      if($_FILES['productimage']['error'][$i] == 0) {
			        $folder = "product/";
			        $img_name = time().$_FILES['productimage']['name'][$i];
			        $img_temp = $_FILES['productimage']['tmp_name'][$i];
			        $img_type = $_FILES['productimage']['type'][$i];
			        $move_img = $folder.$img_name;
			        $fullpathimg = $img_name;
			        
			        if($img_type == 'image/jpeg' || $img_type == 'image/jpg' || $img_type == 'image/png')
			        {
			          move_uploaded_file($img_temp,$move_img);
			        }

			        if($i<($img_file-1))
			        {
			          $image .= $fullpathimg.",";
			        }
			        else
			        {
			          $image .= $fullpathimg;
			        }
			      }
			    }
			  }

			$sql = mysqli_query($conn,"update products set productname = '$productname',slug = '$slug', catid = '$catid', subid = '$subid', modelname = '$modelname', brandname = '$brandname', stock = '$stock', productfeature = '$productfeature', productspec = '$productspec', image1 = '$image' where id = '$id'");
			$_SESSION['msg'] = "Category updated ||";
			echo "<script>alert('successfully updated ');</script>";
		}
		
	}
 ?>
<?php
  $id = intval($_GET['id']); 
  $sql=mysqli_query($conn,"Select * from products where id='$id'");
  $row1=mysqli_fetch_array($sql);
  $cat_id = $row1['catid'];
  $category_list=mysqli_query($conn,"select categoryname from category where slug='$cat_id'");
  $fetch_sqls=mysqli_fetch_array($category_list);
  $cat_name=$fetch_sqls['categoryname'];

  $subcat_id = $row1['subid'];
  $subcategory_list=mysqli_query($conn,"select subcategory from subcat where slug='$cat_id'");
  $subfetch_sqls=mysqli_fetch_array($subcategory_list);
  $subcat_name=$subfetch_sqls['subcategory'];
?>


 <?php 
 include("admin.php");
  ?>
 	<div class="content">
 		<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
      <div >
        <h1 class="text-center">Add Product</h1>
 		<div class="card" id="edit-image">	
 			<div class="card-body">	
 				<form method="post" enctype="multipart/form-data">
					<?php 
				$id = intval($_GET['id']);
				$query = mysqli_query($conn,"select * from products where id = '$id'");
				while($row = mysqli_fetch_array($query))
				{
					$productimage=explode(",",$row['image1']);
                    $count_product_image=count($productimage);
				 ?> 
					<div class="form-group">
						<label class=" control-label">Product Name</label>
						<input type="text" name="productname" class="form-control" value="<?php echo htmlentities($row['productname']); ?>">
					</div>


					<div class="form-group">
			            <label for="" class="control-label">Select Category<span>*</span></label>
			                <select name="catid" class="form-control">
			                  <?php
			                    if($cat_id!=NULL)
			                     {
			                    ?>
			                     <option value="<?php echo $cat_id;?>"><?php echo $cat_name;?></option>
			                    <?php
			                     }
			                     else
			                     {
			                     ?>
			                <option selected disabled >Select Category</option>
			                <?php 
			            }
			                $id = intval($_GET['id']);
			               $query2 = mysqli_query($conn,"select * from category where slug!='$cat_id'");
			                while($row2 = mysqli_fetch_array($query2)){
			       ?>
			               
			                <option value="<?php echo htmlentities($row2['slug']); ?>"><?php echo htmlentities($row['categoryname2']); ?></option>
			                <?php } ?>
			                </select>
			        </div>

			        <div class="form-group">
			            <label for="" class="control-label">Select Subcategory<span>*</span></label>
			                <select name="subid" class="form-control">
			                  <?php
			                    if($subcat_name!=NULL)
			                     {
			                    ?>
			                     <option value="<?php echo $subcat_name;?>"><?php echo $subcat_name;?></option>
			                    <?php
			                     }
			                     else
			                     {
			                     ?>
			                <option selected disabled >Select Category</option>
			                <?php 
			            }
			                $id = intval($_GET['id']);
			               $query3 = mysqli_query($conn,"select * from sub where slug!='$subcat_id'");
			                while($row3 = mysqli_fetch_array($query3)){
			       ?>
			               
			                <option value="<?php echo htmlentities($row3['slug']); ?>"><?php echo htmlentities($row3['categoryname']); ?></option>
			                <?php } ?>
			                </select>
			        </div>



					<div class="form-group ">
					      <label class=" control-label">Model Name</label>
					    <input type="text" class="form-control" id="cat" name="modelname" value="<?php echo htmlentities($row['modelname']); ?>">
					    </div>

					    <div class="form-group ">
					      <label class=" control-label">Brand Name</label>
					    <input type="text" class="form-control" id="cat" name="brandname" value="<?php echo htmlentities($row['brandname']); ?>">
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
					        	<?php echo htmlentities($row['productfeature']); ?>
					        </textarea>
					      </div> 
					    </div>

					    <div class="form-group">
					      <label class=" control-label">Product Specification</label>
					      <div>
					        <textarea class="form-control" name="productspec" id="editor2">
					        	<?php echo htmlentities($row['productspec']); ?>
					        </textarea>
					      </div> 
					    </div>

					    <div class="form-group">
			              <label for="" class="control-label">Add More Image</label>
			               <input type="file" multiple id="fileUpload" class="default" name="productimage[]"/>
			            </div>

				<?php } ?>		
						<?php
                      for($i=0;$i<$count_product_image;$i++)
                      {
                    ?>
                    <div class="col-md-12">
                        <div class="form-group col-md-6">		

                           <div  id="show_img<?php echo $i;?>">
                            <input  class="form-control" name="productimage[]"  type="hidden"  value="<?php echo $productimage[$i]; ?>" /><br /><br />
                            <a onclick="delete_img(<?php echo $i;?>)" style="color:#fff; cursor:pointer; font-weight:bold; float:right;background-color: #083952;padding: 10px;    border-radius: 6px;" > Delete </a>
                           <img src="product/<?php echo $productimage[$i];?>"  style="width:80px;height:80px;"/>
                          </div>

                     	</div>
                     </div> 
                <?php } ?>
	 			<button type="submit" class="btn btn-primary" name="submit">update</button>							
				</form>							
 			</div>
 		</div>
 	</div>

 		</div>
 	</div>
 <script>
 	    function delete_img(i)
    {
        if (confirm("The image will be deleted after updating the product.") == true) {
            document.getElementById('show_img'+i).remove();
        }
    }
 </script>
  <?php include("footer.php"); ?>