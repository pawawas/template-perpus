<?php
include('koneksi.php');

$id = $_POST['id'];
$nama	= $_POST['nama'];
$password = md5($_POST['password']);
$email = $_POST['email'];
$namale = $_POST['namalengkap'];
$alamat = $_POST['alamat'];

$sql = "UPDATE user SET Username='$nama', Email='$email', NamaLengkap='$namale', Alamat='$alamat' WHERE UserID ='$id'";
$query 	= mysqli_query($koneksidb, $sql);
if ($query) {
	echo "<script type='text/javascript'>
			alert('Berhasil edit data.'); 	
			
			document.location = 'petugas.php'; 
		</script>";
} else {
	echo "<script type='text/javascript'>
			alert('Terjadi kesalahan, silahkan coba lagi!.'); 
			document.location = 'edit_petugas.php?id=$id'; 
		</script>";
}
if (isset($_POST['ubah'])) {
	$password = md5($_POST['password']);

	$sql1 = "UPDATE user SET Username='$nama', Password='$password', Email='$email', NamaLengkap='$namale', Alamat='$alamat' WHERE UserID ='$id'";
	$query1 	= mysqli_query($koneksidb, $sql1);
	if ($query1) {
		echo "<script type='text/javascript'>
				alert('Berhasil edit data.'); 	
				document.location = 'petugas.php'; 
			</script>";
	} else {
		echo "<script type='text/javascript'>
				alert('Terjadi kesalahan, silahkan coba lagi!.'); 
				document.location = 'edit_petugas.php?id=$id'; 
			</script>";
	}
}
