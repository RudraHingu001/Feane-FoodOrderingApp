<?php

require_once('connect.php');

$db = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

$table = $_POST['table'];

$sheet = $_POST['sheet'];

$query = "INSERT INTO total_table(no_of_tables,no_of_sheets) VALUES($table,$sheet)";

if(mysqli_query($db,$query)){
	header("Location:../others/ManagerTotalTable.php");
}else{
	echo "query unsuccessfull".mysqli_error($db);
}

?>