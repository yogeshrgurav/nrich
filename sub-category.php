
<?php include('header.php') ?>

<header id="page-top" class="blog-banner">
    <!-- Start: Header Content -->
    <div class="container" id="blog">
        <div class="row blog-header text-center wow fadeInUp" data-wow-delay="0.5s">
            <div class="col-sm-12">
                <!-- Headline Goes Here -->
                <?php 
                $id = strval($_GET['category']);
                $query1 = mysqli_query($conn,"select * from subcat where catid = '$id'");
                while($row1 = mysqli_fetch_array($query1)){
                    $catid = $row1['catid'];
                }
                $query = mysqli_query($conn,"select categoryname from category where slug = '$catid'");
                while($row = mysqli_fetch_array($query))
                { ?>
                    <h3><?php echo htmlentities($row['categoryname']); ?></h3>
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
			$id = strval($_GET['category']);
			$query = mysqli_query($conn,"select * from subcat where catid = '$id'");
			while($row = mysqli_fetch_array($query))
			{ ?> 
            <div class="col-md-3 col-sm-12">
                <!-- product 1-->
                <div class="product_wrp">
                    <div class="product_img">
                    	<a href="products.php?subcategory=<?php echo htmlentities($row['slug']); ?>">
                        	<img alt="team" class="img-responsive" src="admin/subcategoryimages/<?php echo htmlentities($row['subcategory']); ?>/<?php echo htmlentities($row['image']); ?>">
                        </a>
                    </div>
                    <div class="product_info">
                    	<a href="products.php?subcategory=<?php echo htmlentities($row['slug']); ?>">
                        	<h4><?php echo htmlentities($row['subcategory']); ?></h4>
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