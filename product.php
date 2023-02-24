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
	<link rel="stylesheet" type="text/css" href="styles/product.css">
	<link rel="stylesheet" type="text/css" href="styles/product_responsive.css">
	<script type="text/javascript" src="js/index.js"></script>
	<script type="text/javascript" src="js/event.js"></script>
</head>

<body>

	<div class="super_container">

		<?php $prod = $_GET['key']; ?>

		<?php
		session_start();
		require 'vendor/autoload.php';
		$uri = "mongodb://localhost";
		$client = new MongoDB\Client($uri);
		$user = $client->mongotest->Users->findOne(['username' => $_SESSION['li_user']['user']]);
		$userID = $user['_id'];

		?>



		<!-- Header -->

		<?php
		include_once("header.php");
		?>

		<!-- Home -->

		<div class="row">
			<div class="col text-center">
				<div class="products_title">product</div>
			</div>
		</div>

		<!-- Product Details -->

		<div class="product_details">
			<div class="container">

				<?php
				$prod = $_GET['key'];

				$product = $client->mongotest->Products->findOne(['_id' => new MongoDB\BSON\ObjectID($prod)]);
				$names = $product['name'];
				$desc = $product['desc'];
				$price = $product['price'];
				$img = $product['img'];
				?>

					<!-- start track -->

					<script type="text/javascript">
						var prodKey = <?php echo json_encode($prod); ?>;
						var prodName = <?php echo json_encode($names); ?>;
						viewEvent(prodKey, prodName);
					</script>

				<title><?php echo $names ?></title>

				<div class="row details_row">

					<!-- Product Image -->

					<div class="col-lg-6">
						<div class="details_image">
							<div class="details_image_large"><img src="<?php echo $img; ?>" style="width: 55vw;" alt="">
								<!--<div class="product_extra product_sale"><a href="categories.html">Sale</a></div>-->
							</div>
							<div class="details_image_thumbnails d-flex flex-row align-items-start justify-content-between">
							</div>
						</div>
					</div>

					<!-- Product Content -->
					<div class="col-lg-6">
						<div class="details_content">
							<div class="details_name"><?php echo $names; ?></div>

							<div class="details_price">
								<h>$<?php echo $price; ?></h>
							</div>

							<!-- In Stock -->
							<div class="in_stock_container">
								<div class="availability">Availability:</div>
								<span>In Stock </span>
							</div>
							<div class="details_text">
								<p>
									<h><?php echo $desc; ?></h>
								</p>
							</div>

							<!-- Product Quantity -->
							<style>
								/* Chrome, Safari, Edge, Opera */
								input::-webkit-outer-spin-button,
								input::-webkit-inner-spin-button {
									-webkit-appearance: none;
									margin: 0;
								}

								/* Firefox */
								input[type=number] {
									-moz-appearance: textfield;
								}
							</style>
							
							<div class="product_quantity_container">
								<form id="addcart" name="addcart" action="/addcart.php" method="POST">
									<div class="product_quantity clearfix">
									<span>Qty</span>
										<input type="hidden" name="productid" value="<?php echo $prod ?>" />
										<input id="quantity_input" type="number" name="quantity" pattern="[0-9]*" value="1" min="1" oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null">
										<div class="quantity_buttons">
											<div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fa fa-chevron-up" aria-hidden="true"></i></div>
											<div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fa fa-chevron-down" aria-hidden="true"></i></div>
										</div>
									</div>
									<input style="" class="button cart_button" id="button" type="submit" value="Add to cart" onClick="testClick(document.getElementById('quantity_input').value)"  />
								</form>

								<script>
								function testClick(a) {									
									window.tracker.track('Cart', {
										prodId: prodKey,
										prodName: prodName,
										prodQuantity: a
									},{"fire": true, asBeacon: true});
								}
								</script>

							</div>

							<!-- Share -->
							<div class="details_share">
								<span>Share:</span>
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

				<div class="row description_row">
					<div class="col">
						<div class="description_title_container">
							<div class="description_title">Description</div>
							<!--<div class="reviews_title"><a href="#">Reviews <span>(1)</span></a></div>-->
						</div>
						<div class="description_text">
							<p><?php echo $desc; ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Products -->

		<div class="products">
			<div class="container">
				<div class="row">
					<div class="col text-center">
						<div class="products_title">Recomendations</div>
					</div>
				</div>
				<div class="row">
					<div class="col">

						<div class="product_grid">

							<!-- Product -->
							<div class="product">
								<div class="product_image"><img src="images/product_1.jpg" alt=""></div>
								<div class="product_extra product_new"><a href="categories.html">New</a></div>
								<div class="product_content">
									<div class="product_title"><a href="product.html">Smart Phone</a></div>
									<div class="product_price">$670</div>
								</div>
							</div>

							<!-- Product -->
							<div class="product">
								<div class="product_image"><img src="images/product_2.jpg" alt=""></div>
								<div class="product_extra product_sale"><a href="categories.html">Sale</a></div>
								<div class="product_content">
									<div class="product_title"><a href="product.html">Smart Phone</a></div>
									<div class="product_price">$520</div>
								</div>
							</div>

							<!-- Product -->
							<div class="product">
								<div class="product_image"><img src="images/product_3.jpg" alt=""></div>
								<div class="product_content">
									<div class="product_title"><a href="product.html">Smart Phone</a></div>
									<div class="product_price">$710</div>
								</div>
							</div>

							<!-- Product -->
							<div class="product">
								<div class="product_image"><img src="images/product_4.jpg" alt=""></div>
								<div class="product_content">
									<div class="product_title"><a href="product.html">Smart Phone</a></div>
									<div class="product_price">$330</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Newsletter -->


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
								Copyright &copy;<script>
									document.write(new Date().getFullYear());
								</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
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
	<script src="js/product.js"></script>
</body>

</html>