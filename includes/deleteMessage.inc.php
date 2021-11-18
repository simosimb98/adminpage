<?php
if (isset($_POST['contactID'])  && !empty($_POST['contactID'])) {

    require_once 'capdb.inc.php';
    $param_id = $_POST['contactID'];

    $sql = "DELETE FROM contactlist where contactID = ?";

    if ($stmt =  mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        

        if (mysqli_stmt_execute($stmt)) {
            header('Location: ../contactUsMessages.php?deleteMessage=success');
            exit();
        } else {
            header('Location: ../contactUsMessages.php?deleteMessage=error');
            exit();
        }
    }

} else {
    if (empty($_POST['userID'])) {
        header('Location: ../contactUsMessages.php?deleteMessage=empty');
        exit();
    }
}