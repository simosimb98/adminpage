<?php
if (isset($_POST['userID'])  && !empty($_POST['userID'])) {

    require_once 'capdb.inc.php';
    $param_id = $_POST['userID'];

    $sql = "DELETE FROM users where userID = ?";

    if ($stmt =  mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        

        if (mysqli_stmt_execute($stmt)) {
            header('Location: ../pendingUsers.php?deletion=success');
            exit();
        } else {
            header('Location: ../pendingUsers.php?deletion=error');
            exit();
        }
    }

} else {
    if (empty($_POST['userID'])) {
        header('Location: ../pendingUsers.php?deletion=empty');
        exit();
    }
}