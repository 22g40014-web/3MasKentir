<?php
session_start();
include "koneksi.php";

$username = $_POST['username'];
$password = md5($_POST['password']);

$query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND password='$password'");
$data  = mysqli_fetch_assoc($query);

if ($data) {
    $_SESSION['login'] = true;
    $_SESSION['role']  = $data['role'];

    if ($data['role'] == 'admin') {
        header("Location: admindashboard.php");
    } else {
        header("Location: pemilikdashboard.php");
    }
} else {
    echo "<script>alert('Login gagal');window.location='index.php';</script>";
}
