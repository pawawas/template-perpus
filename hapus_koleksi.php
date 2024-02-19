<?php
include('koneksi.php');

$id    = $_GET['id'];
$sql    = "DELETE FROM koleksipribadi WHERE KoleksiID='$id'";
$query    = mysqli_query($koneksidb, $sql);
if ($query) {

    echo "<script type='text/javascript'>
			alert('Koleksi berhasil dihapus.'); 
			document.location = 'koleksi.php'; 
		</script>";
} else {
    echo "<script type='text/javascript'>
			alert('Terjadi kesalahan, silahkan coba lagi!.'); 
			document.location = 'koleksi.php'; 
		</script>";
}
