<?php
include('koneksi.php');

	$id	= $_GET['id'];
	$sql	= "DELETE FROM buku WHERE BukuID='$id'";
	$query	= mysqli_query($koneksidb, $sql);
    if ($query) {

	echo "<script type='text/javascript'>
			alert('Data berhasil dihapus.'); 
			document.location = 'buku.php'; 
		</script>";
}else {
	echo "<script type='text/javascript'>
			alert('Terjadi kesalahan, silahkan coba lagi!.'); 
			document.location = 'buku.php'; 
		</script>";
}

?>