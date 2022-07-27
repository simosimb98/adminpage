<?php
if (isset($_POST['orderID'])  && !empty($_POST['orderID'])) {

    require_once 'capdb.inc.php';
    $param_id = $_POST['orderID'];

    $sql = "DELETE FROM orders where orderID = ?";

    if ($stmt =  mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        

        if (mysqli_stmt_execute($stmt)) {
            header('Location: ../orders.php?deleteOrder=success');
            exit();
        } else {
            header('Location: ../order.php?deleteOrder=error');
            exit();
        }
    }

} else {
    if (empty($_POST['orderID'])) {
        header('Location: ../orders.php?deleteOrder=empty');
        exit();
    }
}