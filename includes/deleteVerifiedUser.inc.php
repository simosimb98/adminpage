<?php
if (isset($_POST['userID'])  && !empty($_POST['userID'])) {

    require_once 'capdb.inc.php';
    $param_id = $_POST['userID'];

    $sql = "UPDATE users SET status = 0 WHERE userID = ?";

    if ($stmt =  mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        

        if (mysqli_stmt_execute($stmt)) {
            header('Location: ../verifiedUsers.php?deactivation=success');
            exit();
        } else {
            header('Location: ../verifiedUsers.php?deactivation=error');
            exit();
        }
    }

} else {
    if (empty($_POST['userID'])) {
        header('Location: ../verifiedUsers.php?deactivation=empty');
        exit();
    }
}