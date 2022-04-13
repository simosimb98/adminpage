<?php

if(isset($_POST['submitRegister'])){

    include_once 'capdb.inc.php';
    
    $first = mysqli_real_escape_string($conn,$_POST['firstname']);
    $last = mysqli_real_escape_string($conn, $_POST['surname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $country = mysqli_real_escape_string($conn, $_POST['country']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $postalcode = mysqli_real_escape_string($conn, $_POST['postalcode']);

	$select = mysqli_query($conn, "SELECT `email` FROM `users` WHERE `email` = '" . $_POST['email'] . "'") or exit(mysqli_error($conn));
	if (mysqli_num_rows($select)) {
        header('Location: ../admins.php?error=emailExists');
		exit();
	}

    $sql = "INSERT INTO users (name, surname, email, phone, password, country, city, address, postalcode, role, status) VALUES (?,?,?,?,?,?,?,?,?,1,1);";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        echo "SQL error";
    }else{

        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt,"sssissssi", $first, $last, $email, $phone, $hashedPwd, $country, $city, $address, $postalcode);
        mysqli_stmt_execute($stmt);
    }             
        header('Location: ../admins.php?registration=success');
        exit();
}

else if(isset($_POST['cancel'])){
    header('Location: ../admins.php?registration=cancel');
    exit();
}
else{
    header('Location: ../admins.php?registration=error');
    exit();
}