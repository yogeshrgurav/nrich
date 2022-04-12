
<?php include('header.php') ?>

<header id="page-top" class="blog-banner">
    <!-- Start: Header Content -->
    <div class="container" id="blog">
        <div class="row blog-header text-center wow fadeInUp" data-wow-delay="0.5s">
            <div class="col-sm-12">
                <!-- Headline Goes Here -->
                <?php 
                $id = strval($_GET['subcategory']);
                $query1 = mysqli_query($conn,"select * from products where subid = '$id'");
                while($row1 = mysqli_fetch_array($query1)){
                    $subid = $row1['subid'];
                }
                $query = mysqli_query($conn,"select subcategory from subcat where slug = '$subid'");
                while($row = mysqli_fetch_array($query))
                { ?>
                	<h3><?php echo htmlentities($row['subcategory']); ?></h3>
                <?php } ?>
            </div>
        </div>
        <!-- End: .row -->
    </div>
    <!-- End: Header Content -->
</header>

<section class="product-section product_pg_prod">
    <div class="container">
        <div class="row">
        	<?php 
			$id = strval($_GET['subcategory']);
			$query = mysqli_query($conn,"select * from products where subid = '$id'");
			while($row = mysqli_fetch_array($query))
			{
				$image1=explode(",",$row['image1']);
                $count_product_image=count($image1);
			 ?> 
            <div class="col-md-3 col-sm-12">
                <!-- product 1-->
                <div class="product_wrp">
                    <div class="product_img">
                    	<a href="product-detail.php?product=<?php echo htmlentities($row['slug']); ?>">
                    		<?php for($i=0;$i<1;$i++) { ?>
                        	<img class="img-responsive" src="admin/product/<?php echo $image1[$i];?>">
                        <?php } ?>
                        </a>
                    </div>
                    <div class="product_info">
                    	<a href="product-detail.php?product=<?php echo htmlentities($row['slug']); ?>">
                        	<h4><?php echo htmlentities($row['productname']); ?></h4>
                        </a>
                    </div>
                </div>
            </div>
        <?php } ?>
        </div>
        <!--/.row -->
    </div>
    <!--/.container -->
</section>

<?php include('footer.php') ?>