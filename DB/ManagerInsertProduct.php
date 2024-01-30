<?php

session_start();

require_once("connect.php");

$db = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

$pname = $_POST['pname'];

$pimage = $_POST['pimage'];

$m_id = $_SESSION['id'];

$description = $_POST['description'];

$price = $_POST['price'];

$file_name_pic = $_FILES['pimage']['name'];

$file_tmp_pic =$_FILES['pimage']['tmp_name'];

move_uploaded_file($file_tmp_pic,"upload/".$file_name_pic);

$path = "upload/".$file_name_pic;

$query = "INSERT INTO product(m_id,p_name,p_image,price,description) VALUES($m_id,'$pname','$path',$price,'$description')";

var_dump($query);

if (mysqli_query($db,$query)){
	header("Location:../others/ManagerTotalProduct.php");
}
else{
	echo mysqli_error($db);
}

?>