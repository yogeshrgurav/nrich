<!DOCTYPE html>
<html lang="zxx">
<?php include('admin/config.php'); ?>
<head>
    <!-- TITLE OF SITE -->
    <title>Nrich Info-Solution</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Fizxila - Repair Service HTML5 Responsive Template" />
    <meta name="keywords" content="Fizxila, Repair, Service, one page, multipage, responsive, landing, html template" />
    <meta name="author" content="Fizxila">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Favicons -->
    <link rel="icon" type="image/png" href="images/logo/fav.png">


    <!-- CSS Begins
================================================== -->
    <!--Animate Effect-->
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/hover.css" rel="stylesheet">

    <!-- For Image Preview -->
    <link rel="stylesheet" href="css/magnific-popup.css">

    <!--Owl Carousel -->
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.transitions.css" rel="stylesheet">

    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/slick-theme.css">

    <!--BootStrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/normalize.css" rel="stylesheet">

    <!-- Main Style -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">


</head>

<body>

    <!-- Start: Header Section
==================================================-->
    <div class="header_topbar">
        <!-- Logo -->
        <div class="container">
            <div class="row">
                <div class="header_top_right list-unstyled">
                    <ul>
                        <li><i class="fa fa-phone"></i>+1234567890</li>
                        <li><i class="fa fa-globe"></i>Vikhroli</li>
                    </ul>
                </div>
                <div class="header_top_left">
                    <ul class="header_socil list-inline pull-left">
                        <li><i class="fa fa-envelope"></i>info@example.com</li>
                        <li>
                            <a href="#" class="fa fa-facebook"></a>
                        </li>
                        <li>
                            <a href="#" class="fa fa-twitter"></a>
                        </li>
                        <li>
                            <a href="#" class="fa fa-linkedin"></a>
                        </li>
                        <li>
                            <a href="#" class="fa fa-google-plus"></a>
                        </li>
                    </ul>
                </div>
                <a class="more-link" href="#">Get a quote</a>
            </div>
        </div>
    </div>
    <!-- End: Header Info -->

    <!-- Start: header navigation -->
    <div class="navigation">
        <div class="container">
            <div class="row">
                <div class="logo col-md-4 col-sm-12">
                    <a href="index.php"><img class="img-responsive" src="images/logo/logo.png" alt="">
                    </a>
                </div>
                <div class="col-md-8 col-sm-12">
                    <div class="main-nav">
                        <div id="navigation">
                        <ul>
                            <li class="active"><a href="index.php">Home</a></li>
                            <li class="active"><a href="#">About Us</a></li>
                            <li class="has-sub"><a href="product.html">Product's</a>
                                <ul>
                                <?php $query = mysqli_query($conn,"select * from category");
                                while($row = mysqli_fetch_array($query))
                                {
                                 ?>
                                    <li><a href="sub-category.php?category=<?php echo $row['slug'] ?>"><?php echo htmlentities($row['categoryname']); ?></a>
                                    </li>
                                <?php } ?>
                                </ul>
                            </li>
                            <li><a href="#">Contact</a>
                            </li>
                        </ul>
                    </div>
                    </div>
                    <!-- End: Menu  -->
                </div>
            </div>
            <!--/ row -->
        </div>
        <!--/ container -->
    </div>
    <!-- End: header navigation -->