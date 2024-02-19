<?php
include('koneksi.php');


$buku = $_POST['buku'];
$user = $_POST['user'];

$ulasan = $_POST['ulasan'];

if (isset($_POST['rating1'])) {
    //insert
    $sql     = "INSERT INTO ulasanbuku (UserID,BukuID,Ulasan,Rating)
			VALUES('$user','$buku','$ulasan','1')";
    $query     = mysqli_query($koneksidb, $sql);
    if ($query) {
        echo " <script> alert ('Berhasil Mengirim Ulasan..'); </script> ";
        echo "<script type='text/javascript'> document.location = 'pinjam.php?id=$buku'; </script>";
    } else {
        echo " <script> alert ('Ooops, terjadi kesalahan. Silahkan coba lagi.'); </script> ";
    }
}
if (isset($_POST['rating2'])) {
    //insert
    $sql     = "INSERT INTO ulasanbuku (UserID,BukuID,Ulasan,Rating)
			VALUES('$user','$buku','$ulasan','2')";
    $query     = mysqli_query($koneksidb, $sql);
    if ($query) {
        echo " <script> alert ('Berhasil Mengirim Ulasan.'); </script> ";
        echo "<script type='text/javascript'> document.location = 'pinjam.php?id=$buku'; </script>";
    } else {
        echo " <script> alert ('Ooops, terjadi kesalahan. Silahkan coba lagi.'); </script> ";
    }
}
if (isset($_POST['rating3'])) {
    //insert
    $sql     = "INSERT INTO ulasanbuku (UserID,BukuID,Ulasan,Rating)
			VALUES('$user','$buku','$ulasan','3')";
    $query     = mysqli_query($koneksidb, $sql);
    if ($query) {
        echo " <script> alert ('Berhasil Mengirim Ulasan.'); </script> ";
        echo "<script type='text/javascript'> document.location = 'pinjam.php?id=$buku'; </script>";
    } else {
        echo " <script> alert ('Ooops, terjadi kesalahan. Silahkan coba lagi.'); </script> ";
    }
}
if (isset($_POST['rating4'])) {
    //insert
    $sql     = "INSERT INTO ulasanbuku (UserID,BukuID,Ulasan,Rating)
			VALUES('$user','$buku','$ulasan','4')";
    $query     = mysqli_query($koneksidb, $sql);
    if ($query) {
        echo " <script> alert ('Berhasil Mengirim Ulasan.'); </script> ";
        echo "<script type='text/javascript'> document.location = 'pinjam.php?id=$buku'; </script>";
    } else {
        echo " <script> alert ('Ooops, terjadi kesalahan. Silahkan coba lagi.'); </script> ";
    }
}
if (isset($_POST['rating5'])) {
    //insert
    $sql     = "INSERT INTO ulasanbuku (UserID,BukuID,Ulasan,Rating)
			VALUES('$user','$buku','$ulasan','5')";
    $query     = mysqli_query($koneksidb, $sql);
    if ($query) {
        echo " <script> alert ('Berhasil Mengirim Ulasan.'); </script> ";
        echo "<script type='text/javascript'> document.location = 'pinjam.php?id=$buku'; </script>";
    } else {
        echo " <script> alert ('Ooops, terjadi kesalahan. Silahkan coba lagi.'); </script> ";
    }
}
