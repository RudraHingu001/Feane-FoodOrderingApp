<?php

require_once('connect.php');

$db = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

var_dump($_GET[t_id]);

$id = $_GET[t_id];

$query = "DELETE FROM total_table WHERE t_id = $id";

if(mysqli_query($db,$query)){
	header("Location:../others/ManagerTotalTable.php");
}else{
	echo "query unsuccessfull".mysqli_error($db);
}

?>
