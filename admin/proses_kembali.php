<?php
include('koneksi.php');

$id = $_POST['id'];

$status	= "dipinjam";
$kondisi	= $_POST['denda'];
$denda = 0;

if($kondisi == 'baik'){
    $denda=0;
    
}else{
    $denda=20000;
} 

$sqlstok = "select buku.*, peminjaman.* from buku, peminjaman where peminjaman.BukuID = buku.BukuID and peminjamanID = '$id'";
$querystok = mysqli_query($koneksidb,$sqlstok);
$result = mysqli_fetch_array($querystok);
$idbuku = $result['BukuID'];
$jumlah = $result['Jumlah'];
$stok = $result['Stok'];

$stokbaru = $jumlah+$stok;


mysqli_query($koneksidb,  "update buku set Stok = '$stokbaru' where BukuID = '$idbuku'");
$sql = "UPDATE peminjaman SET StatusPeminjaman='selesai', Denda='$denda' WHERE peminjamanID ='$id'";
$query 	= mysqli_query($koneksidb,$sql);
if($query){
     echo "<script type='text/javascript'>
			alert('Berhasil Menambah Data'); 
			document.location = 'peminjaman_kembali.php'; 
		</script>";  
	

}else {
	echo "<script type='text/javascript'>
			alert('Terjadi kesalahan, silahkan coba lagi!.'); 
			document.location = 'edit_peminjaman_kembali.php?id=$id'; 
		</script>";

}


?>
