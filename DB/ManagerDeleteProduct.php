<?php

require_once('connect.php');

$db = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

$id = $_GET[id];

var_dump($id);

$query = "DELETE FROM product WHERE p_id = $id";

if(mysqli_query($db,$query)){
	header("Location:../others/ManagerTotalProduct.php");
}else{
	echo "query unsuccessfull".mysqli_error($db);
}

?>
