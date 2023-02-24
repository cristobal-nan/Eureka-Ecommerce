<!DOCTYPE html>
<html lang="en">

<head>
    <title>Processing order</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Sublime project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
    <link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="styles/contact.css">
    <link rel="stylesheet" type="text/css" href="styles/contact_responsive.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="js/index.js"></script>
	<script type="text/javascript" src="js/event.js"></script>
</head>

<body>

    <div class="super_container">

        <!-- Header -->

        <?php
        include_once("header.php");
        ?>
    </div>
</body>
<?php
session_start();

?>
<script>
					var check_name = <?php echo json_encode($_SESSION['checkout']['name']); ?>;
					var check_lastname = <?php echo json_encode($_SESSION['checkout']['lastname']); ?>;
					var check_country = <?php echo json_encode($_SESSION['checkout']['country']); ?>;
					var check_address = <?php echo json_encode($_SESSION['checkout']['address']); ?>;
					var check_zipcode = <?php echo json_encode($_SESSION['checkout']['zipcode']); ?>;
                    var check_city = <?php echo json_encode($_SESSION['checkout']['city']); ?>;
					var check_province = <?php echo json_encode($_SESSION['checkout']['province']); ?>;
					var check_phone = <?php echo json_encode($_SESSION['checkout']['phone']); ?>;
					var check_email = <?php echo json_encode($_SESSION['checkout']['email']); ?>;
				</script>

				<script>
                    window.response.context.profile = true;  //
					window.tracker.track("checkoutData", {
						"name": check_name,
						"lastname": check_lastname,
						"country": check_country,
						"address": check_address,
						"zipcode": check_zipcode,
                        "city": check_city,
						"province": check_province,
						"phone": check_phone,
						"email": check_email,
					});

                    console.log(check_name);
				</script>

<body>

    <!-- Home -->

    
    <div class='container' style="top: 10rem;">
        <center>
            <div class='container'style="top: 2rem;">
                <h1>Your order is being processed</h1>
            </div>
            <div class='container' style="top: 5rem;">
                <img src="https://www.seekpng.com/png/full/828-8282035_delivery-truck-delivery-van-icon.png " width="500" >
            </div>
            <div class='container' style="top: 4rem;">
                <h4>Thank you for trusting us</h4>
            </div>
        </center>
        <?php

?>

    </div>

    <!-- Footer -->
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
</body>

</html>