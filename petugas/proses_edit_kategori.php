<?php
include('koneksi.php');

$id = $_POST['id'];
$nama	= $_POST['nama'];

$sql = "UPDATE kategoribuku SET NamaKategori='$nama' WHERE KategoriID ='$id'";
$query 	= mysqli_query($koneksidb,$sql);
if($query){
	echo "<script type='text/javascript'>
			alert('Berhasil edit data.'); 	
			
			document.location = 'kategori.php'; 
		</script>";

}else {
	echo "<script type='text/javascript'>
			alert('Terjadi kesalahan, silahkan coba lagi!.'); 
			document.location = 'edit_kategori.php?id=$id'; 
		</script>";

}
?>
