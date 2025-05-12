<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/loginSystem/config/commonfunction.php';
    emailSet();  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Login System</title>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/loginSystem/assets/allcss.php'; ?>
</head>
<body class="bg-gradient-to-r from-sky-100 to-indigo-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-xl shadow-xl w-full max-w-md">
        <div class="flex justify-center mb-6">
            <i class="fas fa-user-shield text-blue-600 text-4xl"></i>
        </div>
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">User Login</h2>

        <?php message(); ?>

        <form action="/loginSystem/management/login.php" method="POST">
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">User Email</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500" id="icon-email">
                        <i class="fas fa-envelope"></i>
                    </span>
                    <input type="email" id="email" name="email" required class="pl-10 pr-4 py-2 w-full border border-gray-300 rounded-md" oninput="updateIcon('email')"/>
                </div>
            </div>

            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500" id="icon-password">
                        <i class="fas fa-lock"></i>
                    </span>
                    <input type="password" id="password" name="password" required class="pl-10 pr-10 py-2 w-full border border-gray-300 rounded-md" oninput="updateIcon('password')"/>
                    <button type="button" onclick="togglePassword()" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500 focus:outline-none">
                        <i class="fas fa-eye" id="toggleIcon"></i>
                    </button>
                </div>
            </div>

            <button type="submit" name="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded">
                Log In
            </button>
        </form>

        <p class="mt-4 text-sm text-center text-gray-500">
            Don't have an account? <a href="register.php" class="text-indigo-600 hover:underline">Sign up now</a>
        </p>

    </div>

    <script>
    function togglePassword() {
        const passwordField = document.getElementById('password');
        const icon = document.getElementById('toggleIcon');
        const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordField.setAttribute('type', type);
        icon.classList.toggle('fa-eye');
        icon.classList.toggle('fa-eye-slash');
    }

    function updateIcon(fieldId) {
        const icon = document.getElementById(`icon-${fieldId}`);
        const fieldValue = document.getElementById(fieldId).value;

        if (fieldId === 'email') {
            if (fieldValue.trim() !== "") {
                icon.innerHTML = '<i class="fas fa-check-circle text-green-500"></i>';
            } else {
                icon.innerHTML = '<i class="fas fa-envelope"></i>';
            }
        } else if (fieldId === 'password') {
            if (fieldValue.trim() !== "") {
                icon.innerHTML = '<i class="fas fa-check-circle text-green-500"></i>';
            } else {
                icon.innerHTML = '<i class="fas fa-lock"></i>';
            }
        }
    }
    </script>
</body>
</html>
