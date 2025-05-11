<?php

session_start();

session_unset();
session_destroy();

header("Location: /loginSystem/pages/Auth/login.php");
exit();
?>
