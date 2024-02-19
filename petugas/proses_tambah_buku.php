<?php
include('koneksi.php');

$nama	= $_POST['nama'];
$penulis = $_POST['penulis'];
$penerbit = $_POST['penerbit'];
$tahun = $_POST['tahun'];
$kate = $_POST['kategori'];
$stok = $_POST['stok'];

$foto =  $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];



$path = "../foto/".$foto;

if(move_uploaded_file($tmp, $path)){
$sql 	= "INSERT INTO buku (Judul, Penulis, Penerbit, TahunTerbit, KategoriID,Stok, Gambar) VALUES ('$nama','$penulis','$penerbit', '$tahun', '$kate','$stok', '$foto')";
$query 	= mysqli_query($koneksidb,$sql);
if($query){
	echo "<script type='text/javascript'>
			alert('Berhasil tambah data.'); 
			document.location = 'buku.php'; 
		</script>";

}else {
	echo "<script type='text/javascript'>
			alert('Terjadi kesalahan, silahkan coba lagi!.'); 
			document.location = 'tambah_buku.php'; 
		</script>";
}
}
?>