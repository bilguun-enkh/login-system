<?php
session_start();

$isLoggedIn = isset($_SESSION['email']);

if(isset($_POST['logout'])){
    session_unset();
    session_destroy();
    $isLoggedIn = false;
    // Unset and expire cookies
    setcookie('user_email', '', time() - 3600, "/");
    setcookie('user_name', '', time() - 3600, "/");
    header("Location: login.php");
    exit();
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login system</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style type="text/css">
        form {
            max-width: 460px;
            margin: 20px auto;
            padding: 20px;
        }
    </style>
</head>

<body class="grey lighten-4">
    <nav class="white z-depth-0">
        <div class="container">
            <a href="index.php" class="brand-logo grey-text">Login system</a>
            <ul id="nav-mobile" class="right hide-on-small-and-down">
                <?php if ($isLoggedIn): ?>
                    <li class="grey-text">Welcome,</li>
                    <li><form action="login.php" method="POST" class="m-0 p-0" style="padding: 0px 20px; margin: 0px"><input type="submit" name="logout" value="Logout" class="btn brand z-depth-0"></form></li>
                <?php else: ?>
                    <li><a href="login.php" class="btn brand z-depth-0">Login</a></li>
                    <li><a href="register.php" class="btn brand z-depth-0">Register</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
