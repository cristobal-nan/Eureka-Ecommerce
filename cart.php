<!DOCTYPE html>
<html lang="en">

<head>
	<title>Cart</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Sublime project">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
	<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="styles/cart.css">
	<link rel="stylesheet" type="text/css" href="styles/cart_responsive.css">
	<script type="text/javascript" src="js/index.js"></script>
	<script type="text/javascript" src="js/event.js"></script>
</head>

<body>

	<div class="super_container">

		<!-- Header -->
		<?php
		session_start();
		include_once("header.php");
		require 'vendor/autoload.php';
		$uri = "mongodb://localhost";
		$client = new MongoDB\Client($uri);

		?>



		<!-- Cart Info -->

		<div class="cart_info" style="top: 2rem;">
			<div class="container">
				<div class="row">
					<div class="col">
						<!-- Column Titles -->

						<div class="cart_info_columns clearfix">

							<div class="cart_info_col cart_info_col_product">Product <?php print_r($_SESSION['totalcart']); ?></div>
							<div class="cart_info_col cart_info_col_price">Price</div>
							<div class="cart_info_col cart_info_col_quantity">Quantity</div>
							<div class="cart_info_col cart_info_col_total">Total</div>
						</div>
					</div>
				</div>

				<div class="row cart_items_row">
					<div class="col">


						<?php

						
						foreach ($_SESSION['cart'] as $prod => $quantity) {
							$product = $client->mongotest->Products->findOne(['_id' => new MongoDB\BSON\ObjectID($prod)]);
						?>

							<!-- Cart Item -->
							<div class="cart_item d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">
								<!-- Name -->
								<div class="cart_item_product d-flex flex-row align-items-center justify-content-start">
									<div class="cart_item_image">
										<div><img src="<?php echo $product['img'] ?>" alt=""></div>
									</div>
									<div class="cart_item_name_container">
										<div class="cart_item_name"><a href="product.php?key=<?php echo $product['_id'] ?>"><?php echo $product['name'] ?></a></div>
										<form action="updatecart.php?key=removeitem" method="POST">
											<input type="hidden" name="productid" value="<?php echo $prod ?>" />
											<input type="hidden" name="quantity" value="<?php echo $quantity ?>" />
											<input type="submit" value="Remove Item" style="color:red; border: none; background: none; padding: 0;" />
										</form>
										<div class="cart_item_edit"></div>
									</div>
								</div>
								<!-- Price -->
								<div class="cart_item_price">$<?php echo $product['price'] ?></div>
								<!-- Quantity -->
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
								<div class="cart_item_quantity">



									<div class="product_quantity_container">
										<div class="product_quantity clearfix">
											<span>Qty</span>
											<form action="updatecart.php" method="POST">
												<input type="hidden" name="productid" value="<?php echo $prod ?>" />
												<input id="quantity_input" type="number" name="quantity" pattern="[0-9]*" value="<?php echo $quantity ?>" min="0" oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null">
											</form>
											<div class="quantity_buttons">
												<form action="updatecart.php?key=arrowup" method="POST">

													<input type="hidden" name="productid" value="<?php echo $prod ?>" />
													<input type="hidden" name="quantity" value="<?php echo $quantity ?>" />
													<input type="image" src="images/arrow_up.png" alt="" aria-hidden="true" style="height: 1rem;">

												</form>
												<form action="updatecart.php?key=arrowdown" method="POST">

													<input type="hidden" name="productid" value="<?php echo $prod ?>" />
													<input type="hidden" name="quantity" value="<?php echo $quantity ?>" />
													<input type="image" src="images/arrow_down.png" alt="" aria-hidden="true" style="height: 1rem;">

												</form>
											</div>
										</div>
									</div>
								</div>
								<!-- Total -->


								<div class="cart_item_total">$<?php echo $product['price'] * $quantity ?></div>
							</div>
							<?php 
							//$productId = var_dump($prod);
							?>
						<?php
							$total += $product['price'] * $quantity;
						}
						?>

					</div>
				</div>

				<div class="row row_cart_buttons">
					<div class="col" style="top: 2rem;">
						<div class="cart_buttons d-flex flex-lg-row flex-column align-items-start justify-content-start">
							<div class="button continue_shopping_button"><a href="categories.php">Continue shopping</a></div>
							<div class="cart_buttons_right ml-lg-auto">
								<form action="updatecart.php?key=clearcart" method="POST">
									<input type="hidden" name="productid" value="<?php echo $prod ?>" />
									<input type="hidden" name="quantity" value="<?php echo $quantity ?>" />
									<input type="submit" class="button clear_cart_button" value="Clear Cart" />
								</form>
								<!--<div><input style="" class="button update_cart_button" type ="submit" value="Update cart"/></div>-->

							</div>
						</div>
					</div>
				</div>

				<div class="row row_extra">
					<div class="col-lg-6 offset-lg-2">
						<div class="cart_total">
							<div class="section_title">Cart total</div>
							<div class="section_subtitle">Final info</div>
							<div class="cart_total_container">
								<ul>
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div class="cart_total_title">Subtotal</div>
										<div class="cart_total_value ml-auto">$<?php echo $total ?></div>
									</li>
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div class="cart_total_title">Shipping</div>
										<div class="cart_total_value ml-auto">Free</div>
									</li>
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div class="cart_total_title">Total</div>
										<div class="cart_total_value ml-auto">$<?php echo $total ?></div>
									</li>
								</ul>
							</div>
							<form  id="checkout" name="checkout" action="/checkout.php">
								<input style="" class="button checkout_button" type="submit" id="button" value="Proceed to checkout" onClick="testClick()"/>
							</form>							
						</div>
					</div>
				</div>
				<?php
					$_SESSION['total']=$total;
				?>
			</div>
		</div>

		<script>
			function testClick() {						
				window.tracker.track('cartToData', {
					cart: "true",
				},{"fire": true, asBeacon: true});
			}
		</script>

		<!-- Footer -->

		<div class="footer_overlay"></div>
		<footer class="footer">
			<div class="footer_background" style="background-image:url(images/footer.jpg)"></div>
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="footer_content d-flex flex-lg-row flex-column align-items-center justify-content-lg-start justify-content-center">
							<div class="footer_logo"><a href="#">SublimeS.				<?php echo$_SESSION['total']; ?></a></div>
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
	<script src="plugins/easing/easing.js"></script>
	<script src="plugins/parallax-js-master/parallax.min.js"></script>
	<script src="js/cart.js"></script>
</body>

</html>