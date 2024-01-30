<?php 

session_start();

require_once("connect.php");

$db = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

$user_id = $_SESSION['id'];

$members = $_POST['no_of_members'];

$slot = $_POST['slot_id'];

$date = $_POST['date_for_book'];

$query = "INSERT INTO book_table(user_id,time_slot,no_of_members,date_for_book) VALUES($user_id,'$slot',
	$members,'$date')";

var_dump($query);

if (mysqli_query($db,$query)) {
	
	header("Location:../others/MyAccount.php");
}
else{
	echo "query does not run".mysqli_error($db);
}
?>