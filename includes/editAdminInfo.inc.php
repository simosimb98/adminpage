<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once 'capdb.inc.php';
    $userID = $_POST['userID'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $postalcode = $_POST['postalcode'];

    //Update field in database
    $sql = "UPDATE users SET country = ?, city = ?, address = ?, postalcode = ? WHERE  userID = ?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('location:../adminsDetails.php?error=stmtFailed');
        exit();
    }


    mysqli_stmt_bind_param($stmt, "sssii", $country, $city, $address, $postalcode, $userID);

    if (!mysqli_stmt_execute($stmt)) {
        header('Location:../adminsDetails.php?update=stmtFailed');
        exit();
    } else {
        header('Location:../adminsDetails.php?update=successful');
        exit();
    }

    mysqli_stmt_close($stmt);
    exit();
} else {
    header('Location:../adminsDetails.php');
    exit();
}