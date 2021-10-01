<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once 'capdb.inc.php';
    $userID = $_POST['userID'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $postalcode = $_POST['postalcode'];
    $shop = $_POST['shop'];

    //Update field in database
    $sql = "UPDATE usersdetails SET city = ?, address = ?, postalcode = ?, shop = ? WHERE  userID = ?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('location:../usersDetails.php?error=stmtFailed');
        exit();
    }


    mysqli_stmt_bind_param($stmt, "ssisi", $city, $address, $postalcode, $shop, $userID);

    if (!mysqli_stmt_execute($stmt)) {
        header('Location:../usersDetails.php?error=stmtFailed');
        exit();
    } else {
        header('Location:../usersDetails.php?update=successful');
        exit();
    }

    mysqli_stmt_close($stmt);
    exit();
} else {
    header('Location:../usersDetails.php');
    exit();
}