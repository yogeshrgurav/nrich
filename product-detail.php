
<?php include('header.php') ?>

    <!-- header -->
    <header id="page-top" class="blog-banner">
        <!-- Start: Header Content -->
        <div class="container" id="blog">
            <div class="row blog-header text-center wow fadeInUp" data-wow-delay="0.5s">
                <div class="col-sm-12">
                    <?php 
                    $id = strval($_GET['product']);
                    $query = mysqli_query($conn,"select productname from products where slug = '$id'");
                    while($row = mysqli_fetch_array($query))
                    { ?> 
                    <h3><?php echo htmlentities($row['productname']); ?></h3>
                <?php } ?>
                </div>
            </div>
            <!-- End: .row -->
        </div>
        <!-- End: Header Content -->
    </header>
    <!--/. header -->
 <!--/    
==================================================-->



 
<!-- End:Service Section 
==================================================-->
<?php 
$id = strval($_GET['product']);
$query = mysqli_query($conn,"select * from products where slug = '$id'");
while($row = mysqli_fetch_array($query))
{
$image1=explode(",",$row['image1']);
?> 
    <div class="shop-product-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="shop-products">
                        <div class="single-item-detail">
                            <?php if(count($image1) == '1') {  ?>
                            <div class="container-fluid">
                                <?php for($i=0;$i<count($image1);$i++) {?>
                                    <a class="thumbnail fancybox" rel="ligthbox" href="admin/product/<?php echo $image1[$i]; ?>">
                                        <img src="admin/product/<?php echo $image1[$i]; ?>" style="width: 100%">
                                    <?php } ?>
                                    </a>
                            </div>
                            <?php } ?>
                            <?php if(count($image1)>'1') {  ?>
                            <div class="productimg owl-carousel owl-theme container-fluid">
                                <?php for($i=0;$i<count($image1);$i++) {?>
                                    <div class="box-gallery" <?php if(count($image1)=='0' ) { ?> style="display:none;"
                                        <?php } ?> >
                                            <div class="item">
                                                <a class="thumbnail fancybox" rel="ligthbox" href="admin/product/<?php echo $image1[$i]; ?>">
                                                    <img src="admin/product/<?php echo $image1[$i]; ?>" alt="" class="img-fluid" style="width: 100%" >
                                                </a>
                                            </div>
                                    </div>
                            <?php } ?>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="allproduct-info">
                        <div class="tittle_product">
                            <a href="#"><?php echo htmlentities($row['productname']); ?></a>
                        </div>
                        <div class="allproduct-price-area">   
                            <div class="product_model">
                                <ul class="prd_model">
                                    <li><span>Model Number:</span>&nbsp;</li>
                                    <li class="model_no"><?php echo htmlentities($row['modelname']); ?></li>
                                </ul>
                                <ul class="prd_brand">
                                    <li><span>Brand:</span>&nbsp;</li>
                                    <li><?php echo htmlspecialchars_decode($row['brandname']); ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="p-content">
                            <?php echo htmlspecialchars_decode($row['productspec']); ?>
                        </div>
                        <div class="allchoices">
                            <div class="choice-icon">
                                <ul>
                                    <li>
                                        <a class="text-uppercase adtocart" href="#">Get Quote</a>
                                    </li>
                                    <li>
                                        <a class="text-uppercase adtocart" href="#">Get Quote</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<!--  Start: Related Product section
=============================================-->
    <section class="related_product_section">
        <!-- Container -->
        <div class="container">
            <!-- Title-->
            <div class="base-header">
                <h3>Related Products</h3>
            </div>
            <!--/ Title -->    
            <div class="row"> 
                <div class="col-sm-12">
                    <!-- client list  -->
                    <div class="owl-carousel owl-theme" id="related_prod">
                        <!-- Product 1 -->
                        <div class="item"> 
                            <div class="product_wrp">
                                <div class="product_img">
                                    <img alt="team" class="img-responsive" src="images/product_1.png">
                                    <div class="on_sale">
                                        <span>6%</span>
                                    </div>
                                </div>
                                <div class="product_info">
                                    <h4>Laptop</h4> 
                                    <ul class="product_rating">
                                        <li><i class="icon_star"></i></li>
                                        <li><i class="icon_star"></i></li>
                                        <li><i class="icon_star"></i></li>                               
                                        <li><i class="icon_star"></i></li>                                
                                        <li><i class="icon_star-half_alt"></i></li>
                                    </ul>
                                    <span class="product_price">$46.00</span>
                                </div>
                            </div>
                        </div>
                        <!-- Product 2  -->
                        <div class="item">
                            <div class="product_wrp">
                                <div class="product_img">
                                    <img alt="team" class="img-responsive" src="images/product_2.png">
                                </div>
                                <div class="product_info">
                                    <h4>Desktop</h4> 
                                    <ul class="product_rating">
                                        <li><i class="icon_star"></i></li>
                                        <li><i class="icon_star"></i></li>
                                        <li><i class="icon_star"></i></li>                               
                                        <li><i class="icon_star"></i></li>                                
                                        <li><i class="icon_star-half_alt"></i></li>
                                    </ul>
                                    <span class="product_price">$35.00</span>
                                </div>

                            </div>
                        </div>
                        <!-- Product 3 -->
                        <div class="item">
                            <div class="product_wrp">
                                <div class="product_img">
                                    <img alt="team" class="img-responsive" src="images/product_3.png">
                                    <div class="on_sale">
                                        <span>4%</span>
                                    </div>
                                </div>
                                <div class="product_info">
                                    <h4>Computer </h4> 
                                    <ul class="product_rating">
                                        <li><i class="icon_star"></i></li>
                                        <li><i class="icon_star"></i></li>
                                        <li><i class="icon_star"></i></li>                               
                                        <li><i class="icon_star"></i></li>                                
                                        <li><i class="icon_star-half_alt"></i></li>
                                    </ul>
                                    <span class="product_price">$58.00</span>
                                </div>
                            </div>
                        </div>
                        <!-- Product 4  -->
                        <div class="item">
                            <div class="product_wrp">
                                <div class="product_img">
                                    <img alt="team" class="img-responsive" src="images/product_4.png">
                                </div>
                                <div class="product_info">
                                    <h4>Monitor</h4> 
                                    <ul class="product_rating">
                                        <li><i class="icon_star"></i></li>
                                        <li><i class="icon_star"></i></li>
                                        <li><i class="icon_star"></i></li>                               
                                        <li><i class="icon_star"></i></li>                                
                                        <li><i class="icon_star-half_alt"></i></li>
                                    </ul>
                                    <span class="product_price">$84.00</span>
                                </div> 
                            </div>
                        </div>
                        <!-- Product 5 -->
 
                    </div>
                    <!--/ Product list -->
                </div>
                <!--/ Product list -->
            </div>
            <!--/ row - -->
        </div>
        <!--/ Container - -->
    </section>
    <!--   End: Related Product section
=============================================-->

<?php include('footer.php') ?>