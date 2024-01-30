<?php 

session_start();

require_once("connect.php");

$db = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

$cart = $_SESSION['cart'];

$user_id = $_SESSION['id'];

$total = 0;


foreach ($cart as $key => $value) {
	$ptotal = $value['price'] * $value['quantity'];
	$total = $total + $ptotal;

}

$query = "INSERT INTO `order`(user_id,total_payment) VALUES($user_id,$total)";

if (mysqli_query($db,$query)){
		echo "Query run Succesfully";
}else{
		echo "Query does not run";
}

$last_id = $db->insert_id;

foreach($cart as $key =>$value){

	$pid = $value['p_id'];
	$quantity = $value['quantity'];
	$price = $value['price'];

	$query = "INSERT INTO order_details(o_id,p_id,quantity,price) VALUES($last_id,$pid,$quantity,$price)";

	if (mysqli_query($db,$query)){
		header("Location:../others/MyAccount.php");
	}
	else{
		echo "Query does not run";
	}
}

unset($_SESSION['cart']);

?>