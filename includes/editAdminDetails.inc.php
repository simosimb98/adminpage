<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once 'capdb.inc.php';
    $userID = $_POST['userID'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    //Update field in database
    $sql = "UPDATE users SET name = ?, surname = ?, email = ?, phone = ? WHERE  userID = ?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('location:../admins.php?error=stmtFailed');
        exit();
    }


    mysqli_stmt_bind_param($stmt, "sssii", $name, $surname, $email, $phone, $userID);

    if (!mysqli_stmt_execute($stmt)) {
        header('Location:../admins.php?error=stmtFailed');
        exit();
    } else {
        header('Location:../admins.php?update=successful');
        exit();
    }

    mysqli_stmt_close($stmt);
    exit();
} else {
    header('Location:../admins.php');
    exit();
}