<?php 
	require_once($_SERVER['DOCUMENT_ROOT'].'/includes/db.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/includes/functions.php');
	
	$redirect_url = "/login/login.php";
	if(isset($_POST['username']) && isset($_POST['password']))
	{
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		if(empty($username) || empty($password))
		{
			echo "<script type='text/javascript'>alert('Invalid username and/or password! Please try again later.');</script>";
			$redirect_url = "/login/login.php";
		}
		else
		{	
			$admin_username = "admin";
			$admin_password = "admin";
			$teacher_username = "teacher";
			$teacher_password = "teacher";
			$hod_username = "hod";
			$hod_password = "hod";
			if($admin_username == $username && $admin_password == $password)
			{
				$_SESSION['username'] = $username;	
				$redirect_url = "/admin/index.php";
			}
			elseif($teacher_username == $username && $teacher_password == $password)
			{
				$_SESSION['username'] = $username;	
				$redirect_url = "/teacher/index.php";
			}
			elseif($hod_username == $username && $hod_password == $password)
			{
				$_SESSION['username'] = $username;	
				$redirect_url = "/hod/index.php";
			}
			else
			{
				echo "<script type='text/javascript'>alert('Invalid username and/or password! Please try again later.');</script>";
				$redirect_url = "/login/login.php";
			}
		}
		echo "<script type='text/javascript'>window.location='".$redirect_url."';</script>";
	}
 ?>