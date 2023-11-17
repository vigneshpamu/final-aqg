<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/init.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #E5F4E3;
            margin-top: 50px; /* Light green background */
        }

        h1 {
            text-align: center;
            font-size: 36px;
            color: #4CAF50; /* Green accent color */
            margin-bottom: 20px;
        }

        h4 {
            text-align: center;
            padding: 10px 0;
            color: black;
            flex-shrink: 0;
            margin-bottom: auto;
            width: 100%;
        }

        .container {
            text-align: center; /* Center align content */
        }

        .generate-button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 18px;
            color: #FFF;
            background-color: #4CAF50; /* Green accent color */
            border: none;
            border-radius: 4px;
            text-decoration: none;
            cursor: pointer;
            margin-top: 20px;
            margin-bottom: 25px;
        }

        .generate-button:hover {
            background-color: #45A048; /* Slightly darker shade on hover */
        }

        .animation-container {
            margin-top: 30px;
            width: 300px;
            height: 300px;
            background-color: #FFF;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
            margin: 0 auto; /* Center the animation container */
        }
    </style>
</head>
<body>
<div class="container">
    <header>
        <h1>Automated Test Paper Generator</h1>
        <p>Welcome to our website. Create custom question papers with ease!</p>
        <a href="/login/login.php" class="generate-button">Generate Question Paper</a>
    </header>
    <div class="animation-container" id="lottie-container"></div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.8/lottie.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        lottie.loadAnimation({
            container: document.getElementById("lottie-container"),
            renderer: "svg",
            loop: true,
            autoplay: true,
            path: "/assets/hmpage/green-exam.json",
        });
    });
</script>
<footer>
    <h4>&copy; <?php echo date('Y'); ?> Automated Test Paper Generator. All rights reserved.</h4>
</footer>
</body>
</html>
