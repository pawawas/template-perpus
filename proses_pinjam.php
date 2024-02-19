<?php
include('koneksi.php');


$buku = $_POST['buku'];
$user = $_POST['user'];

$awal = $_POST['tglawal'];
$akhir = $_POST['tglakhir'];
$jumlah = $_POST['jumlah'];
$status = "dipesan";
$denda = "0";

$query1 = mysqli_query($koneksidb, "select * from buku where BukuID = '$buku'");
$result = mysqli_fetch_array($query1);
$stok = $result['Stok'];

$kurangistok = $stok - $jumlah;

//insert
$sql     = "INSERT INTO peminjaman (UserID,BukuID,TanggalPeminjaman,TanggalPengembalian,StatusPeminjaman,Jumlah,Denda)
			VALUES('$user','$buku','$awal','$akhir','$status','$jumlah','$denda')";
$query     = mysqli_query($koneksidb, $sql);
if ($query) {
    mysqli_query($koneksidb, "update buku set Stok = '$kurangistok' where BukuID = '$buku'");
    echo " <script> alert ('Buku berhasil Dipinjam.'); </script> ";
    echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
} else {
    echo " <script> alert ('Ooops, terjadi kesalahan. Silahkan coba lagi.'); </script> ";
}
