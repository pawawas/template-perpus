<?php
include('koneksi.php');

$id = $_GET['id'];


$sql = "UPDATE peminjaman set StatusPeminjaman='dipinjam' where peminjamanID='$id'";
$query 	= mysqli_query($koneksidb, $sql);
if ($query) {
	echo "<script type='text/javascript'>
			alert('Berhasil edit data.'); 	
			
			document.location = 'peminjaman_dipesan.php'; 
		</script>";
} else {
	echo "<script type='text/javascript'>
			alert('Terjadi kesalahan, silahkan coba lagi!.'); 
			document.location = 'peminjaman_dipesan.php'; 
		</script>";
}
