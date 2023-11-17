<!DOCTYPE html>
<html lang="en">
<head>
	<?php require_once($_SERVER['DOCUMENT_ROOT'].'/includes/init.php'); ?>
	<style>
		body {
			margin: 0;
			padding: 0;
			font-family: Arial, sans-serif;
			background-color: #E5F4E3;
		}
		.container {
			max-width: 400px;
			margin: 50px auto;
			padding-top: 50px;
		}
		.div-form {
			background-color: #FFF;
			padding: 20px;
			border-radius: 10px;
			box-shadow: 10px 20px 35px rgba(0, 0, 0, 0.5);
		}
		.form-title {
			text-align: center;
			font-size: 24px;
			font-weight: bold;
			margin-bottom: 20px;
			color: #4CAF50;
		}
		.input-text {
			width: 100%;
			padding: 10px;
			font-size: 16px;
			margin-bottom: 10px;
			border: 1px solid #ccc;
			border-radius: 4px;
		}
		.input-submit {
			width: 100%;
			padding: 10px;
			font-size: 16px;
			color: #fff;
			background-color: #4CAF50;
			border: none;
			border-radius: 4px;
			cursor: pointer;
		}
		.input-submit:hover {
			background-color: #45a049;
		}
		.error-message {
			color: #ff0000;
			margin-top: 10px;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="div-form">
			<div class="form-title">LOGIN<div id="lottie-container"></div></div>
			
			<form action="/login/process_login.php" method="POST" onsubmit="return checkPassword()">
				Username: <br>
				<input type="text" class="input-text" id="username" name="username" required>
				<br>
				Password: <br>
				<input type="password" class="input-text" id="password" name="password" required>
				<br>
				<div class="error-message" id="error-message"></div>
				<br>
				<input type="submit" name="submit" class="input-submit" id="submit" value="Log In">
			</form>
		</div>
	</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.8/lottie.min.js"></script>
<script>
	document.addEventListener("DOMContentLoaded", function () {
		lottie.loadAnimation({
			container: document.getElementById("lottie-container"),
			renderer: "svg",
			loop: true,
			autoplay: true,
			path: "/assets/hmpage/login-anime.json",
		});
		console.log("Lottie animation loaded!");
		console.log("Container element:", document.getElementById("lottie-container"));
	});
</script>
</body>
</html>
