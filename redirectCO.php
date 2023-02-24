<?php
session_start();

$_SESSION['checkout'] = array("name"=>$_POST["checkout_name"],"lastname" => $_POST["checkout_last_name"], "country" => $_POST["checkout_country"], "address" => $_POST["checkout_address"], "zipcode" => $_POST["checkout_zipcode"], "city" => $_POST["checkout_city"], "province" => $_POST["checkout_province"], "phone" => $_POST["checkout_phone"], "email" => $_POST["checkout_email"]);


header("location: /payment.php");


?>