<?php

session_start();
session_unset();
session_destroy();

header('Location: ../../ptixiaki2021/index.php');
exit();