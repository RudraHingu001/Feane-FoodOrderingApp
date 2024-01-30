<?php

require_once('connect.php');

$db = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

$name = $_POST['name'];

$email = $_POST['email'];

$password = $_POST['password'];

$phone = $_POST['phone'];

$address = $_POST['address'];

$role = 0;

if ($email == 'Rudra10@gmail.com' && $password == 'Rudra123'){
	$role = 1;
}
elseif ($email == 'Rudra11@gmail.com' && $password == 'Rudra3185'){
	$role = 2;
}
else{
	$role = 0;
}

$query = "INSERT INTO user(name,email,password,phone_number,address,role_id) VALUES('$name','$email','$password',$phone,'$address',$role)";

if (mysqli_query($db,$query)){
	switch ($role) {
        case 1:
          header("Location:../others/sign_in_form.php");
          break;
        case 2:
          header("Location:../others/sign_in_form.php");
          break;
        
        default:
          header("Location:../others/sign_in_form.php");
          break;
    }
}else{
	echo "Query does not run".mysqli_error($db);
}

?>