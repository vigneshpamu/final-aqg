<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/db.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php');
session_start();

$redirect_url = "/login/login.php";
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    if (empty($username) || empty($password)) {
        echo "<script type='text/javascript'>alert('Invalid username and/or password! Please try again later.');</script>";
        $redirect_url = "/login/login.php";
    } else {
//        $admin_username = "admin";
//        $admin_password = "admin";
//        $teacher_username = "teacher";
//        $teacher_password = "teacher";
//        $hod_username = "hod";
//        $hod_password = "hod";

        $username = $_POST['username'];
        $password = $_POST['password'];
        $con = mysqli_connect("localhost", "root", "", "automatic_test_paper_generator") or die("Couldn't connect");
        $login_query = mysqli_query($con, "SELECT * FROM users WHERE username = '$username' AND password = '$password'");
        $user = mysqli_fetch_assoc($login_query);
        if ($user['role'] == 'admin') {
            $_SESSION['user_id'] = $user['id'];
            header("Location: /admin/semester/semester.php");
        }
//        elseif ($teacher_username == $username && $teacher_password == $password) {
//            $_SESSION['username'] = $username;
//            $redirect_url = "/teacher/index.php";
//        } elseif ($hod_username == $username && $hod_password == $password) {
//            $_SESSION['username'] = $username;
//            $redirect_url = "/hod/index.php";
//        } else {
//            echo "<script type='text/javascript'>alert('Invalid username and/or password! Please try again later.');</script>";
//            $redirect_url = "/login/login.php";
//        }
    }
    echo "<script type='text/javascript'>window.location='" . $redirect_url . "';</script>";
}
?>