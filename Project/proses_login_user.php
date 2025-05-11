<?php
session_start();
$username = $_POST['username'];
$password = $_POST['password'];

// Login user dummy
if ($username == 'user' && $password == '1234') {
  $_SESSION['user'] = $username;
  header('Location: dashboard_user.php');
} else {
  echo "<script>alert('Login gagal');window.location='login_user.php';</script>";
}
?>
