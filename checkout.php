<!DOCTYPE html>
<html lang="en">

<head>
	<title>Checkout</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Sublime project">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
	<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="styles/checkout.css">
	<link rel="stylesheet" type="text/css" href="styles/checkout_responsive.css">
	<script type="text/javascript" src="js/index.js"></script>
	<script type="text/javascript" src="js/event.js"></script>
</head>

<body>

	<div class="super_container">

		<!-- Header -->

		<?php
		include_once("header.php");
		session_start();
		?>

		<script type="text/javascript">
			var cart = <?php echo json_encode($prodids2); ?>;
			var ticket = Math.random() * 100000000000000000;
		</script>

		<!-- Home -->

		<div class="home">
			<div class="home_container">
				<div class="home_background" style="background-image:url(images/cart.jpg)"></div>
				<div class="home_content_container">
					<div class="container">
						<div class="row">
							<div class="col">
								<div class="home_content">
									<div class="breadcrumbs">
										<ul>
											<li><a href="/">Home</a></li>
											<li><a href="cart.php">Shopping Cart</a></li>
											<li>Checkout</li>
										</ul>

										<?php

										$prodids = array();
										$prodids2 = array();

										foreach ($_SESSION['cart'] as $key => $value) {
											$prodids[] = $key;
											$prodids[] = (int)$value;
										}

										foreach ($_SESSION['cart'] as $key => $value) {
											$prodids2[] = [$key, (int)$value];
										}

										//print_r($prodids2);
										?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


		<?php
		$user = $client->mongotest->Users->findOne(["username" => $_SESSION['li_user']['user']]);
		$userID = $user['_id'];
		?>

		<script>
			var ticket = Math.random() * 100000000000000000;
			var cart = <?php echo json_encode($prodids2); ?>;
			var amount = <?php echo json_encode($_SESSION['total']); ?>;
			//alert(amount);
		</script>



		<!-- Checkout -->

		<div class="checkout">
			<div class="container">
				<div class="row">

					<!-- Billing Info -->
					<div class="col-lg-6">
						<div class="billing checkout_section">
							<div class="section_title">Billing Address</div>
							<div class="section_subtitle">Enter your address info</div>
							<div class="checkout_form_container">
								<form id="checkout_form" class="checkout_form" action="/redirectCO.php" method="POST">
									<div class="row">
										<div class="col-xl-6">
											<!-- Name -->
											<label for="checkout_name">First Name*</label>
											<input type="text" name="checkout_name" id="checkout_name" class="checkout_input" required="required">
										</div>
										<div class="col-xl-6 last_name_col">
											<!-- Last Name -->
											<label for="checkout_last_name">Last Name*</label>
											<input type="text" name="checkout_last_name" id="checkout_last_name" class="checkout_input" required="required">
										</div>
									</div>
									<div>
										<!-- Country -->
										<label for="checkout_country">Country*</label>
										<select name="checkout_country" id="checkout_country" class="dropdown_item_select checkout_input" require="required">
											<option></option>
											<option>Chile</option>
										</select>
									</div>
									<div>
										<!-- Address -->
										<label for="checkout_address">Address*</label>
										<input type="text" name="checkout_address" id="checkout_address" class="checkout_input" required="required">
										<!-- Address <input type="text" id="checkout_address_2" class="checkout_input checkout_address_2" required="required">-->
									</div>
									<div>
										<!-- Zipcode -->
										<label for="checkout_zipcode">Zipcode*</label>
										<input type="text" name="checkout_zipcode" id="checkout_zipcode" class="checkout_input" required="required">
									</div>
									<div>
										<!-- City / Town -->
										<label for="checkout_city">City/Town*</label>
										<select name="checkout_city" id="checkout_city" class="dropdown_item_select checkout_input" require="required">
											<option></option>
											<option>Cerrillos</option>
											<option>Independencia</option>
											<option>Las Condes</option>
											<option>Lo Barnechea</option>
											<option>Maipú</option>
											<option>Ñuñoa</option>
											<option>Providencia</option>
											<option>Pudahuel</option>
											<option>Santiago</option>
											<option>Vitacura</option>
										</select>
									</div>
									<div>
										<!-- Phone no -->
										<label for="checkout_phone">Phone no*</label>
										<input type="phone" name="checkout_phone" id="checkout_phone" class="checkout_input" required="required">
									</div>
									<div>
										<!-- Email -->
										<label for="checkout_email">Email Address*</label>
										<input type="phone" name="checkout_email" id="checkout_email" class="checkout_input" required="required">
									</div>
									<div class="checkout_extra">
										<div>
											<input type="checkbox" id="checkbox_terms" name="regular_checkbox" class="regular_checkbox" checked="checked">
											<label for="checkbox_terms"><img src="images/check.png" alt=""></label>
											<span class="checkbox_title">Terms and conditions</span>
										</div>
										<div>
											<input type="checkbox" id="checkbox_account" name="regular_checkbox" class="regular_checkbox">
											<label for="checkbox_account"><img src="images/check.png" alt=""></label>
											<span class="checkbox_title">Create an account</span>
										</div>
										<div>
											<input type="checkbox" id="checkbox_newsletter" name="regular_checkbox" class="regular_checkbox">
											<label for="checkbox_newsletter"><img src="images/check.png" alt=""></label>
											<span class="checkbox_title">Subscribe to our newsletter</span>
										</div>
									</div>
								
							</div>
						</div>
					</div>

					<!-- Order Info -->

					<div class="col-lg-6">
						<div class="order checkout_section">
							<div class="section_title">Your order</div>
							<div class="section_subtitle">Order details</div>

							<!-- Order details -->
							<div class="order_list_container">
								<div class="order_list_bar d-flex flex-row align-items-center justify-content-start">
									<div class="order_list_title">Product</div>
									<div class="order_list_value ml-auto">Total</div>
								</div>
								<ul class="order_list">
								<?php 
									foreach ($_SESSION['cart'] as $prod => $quantity) {
										$product = $client->mongotest->Products->findOne(['_id' => new MongoDB\BSON\ObjectID($prod)]);
								?>
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div class="order_list_title"><?php echo $product['name'] ?></div>
										<div class="order_list_value ml-auto">$<?php echo $product['price'] ?></div>
									</li>
									<?php 
										$total += $product['price'] * $quantity;
										}
									?>
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div class="order_list_title">Shipping</div>
										<div class="order_list_value ml-auto">Free</div>
									</li>
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div class="order_list_title">Total</div>
										<div class="order_list_value ml-auto">$<?php echo $total?></div>
									</li>
								</ul>
							</div>


							<!-- Order Text -->
							<div class="order_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin
								pharetra temp or so dales. Phasellus sagittis auctor gravida. Integ er bibendum sodales
								arcu id te mpus. Ut consectetur lacus.</div>
							<input class="button order_button" type='submit' value="Place Order" onClick="testClick()"/>
							</form>

							<script>
								function testClick() {						
									window.tracker.track('dataToPayment', {
										cart: "true",
									},{"fire": true, asBeacon: true});
								}
							</script>

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
	<script src="plugins/easing/easing.js"></script>
	<script src="plugins/parallax-js-master/parallax.min.js"></script>
	<script src="js/checkout.js"></script>
</body>

</html>