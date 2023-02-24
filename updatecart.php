<?php
session_start();

$key = $_GET['key'];
$qntity = $_SESSION['cart'][$_POST['productid']];

if ($_GET['key'] == "arrowdown") {

    if ($_SESSION['cart'][$_POST['productid']] <= 1) {
        $remove = $_POST['productid'];
        $_SESSION['totalcart'] = $_SESSION['totalcart'] - 1;
        unset($_SESSION['cart'][$remove]);
    } else {
        $_SESSION['cart'][$_POST['productid']] = (($_SESSION['cart'][$_POST['productid']]) - 1);
        $_SESSION['totalcart'] = $_SESSION['totalcart'] - 1;
    }
} elseif ($_GET['key'] == "arrowup") {
    $_SESSION['cart'][$_POST['productid']] = $_POST['quantity'];
    $_SESSION['cart'][$_POST['productid']] = (($_SESSION['cart'][$_POST['productid']]) + 1);
    $_SESSION['totalcart'] = $_SESSION['totalcart'] + 1;
} elseif ($_GET['key'] == "clearcart") {
    $remove = $_POST['productid'];
    unset($_SESSION['cart']);
    $_SESSION['totalcart'] = 0;
    echo $_SESSION['cart'];
} elseif ($_GET['key'] == "removeitem") {
    $remove = $_POST['productid'];
    $_SESSION['totalcart'] -= $_SESSION['cart'][$_POST['productid']];
    unset($_SESSION['cart'][$remove]);
    echo $_SESSION['cart'];
} else {
    $_SESSION['cart'][$_POST['productid']] = $_POST['quantity'];


    $temp = ($_SESSION['cart'][$_POST['productid']] - $qntity);
    $_SESSION['totalcart'] = $_SESSION['totalcart'] + $temp;


    echo $qntity;
    echo $_SESSION['cart'][$_POST['productid']];
    echo $temp;
    echo $_SESSION['totalcart'];
    if ($_SESSION['cart'][$_POST['productid']] == 0) {
        $remove = $_POST['productid'];
        unset($_SESSION['cart'][$remove]);
    }
}

echo ($_SESSION['cart']);


header("location:cart.php");
?>
