<!DOCTYPE html>
<html lang="en">

<head>
	<title>Eureka</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Sublime project">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
	<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
	<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
	<link rel="stylesheet" type="text/css" href="styles/responsive.css">
	<script type="text/javascript" src="js/index.js"></script>
</head>

<?php session_start(); ?>

<body>

	<div class="super_container">

		<!-- Header -->
		<?php
		include_once("header.php");
		?>
		<!-- Home -->

		<div class="home">

		<script>

		</script>

			<?php
			if (isset($_SESSION['li_user'])) {
			?>
				<script>
					var userId = <?php echo json_encode($_SESSION['li_user']['id']); ?>;
					var userName = <?php echo json_encode($_SESSION['li_user']['user']); ?>;
					var userLast = <?php echo json_encode($_SESSION['li_user']['lastname']);?>;
					var userAge = <?php echo json_encode($_SESSION['li_user']['age']); ?>;
					var userGender = <?php echo json_encode($_SESSION['li_user']['genre']); ?>;
					var userAddress = <?php echo json_encode($_SESSION['li_user']['address']); ?>;
					var userEmail = <?php echo json_encode($_SESSION['li_user']['email']); ?>;
				</script>

				<script>
					window.tracker.track("identify", {
						"userId": userId,
						"name": userName,
						"lastname": userLast,
						"age": userAge,
						"gender": userGender,
						"address": userAddress,
						"email": userEmail
					});
				</script>


			<?php
			}
			?>

			<div class="home_slider_container">



				<!-- Home Slider -->
				<div class="owl-carousel owl-theme home_slider">
					<?php
					$categ = $client->mongotest->Categories->findOne(['_id' => new MongoDB\BSON\ObjectID("609b6b80c267887c931481d2")]);
					$catnames = $categ['name'];
					?>

					<!-- Slider Item -->
					<div class="owl-item home_slider_item">
						<div class="home_slider_background" style="background-image:url(images/home_slider_1.jpg)">
						</div>
						<div class="home_slider_content_container">
							<div class="container">
								<div class="row">
									<div class="col">
										<div class="home_slider_content" data-animation-in="fadeIn" data-animation-out="animate-out fadeOut">
											<div class="home_slider_title">A new Online Shop experience.</div>
											<div class="home_slider_subtitle">Welcome to our new site, here you can find incredible products like computer gear, videogames, cameras and more!</div>
											<div class="button button_light home_button"><a href="/categories.php">Shop Now</a></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Slider Item -->
					<div class="owl-item home_slider_item">
						<div class="home_slider_background" style="background-image:url(images/game-ratings-featured.jpg)">
						</div>
						<div class="home_slider_content_container">
							<div class="container">
								<div class="row">
									<div class="col">
										<div class="home_slider_content" data-animation-in="fadeIn" data-animation-out="animate-out fadeOut">
											<div class="home_slider_title">Games, consoles and accesories.</div>
											<div class="home_slider_subtitle">Shop Eureka for video games, game consoles, and accessories. We're the video game store with a large selection of top brands and models of gaming systems.</div>
											<div class="button button_light home_button"><a href="products.php?key=63bc84a1f71ca172f3000bf4">Shop Now</a></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Slider Item -->
					<div class="owl-item home_slider_item">
						<div class="home_slider_background" style="background-image:url(images/Web_Banner_Size_final_2.jpg)">
						</div>
						<div class="home_slider_content_container">
							<div class="container">
								<div class="row">
									<div class="col">
										<div class="home_slider_content" data-animation-in="fadeIn" data-animation-out="animate-out fadeOut">
											<div class="home_slider_title">We have the best audio products</div>
											<div class="home_slider_subtitle">Performance Audio isn't new to Pro Audio & Video. With 40 years of experience, we know what we are talking about when it comes to audio equipment.</div>
											<div class="button button_light home_button"><a href="products.php?key=63bc78ff78307226c00564e2">Shop Now</a></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
				<!-- Home Slider Dots -->
				<div class="home_slider_dots_container">
					<div class="container">
						<div class="row">
							<div class="col">
								<div class="home_slider_dots">
									<ul id="home_slider_custom_dots" class="home_slider_custom_dots">
										<li class="home_slider_custom_dot active">01.</li>
										<li class="home_slider_custom_dot">02.</li>
										<li class="home_slider_custom_dot">03.</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>



		<!-- Ads -->

		<div class="avds">
			<div class="avds_container d-flex flex-lg-row flex-column align-items-start justify-content-between">
				<div class="avds_small">
					<div class="avds_background" style="background-image:url(images/avds_small.jpg)"></div>
					<div class="avds_small_inner">
						<div class="avds_discount_container">
							<img src="images/discount.png" alt="">
							<div>
								<div class="avds_discount">
									<div>20<span>%</span></div>
									<div>Discount</div>
								</div>
							</div>
						</div>
						<div class="avds_small_content">
							<div class="avds_title">Smart Phones</div>
							<div class="avds_link"><a href="products.php?key=63bc856d78307226c00564e3">See More</a></div>
						</div>
					</div>
				</div>
				<div class="avds_large">
					<div class="avds_background" style="background-image:url(images/avds_large.jpg)"></div>
					<div class="avds_large_container">
						<div class="avds_large_content">
							<div class="avds_title">Professional Cameras</div>
							<div class="avds_text">
								Shop the best photography equipment, digital cameras, lenses, pro audio & video and professional gear from top brands.
							</div>
							<div class="avds_link avds_link_large"><a href="products.php?key=63bcf11585d923f2c729255c">See More</a></div>
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

						<div class="product_grid">

							<!-- Product -->
							<?php

							$collection = $client->mongotest->Products->find();
							$Products = array();
							foreach ($collection as $entry) {
								$Products[$entry['_id']->__toString()] = $entry['name'];
							}

							?>

							<?php
							$i = 0;
							foreach ($Products as $key => $value) {

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
							<?php
								if (++$i == 8) break;
							}
							?>


						</div>

					</div>
				</div>
			</div>
		</div>

		<!-- Ad -->

		<div class="avds_xl">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="avds_xl_container clearfix">
							<div class="avds_xl_background" style="background-image:url(images/avds_xl.jpg)"></div>
							<div class="avds_xl_content">
							<div class="avds_title">Amazing Devices</div>
								<div class="avds_text">Shop the latest in tech at amazing prices, we got it all!</div>
								<div class="avds_link avds_xl_link"><a href="categories.php">See More</a></div>
							</div>
						</div>
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
								<p>We ship all of our products to any country in the world, free of charge.</p>
							</div>
						</div>
					</div>

					<!-- Icon Box -->
					<div class="col-lg-4 icon_box_col">
						<div class="icon_box">
							<div class="icon_box_image"><img src="images/icon_2.svg" alt=""></div>
							<div class="icon_box_title">Free Returns</div>
							<div class="icon_box_text">
								<p>If you're not happy with the product, you can return it in the first 60 days free of charge.</p>
							</div>
						</div>
					</div>

					<!-- Icon Box -->
					<div class="col-lg-4 icon_box_col">
						<div class="icon_box">
							<div class="icon_box_image"><img src="images/icon_3.svg" alt=""></div>
							<div class="icon_box_title">24h Fast Support</div>
							<div class="icon_box_text">
								<p>Fell free to contact us at any time, we will answer your inquiries as soon as possible.</p>
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
								<p>Subscribe to recieve information for new arrivals, promotions and more.</p>
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
							<div class="footer_logo"><a href="#">Eureka Test.</a></div>
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
	<script src="js/custom.js"></script>
</body>

</html>[]