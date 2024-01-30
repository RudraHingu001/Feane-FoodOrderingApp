<?php 

session_start();

$cart = $_SESSION['cart'];

$product['pname'] = $_POST['pname'];
$product['p_id'] = $_POST['id'];
$product['price'] = $_POST['price'];
$product['quantity'] = $_POST['quantity'];

$_SESSION['cart'][$_POST['id']] = $product;

header("Location:../others/AddToCart.php");

?>