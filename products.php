<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Sublime project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
    <link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="styles/categories.css">
    <link rel="stylesheet" type="text/css" href="styles/categories_responsive.css">
	<script type="text/javascript" src="js/index.js"></script>
	<script type="text/javascript" src="js/event.js"></script>
</head>

<body>

    <div class="super_container">

        <!-- Header -->

        <?php
        include_once("header.php");
        ?>

        <!-- Home -->
        <?php
        require 'vendor/autoload.php';
        $uri = "mongodb://localhost";

        $user = $client->mongotest->Users->findOne(['username' => $_SESSION['li_user']['user']]);
        $userID = $user['_id'];


        $cat = $_GET['key'];
        $collection = $client->mongotest->Products->find(['cat' => $cat]);
        $Products = array();
        foreach ($collection as $entry) {
            $Products[$entry['_id']->__toString()] = $entry['name'];
        }

        $categ = $client->mongotest->Categories->findOne(['_id' => new MongoDB\BSON\ObjectID($cat)]);
        $catnames = $categ['name'];
        $catdesc = $categ['desc'];

        ?>

        <title><?php echo $catnames ?></title>

        <?php if (isset($_SESSION['li_user'])) { ?>

        <script type="text/javascript">
            
            var userID = <?php echo json_encode(utf8_encode($userID)); ?>;

            var catKey = <?php echo json_encode($cat); ?>;

            console.log(userID);

            if (catKey == "63bc84a1f71ca172f3000bf4") {
                window.onload = function() {
                    categoryConsoles(userID);
                }
            }
            if (catKey == "609c994d1a47dc1b3d566464") {
                window.onload = function() {
                    categoryVideogames(userID);
                }
            }
            if (catKey == "63bc856d78307226c00564e3") {
                window.onload = function() {
                    categorySmartPhones(userID);
                }
            }
            if (catKey == "63bc78ff78307226c00564e2") {
                window.onload = function() {
                    categoryAudio(userID);
                }
            }
            if (catKey == "63bcf11585d923f2c729255c") {
                window.onload = function() {
                    categoryCameras(userID);
                }
            }
            if (catKey == "63bc883c6bec3f865607ed35") {
                window.onload = function() {
                    categoryAccessories(userID);
                }
            }
        </script>
        <?php } else { ?>
        <script type="text/javascript">
            var userID = null;

            var catKey = <?php echo json_encode($cat); ?>;

            if (catKey == "63bc84a1f71ca172f3000bf4") {
                window.onload = function() {
                    categoryConsoles(userID);
                }
            }
            if (catKey == "609c994d1a47dc1b3d566464") {
                window.onload = function() {
                    categoryVideogames(userID);
                }
            }
            if (catKey == "63bc856d78307226c00564e3") {
                window.onload = function() {
                    categorySmartPhones(userID);
                }
            }
            if (catKey == "63bc78ff78307226c00564e2") {
                window.onload = function() {
                    categoryAudio(userID);
                }
            }
            if (catKey == "63bcf11585d923f2c729255c") {
                window.onload = function() {
                    categoryCameras(userID);
                }
            }
            if (catKey == "63bc883c6bec3f865607ed35") {
                window.onload = function() {
                    categoryAccessories(userID);
                }
            }
        </script>




<?php } ?>


        <div class="home">
            <div class="home_container">
                <div class="home_background" style="background-image:url(images/categories.jpg)"></div>
                <div class="home_content_container">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="home_content">
                                    
                                    <div class="home_title"><?php echo $catnames ?><span>.</span></div>
                                    <div class="home_text">
                                        <p><?php echo $catdesc ?>
                                        <!--Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie eros. Sed viverra velit venenatis fermentum luctus.-->
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Products -->

        <div class="products">

            <div class="container">
                <div class="row">
                    <div class="col">

                        <!-- Product Sorting -->
                        <div class="sorting_bar d-flex flex-md-row flex-column align-items-md-center justify-content-md-start">
                            <div class="results">Showing <span><?php echo count($Products); ?></span> results</div>
                            <div class="sorting_container ml-md-auto">
                                <!--<div class="sorting">
                                    <ul class="item_sorting">
                                        <li>
                                            <span class="sorting_text">Sort by</span>
                                            <i class="fa fa-chevron-down" aria-hidden="true"></i>
                                            <ul>
                                                <li class="product_sorting_btn" data-isotope-option='{ "sortBy": "original-order" }'>
                                                    <span>Default</span>
                                                </li>
                                                <li class="product_sorting_btn" data-isotope-option='{ "sortBy": "price" }'><span>Price</span></li>
                                                <li class="product_sorting_btn" data-isotope-option='{ "sortBy": "stars" }'><span>Name</span></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>-->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">

                        <div class="product_grid">

                            <!-- Product -->

                            <?php foreach ($Products as $key => $value) {


                                $prod2 = $key;
                                $product2 = $client->mongotest->Products->findOne(['_id' => new MongoDB\BSON\ObjectID($prod2)]);
                                $names = $product2['name'];
                                $price = $product2['price'];
                                $img = $product2['img'];



                            ?>
                                <div class="product">
                                    <div class="product_image"><a href="product.php?key=<?php echo $key ?>"><img src="<?php echo $img ?>" alt="" style="height: 16rem; margin-left: auto; margin-right: auto; display:block;"></a></div>
                                    <!--<div class="product_extra product_sale"><a href="product.php?key=<? //php echo $key
                                                                                                            ?>">Sale</a></div>-->
                                    <div class="product_content">
                                        <div class="product_title"><a href="product.php?key=<?php echo $key ?>"><?php echo $value ?></a></div>
                                        <div class="product_price">$<?php echo $price ?></div>
                                    </div>
                                </div>


                            <?php } ?>


                        </div>
                        <!-- <div class="product_pagination">
                            <ul>
                                <li class="active"><a href="#">01.</a></li>
                                <li><a href="#">02.</a></li>
                                <li><a href="#">03.</a></li>
                            </ul>
                        </div>-->

                    </div>
                </div>
            </div>
        </div>

        <!-- Icon Boxes -->

        <div class="icon_boxes">
            <div class="container">
                <div class="row icon_box_row">

                    <!-- Icon Box -->
                    <div class="col-lg-4 icon_box_col">
                        <div class="icon_box">
                            <div class="icon_box_image"><img src="images/icon_1.svg" alt=""></div>
                            <div class="icon_box_title">Free Shipping Worldwide</div>
                            <div class="icon_box_text">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus.
                                    Sed nec molestie.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Icon Box -->
                    <div class="col-lg-4 icon_box_col">
                        <div class="icon_box">
                            <div class="icon_box_image"><img src="images/icon_2.svg" alt=""></div>
                            <div class="icon_box_title">Free Returns</div>
                            <div class="icon_box_text">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus.
                                    Sed nec molestie.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Icon Box -->
                    <div class="col-lg-4 icon_box_col">
                        <div class="icon_box">
                            <div class="icon_box_image"><img src="images/icon_3.svg" alt=""></div>
                            <div class="icon_box_title">24h Fast Support</div>
                            <div class="icon_box_text">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus.
                                    Sed nec molestie.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Newsletter -->

        <div class="newsletter">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="newsletter_border"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="newsletter_content text-center">
                            <div class="newsletter_title">Subscribe to our newsletter</div>
                            <div class="newsletter_text">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus.
                                    Sed nec molestie eros</p>
                            </div>
                            <div class="newsletter_form_container">
                                <form action="#" id="newsletter_form" class="newsletter_form">
                                    <input type="email" class="newsletter_input" required="required">
                                    <button class="newsletter_button trans_200"><span>Subscribe</span></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->

        <div class="footer_overlay"></div>
        <footer class="footer">
            <div class="footer_background" style="background-image:url(images/footer.jpg)"></div>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="footer_content d-flex flex-lg-row flex-column align-items-center justify-content-lg-start justify-content-center">
                            <div class="footer_logo"><a href="#">Sublime.</a></div>
                            <div class="copyright ml-auto mr-auto">
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;
                                <script>
                                    document.write(new Date().getFullYear());
                                </script> All rights reserved | This
                                template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </div>
                            <div class="footer_social ml-lg-auto">
                                <ul>
                                    <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="styles/bootstrap4/popper.js"></script>
    <script src="styles/bootstrap4/bootstrap.min.js"></script>
    <script src="plugins/greensock/TweenMax.min.js"></script>
    <script src="plugins/greensock/TimelineMax.min.js"></script>
    <script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
    <script src="plugins/greensock/animation.gsap.min.js"></script>
    <script src="plugins/greensock/ScrollToPlugin.min.js"></script>
    <script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
    <script src="plugins/Isotope/isotope.pkgd.min.js"></script>
    <script src="plugins/easing/easing.js"></script>
    <script src="plugins/parallax-js-master/parallax.min.js"></script>
    <script src="js/categories.js"></script>
</body>

</html>