<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/teacher/nav.php');
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
			margin-top: 50px;
		}
		h1 {
			text-align: center;
			font-size: 36px;
			color: #4CAF50;
			margin-bottom: 20px;
		}
		.container {
			text-align: center;
		}
		.generate-button {
			display: inline-block;
			padding: 10px 20px;
			font-size: 18px;
			color: #FFF;
			background-color: #4CAF50;
			border: none;
			border-radius: 4px;
			text-decoration: none;
			cursor: pointer;
			margin-top: 20px; 
			margin-bottom: 25px;
		}
		.generate-button:hover {
			background-color: #45A048;
		}
		.animation-container {
			margin-top: 30px;
			width: 300px;
			height: 300px;
			background-color: #FFF;
			border-radius: 10px;
			box-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
			margin: 0 auto;
		}
	</style>
</head>
<body>
	<div class="container">
		<header>
			<h1>Teacher's Portal</h1>
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
</body>
</html>
