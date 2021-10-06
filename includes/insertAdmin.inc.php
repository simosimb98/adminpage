<?php

if(isset($_POST['submit'])){

    include_once 'capdb.inc.php';
    
    $first = mysqli_real_escape_string($conn,$_POST['name']);
    $last = mysqli_real_escape_string($conn, $_POST['surname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
	$select = mysqli_query($conn, "SELECT `email` FROM `users` WHERE `email` = '" . $_POST['email'] . "'") or exit(mysqli_error($conn));
	if (mysqli_num_rows($select)) {
        header('Location: ../admins.php?error=emailExists');
		exit();
	}

    $sql = "INSERT INTO users (name, surname, email, phone, password, role, status) VALUES (?,?,?,?,?,1,1);";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        echo "SQL error";
    }else{

        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt,"sssis", $first, $last, $email, $phone, $hashedPwd);
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