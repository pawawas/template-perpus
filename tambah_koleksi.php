<?php
include('koneksi.php');
session_start();
$id = $_GET['id'];

$user = $_SESSION['ulogin'];

$useremail = $_SESSION['ulogin'];
$sqli = "SELECT * from user where Email='$useremail'";
$query1 = mysqli_query($koneksidb, $sqli);
$result = mysqli_fetch_array($query1);
$id_user = $result['UserID'];

$query = mysqli_query($koneksidb, "insert into koleksipribadi (UserID, BukuID) values ('$id_user','$id')");
if ($query) {
    echo "<script>alert('Berhasil Menambahkan Ke koleksi.');</script>";
    echo "<script type='text/javascript'> document.location = 'koleksi.php'; </script>";
} else {
}
