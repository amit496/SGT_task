<?php

    require_once $_SERVER['DOCUMENT_ROOT'] . '/loginSystem/config/host.php';
    ob_start();
    session_start();


    function message() {
        if (isset($_SESSION['success']) && $_SESSION['success'] != '') {
            echo "<div class='bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 text-center'>" . $_SESSION['success'] . "</div>";
            unset($_SESSION['success']);
        }

        if (isset($_SESSION['error']) && $_SESSION['error'] != '') {
            echo "<div class='bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 text-center'>" . $_SESSION['error'] . "</div>";
            unset($_SESSION['error']);
        }
    }

    function emailSet() {
        if (isset($_SESSION['emailID']) && $_SESSION['emailID'] !== '') {
            header('Location: /loginSystem/pages/dashboard.php');
            exit();
        }
    }

    function emailNotSet() {
        if (!isset($_SESSION['emailID']) || $_SESSION['emailID'] === '') {
            header('Location: /loginSystem/pages/Auth/login.php');
            exit();
        }
    }


?>
