<?php
session_start();
include('koneksi.php');
$username = $_POST['user'];
$email = $_POST['email'];
$namale = $_POST['namale'];
$alamat = $_POST['alamat'];
$password = md5($_POST['password']);
$sql1 = "INSERT INTO user(Username,Password,Email,NamaLengkap,Alamat,level) VALUES('$username','$password','$email','$namale','$alamat', 'user')";
$lastInsertId = mysqli_query($koneksidb, $sql1);
if ($lastInsertId) {
    echo "<script>alert('Registrasi berhasil. Sekarang anda bisa login.');</script>";
    echo "<script type='text/javascript'> document.location = 'login_user.php'; </script>";
} else {
    echo "<script>alert('Ops, terjadi kesalahan. Silahkan coba lagi.');</script>";
    echo "<script type='text/javascript'> document.location = 'regist.php'; </script>";
}
