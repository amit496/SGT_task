<?php

    require_once $_SERVER['DOCUMENT_ROOT'] . '/loginSystem/config/commonfunction.php';
    // require_once $_SERVER['DOCUMENT_ROOT'] . '/loginSystem/config/host.php';
    emailNotSet();
?>

<!DOCTYPE html>
<html lang="en" :class="{ 'theme-dark': dark }" x-data="data()" class="theme-dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login System</title>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/loginSystem/assets/allcss.php'; ?>
</head>
<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/loginSystem/pages/layout/left-sidebar.php'; ?>

        <div class="flex flex-col flex-1 w-full">
            <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/loginSystem/pages/layout/header.php'; ?>

            <main class="h-full overflow-y-auto">
                <div class="container px-6 mx-auto grid">
                    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">Dashboard</h2>
                    <p class="text-gray-600 dark:text-gray-400">Welcome to your dashboard!</p>
                </div>
            </main>

            <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/loginSystem/pages/layout/footer.php'; ?>
        </div>
    </div>

    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/loginSystem/assets/alljs.php'; ?>
</body>
</html>
