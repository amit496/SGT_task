<?php
require_once '../config/connection.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/loginSystem/config/commonfunction.php';

if (isset($_POST['submit'])) {
    $user_name = trim($_POST['user_name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    // Save entered values in session
    $_SESSION['old'] = [
        'user_name' => $user_name,
        'email' => $email
    ];

    if (empty($user_name) || empty($email) || empty($password) || empty($confirm_password)) {
        setMessageAndRedirect('error', 'All fields are required.', '/loginSystem/pages/Auth/register.php');
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        setMessageAndRedirect('error', 'Invalid email format.', '/loginSystem/pages/Auth/register.php');
    }

    if ($password !== $confirm_password) {
        setMessageAndRedirect('error', 'Passwords do not match.', '/loginSystem/pages/Auth/register.php');
    }

    if (strlen($password) < 6) {
        setMessageAndRedirect('error', 'Password must be at least 6 characters long.', '/loginSystem/pages/Auth/register.php');
    }

    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->close();
        setMessageAndRedirect('error', 'Email already registered.', '/loginSystem/pages/Auth/register.php');
    }
    $stmt->close();

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $insert_stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    $insert_stmt->bind_param("sss", $user_name, $email, $hashed_password);

    if ($insert_stmt->execute()) {
        $insert_stmt->close();
        // clear old inputs from session
        unset($_SESSION['old']);
        setMessageAndRedirect('success', 'Registration successful! You can now log in.', '/loginSystem/pages/Auth/login.php');
    } else {
        setMessageAndRedirect('error', 'Something went wrong. Please try again.', '/loginSystem/pages/Auth/register.php');
    }
}
?>
