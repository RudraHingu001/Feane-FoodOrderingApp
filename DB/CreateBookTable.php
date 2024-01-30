<?php

require_once('connect.php');

$db = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

$query = "CREATE TABLE book_table"."(b_table INT AUTO_INCREMENT,user_id INT(5),time_stamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,time_slot VARCHAR(10),no_of_members INT(10),date_for_book date,PRIMARY KEY(b_table))";

if (mysqli_query($db,$query)){
	echo "Query run succesfully";
}else{
	echo "Query does not run".mysqli_error($db);
}

?>