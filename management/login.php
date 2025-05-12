<?php

ob_start();
session_start();
require_once '../config/connection.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/loginSystem/config/commonfunction.php';

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];


    if (empty($email) || empty($password)) {
        $_SESSION['error'] = 'Email and password are required.';
        header('Location: ../pages/Auth/login.php');
        exit();
    }

    $query = "SELECT * FROM `users` WHERE `email` = '$email'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user['password'])) {
            $_SESSION['emailID'] = $user['email'];
            $_SESSION['success'] = 'Login successful!';
            header('Location: ../pages/dashboard.php');
            exit();
        } else {
            $_SESSION['error'] = 'Incorrect password.';
            header('Location: ../pages/Auth/login.php');
            exit();
        }
    } else {
        $_SESSION['error'] = 'User not found.';
        header('Location: ../pages/Auth/login.php');
        exit();
    }
}
?>
