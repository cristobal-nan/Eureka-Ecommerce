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

			window.onload = function() {
				viewEvent2();
			}
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
											<li>Payment</li>
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

		<?php
		if (isset($_SESSION['li_user'])) {
		?>
			<script type="text/javascript">
				var userID = <?php echo json_encode(utf8_encode($userID)); ?>;
				//window.onload = function() {
				//	buyEvent(ticket, cart, userID, amount);
				//}
			</script>
		<?php
		} else {
		?>
			<script type="text/javascript">
				var userID = null;
				//window.onload = function() {
				//	buyEvent(ticket, cart, userID, amount);
				//}
			</script>
		<?php
		}
		?>

		<!-- Checkout -->

		<div class="checkout">
			<div class="container">
				<div class="row">

					<!-- Billing Info -->
					<div class="col-lg-6">
						<div class="billing checkout_section">
							<div class="section_title">Payment information</div>

							<div class="payment_form_container">
								<form id="payment_form" class="payment_form" action="/shipping.php">
                                    <div>
										<!-- Address -->
										<label for="payment_card_number">Card Number*</label>
										<input type="text" name="payment_card_number" id="payment_card_number" class="checkout_input" required="required" placeholder="0000 0000 0000 0000">
										<!-- Address <input type="text" id="payment_card_number_2" class="checkout_input payment_card_number_2" required="required">-->
									</div>
									<div class="row">
										<div class="col-xl-6">
											<!-- Name -->
											<label for="payment_card_date">Expiration Date</label>
											<input type="text" name="payment_card_date" id="payment_card_date" class="checkout_input" required="required" placeholder="MM/YY">
										</div>
										<div class="col-xl-6 last_name_col">
											<!-- Last Name -->
											<label for="payment_card_cvv">CVV</label>
											<input type="password" name="payment_card_cvv" id="payment_card_cvv" class="checkout_input" required="required" placeholder="***">
										</div>
									</div>
                                    <div>
										<!-- Address -->
										<label for="payment_card_name">Name on card</label>
										<input type="text" name="payment_card_name" id="payment_card_name" class="checkout_input" required="required" placeholder="Enter cardholder's full name">
										<!-- Address <input type="text" id="payment_card_name_2" class="checkout_input payment_card_name_2" required="required">-->
									</div>

									<div class="checkout_extra">
										<div>
											<input type="checkbox" id="checkbox_terms" name="regular_checkbox" class="regular_checkbox" >
											<label for="checkbox_terms"><img src="images/check.png" alt=""></label>
											<span class="checkbox_title">Save card</span>
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
							<input class="button order_button" type='submit' value="Place Order"/>
							</form>
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