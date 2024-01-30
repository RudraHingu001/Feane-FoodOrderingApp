<?php

require_once('connect.php');

$db = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

$query = "CREATE TABLE `order`"."(o_id INT AUTO_INCREMENT,user_id INT(5),total_payment BIGINT(10),created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,PRIMARY KEY(o_id))";

if(mysqli_query($db,$query)){
	echo "query run successfully";
}else{
	echo "query unsuccessfull".mysqli_error($db);
}

$query = "CREATE TABLE `order_details`"."(od_id INT AUTO_INCREMENT,o_id INT(5),p_id INT(10),quantity INT(5),price BIGINT(10),PRIMARY KEY(od_id))";

if(mysqli_query($db,$query)){
	echo "query run successfully";
}else{
	echo "query unsuccessfull".mysqli_error($db);
}

?>
