<?php
if (isset($_POST['entryID'])  && !empty($_POST['entryID'])) {

    require_once 'capdb.inc.php';
    $param_id = $_POST['entryID'];

    $sql = "DELETE FROM newsletter where entryID = ?";

    if ($stmt =  mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        

        if (mysqli_stmt_execute($stmt)) {
            header('Location: ../newsletter.php?deleteNews=success');
            exit();
        } else {
            header('Location: ../newsletter.php?deleteNews=error');
            exit();
        }
    }

} else {
    if (empty($_POST['entryID'])) {
        header('Location: ../newsletter.php?deleteNews=empty');
        exit();
    }
}