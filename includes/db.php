<?php 
	
	error_reporting(E_ALL);
	if (session_status() == PHP_SESSION_NONE) {
    session_start();
	}
	
	$dbhost = "localhost";
	$dbname = "automatic_test_paper_generator";
	$dbuser = "root";
	$dbpass = "";
	$db = "";

	try {

		$db = new PDO("mysql:host=$dbhost;dbname=$dbname;", $dbuser, $dbpass);

	} catch (PDOException $e) {
		echo $e;
	}
	



 ?>