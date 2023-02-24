<script type="text/javascript" src="/js/track.js"></script>
<script type="text/javascript" src="/js/event.js"></script>
<?php
session_start();

$_SESSION['totalcart'];


if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

if (isset($_SESSION['cart'][$_POST['productid']])) {
    $_SESSION['cart'][$_POST['productid']] += $_POST['quantity'];
    $_SESSION['totalcart']= 0;
    foreach($_SESSION['cart'] as $x => $val) {
        echo "$val<br>";
        $_SESSION['totalcart'] += $val;
      }

} else {
    $_SESSION['cart'][$_POST['productid']] = $_POST['quantity'];
    $_SESSION['totalcart'] += $_SESSION['cart'][$_POST['productid']];
}

header("location: cart.php");
?>