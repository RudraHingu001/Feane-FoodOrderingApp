<?php

require_once('connect.php');

$db = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

$query = "CREATE TABLE total_table"."(t_id INT AUTO_INCREMENT,no_of_tables BIGINT(5),no_of_sheets BIGINT(5),PRIMARY KEY(t_id))";

if (mysqli_query($db,$query)){
	echo "Query run succesfully";
}else{
	echo "Query does not run".mysqli_error($db);
}

?>