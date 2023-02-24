<script src="./js/index.js"></script>

<?php
session_start();
require 'vendor/autoload.php';
$uri = "mongodb://localhost";
$client = new MongoDB\Client($uri);

$users = $client->mongotest->Users->find(array("email" => $_POST['li_email'], "pass" => $_POST['li_password']));
$usr = $client->mongotest->Users->findOne(["email" => $_POST['li_email']]);
$login = false;

foreach ($users as $entry) {
    $login = true;
}

if ($login) {
    $userName = $usr['username'];
    $userLast = $usr['lastname'];
    $userAge = $usr['age'];
    $userGenre = $usr['genre'];
    $userAddress = $usr['address'];
    //$userMail = $usr['email'];
    $userId = $usr['_id'];
    $_SESSION['li_user'] = array("user" => $userName, "lastname" => $userLast, "pass" => $_POST['li_password'], "age" => $userAge, "genre" => $userGenre, "address" => $userAddress, "email" => $_POST['li_email'], "id" => $userId);

    echo $usr['_id'];

    //print_r($_SESSION['li_user']);
    

    header("location: /");
} else {
    header("location: login.php?key=wrongpassword");
}

?>
hola buenas tardes