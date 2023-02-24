<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Sublime project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
    <link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="styles/contact.css">
    <link rel="stylesheet" type="text/css" href="styles/contact_responsive.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="/TRACARDI/js/index.js"></script>
	<script type="text/javascript" src="/TRACARDI/js/event.js"></script>
</head>

<body>

    <div class="super_container">

        <!-- Header -->

        <?php
        include_once("header.php");
        ?>
    </div>
</body>

<body>

    <?php 
        $id = bin2hex(random_bytes(12));
    ?>

    <div class='container' style="top: 10rem;">
        <div class="row">
            <div class="col-sm">
                <div class="section_title">Sign up</div>
                <div>
                    <form id='sing-up' name='sing-up' action="/redirectSU.php" method="POST">
                        <div>
                            <!-- EMAIL -->
                            <label>Email</label>
                            <input input type='text' name='email' id="email" class="contact_input" required="required">
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <!-- Name -->
                                <label for="contact_name">First Name</label>
                                <input input type='text' name='username' id="username" class="contact_input" required="required">
                            </div>
                            <div class="col-xl-6 last_name_col">
                                <!-- Last Name -->
                                <label for="contact_last_name">Last Name</label>
                                <input input type='text' name='lastname' id="lastname" class="contact_input" required="required">
                            </div>
                        </div>
                        <div>
                            <!-- PASS -->
                            <label>Age</label>
                            <input input type='text' name='age' id="age" class="contact_input" required="required">
                        </div>
                        <div>
                            <!-- PASS -->
                            <label>Phone</label>
                            <input input type='text' name='phone' id="phone" class="contact_input" required="required">
                        </div>
                        <div>
                            <!-- PASS -->
                            <label>Gender</label>
                            <input input type='text' name='gender' id="gender" class="contact_input" required="required">
                        </div>
                        <div>
                            <!-- PASS -->
                            <label>Address</label>
                            <input input type='text' name='address' id="address" class="contact_input" required="required">
                        </div>
                        <div>
                            <!-- PASS -->
                            <label>Password</label>
                            <input input type='password' name='password' id="password" class="contact_input" required="required">
                            <input type="hidden" name="userid" id="userid" value="<?php echo $id ?>" />
                        </div>
                        <div>
                            <input class="button contact_button" type='submit' value="Sign Up" onclick='document.getElementById("sing-up")' />
                        </div>
                    </form>

                    <script>
                        document.getElementById("sing-up").onsubmit = function() {

                            var userName = document.getElementById("username").value;
                            var userAge = document.getElementById("age").value;
                            var userGender = document.getElementById("gender").value;
                            var userAddress = document.getElementById("address").value;
                            var userId = <?php echo json_encode($id); ?>

                            window.tracker.track("identifySU", {
                                "userId": userId,
                                "name": userName,
                                "age": userAge,
                                "gender": userGender,
                                "address": userAddress
                            });
                        }
                    </script>

                </div>
            </div>
            <div class="col-sm">

                <div class="section_title">Log in</div>
                <div>
                    <form id='log-in' action="/redirect.php" method="POST">
                        <div>
                            <!-- USER -->
                            <label>Email</label>
                            <input input type='text' name='li_email' class="contact_input" required="required">
                        </div>
                        <div>
                            <!-- PASS -->
                            <label>Password</label>
                            <input input type='password' name='li_password' class="contact_input" required="required">
                        </div>
                        <div>
                            <input class="button contact_button" type='submit' value="Log In">
                        </div>
                        <div style="top: 5px; color: red;">
                            <?php
                            if ($_GET['key'] == "wrongpassword") {
                                print_r("Your account name or password is incorrect.");
                            }
                            ?>
                        </div>
                    </form>
                </div>

                <!--<div style=top:20px;>
                    <div class="section_title">Log out</div>
                    <button id='logout-button' class="button contact_button"><span>Log Out</span></button>
                </div>
                -->



            </div>
        </div>
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