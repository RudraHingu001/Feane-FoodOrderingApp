<?php

require_once('connect.php');

$db = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

$query = "CREATE TABLE `slot`"."(slot_id INT AUTO_INCREMENT,time_slot VARCHAR(10),PRIMARY KEY(slot_id))";

if (mysqli_query($db,$query)){
	echo "Query run succesfully";
}else{
	echo "Query does not run".mysqli_error($db);
}

?>