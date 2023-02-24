<script src="./js/index.js"></script>

<?php
session_start();
require 'vendor/autoload.php';
$uri = "mongodb://localhost";
$client = new MongoDB\Client($uri);
$users = $client->mongotest->Users;

print_r($_POST);
$newUser = array("_id"=>$_POST["userid"],"username" => $_POST["username"],"lastname" => $_POST["lastname"], "email" => $_POST["email"], "pass" => $_POST["password"], "age" => $_POST["age"], "genre" => $_POST["gender"], "address" => $_POST["address"],"phone" => $_POST["phone"]);
$users->insertOne($newUser);

header("location: /login.php");
?>