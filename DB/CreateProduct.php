<?php

require_once('connect.php');

$db = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

$query = "CREATE TABLE product"."(p_id INT AUTO_INCREMENT,m_id INT(5),p_name CHAR(30),p_image VARCHAR(50),price BIGINT(10),description TEXT,PRIMARY KEY(p_id))";

if(mysqli_query($db,$query)){
	echo "query run successfully";
}else{
	echo "query unsuccessfull".mysqli_error($db);
}

?>
