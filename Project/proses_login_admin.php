<?php
session_start();
$username = $_POST['username'];
$password = $_POST['password'];

// Login admin dummy
if ($username == 'admin' && $password == 'admin') {
  $_SESSION['admin'] = $username;
  header('Location: dashboard_admin.php');
} else {
  echo "<script>alert('Login gagal');window.location='login_admin.php';</script>";
}
?>
