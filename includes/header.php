<!DOCTYPE html>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/init.php'); ?>
<html lang="en">
<head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- STYLE CSS -->
    <link type="text/css" rel="stylesheet" href="/assets/css/custom.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>


    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #E5F4E3; /* Light green background */
            margin: 0;
            padding: 0;
        }

        /* Basic styles for form elements */
        input[type="text"],
        input[type="password"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            background-color: #4CAF50; /* Green accent color */
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049; /* Slightly darker shade on hover */
        }

        /* Text style for the login heading */
        .login-heading {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
            color: #4CAF50; /* Green accent color */
        }
    </style>
</head>
<body>
<header>
    <!-- Navbar -->
    <div class="navbar-top">
        <nav class="nav-bar nav-center navbar-black">
            <a href="/index.php" class="navbar-item navbar-button navbar-padding-large">HOME</a>
            <a href="/login/login.php" class="navbar-item navbar-button navbar-padding-large navbar-right">LOGIN</a>
        </nav>
    </div>
</header>
</body>
</html>