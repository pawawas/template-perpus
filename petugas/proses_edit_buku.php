<?php

include "koneksi.php";

$id =$_POST['id']; 

$nama = $_POST['nama'];
$penulis = $_POST['penulis'];
$penerbit = $_POST['penerbit'];
$tahun = $_POST['tahun'];
$kategori = $_POST['idkat'];


if(isset($_POST['ubah'])){
    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];

    $path = "../foto/".$foto;

if(move_uploaded_file($tmp, $path)){
    $query = "select * from buku where BukuID='$id'";
    $sql = mysqli_query($koneksidb, $query);
    $data = mysqli_fetch_array($sql);

    if(is_file("../foto/".$data['foto']))
    unlink("../foto/".$data['foto']);

    $query = "update buku set Judul='$nama', Penulis='$penulis' , Penerbit='$penerbit', TahunTerbit='$tahun',
    KategoriID = '$kategori',Gambar='$foto' where BukuID='$id'";
    $sql = mysqli_query($koneksidb, $query);
    if($sql){
      echo  "<script type='text/javascript'>
				alert('Berhasil edit data.'); 	
				document.location = 'buku.php'; 
			</script>";
    }else{
        echo "Maaf, terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
        echo "<br><a href='edit_buku.php'>Kembali ke Form</a>";
    }
    }else{
        echo "Maaf, gagal upload foto.";
        echo "<br><a href='edit_buku.php?id=$id'>Kembali ke Form</a>";
    }
    }else{
    $query2 = "update buku set Judul='$nama', Penulis='$penulis', Penerbit='$penerbit', TahunTerbit='$tahun',
    KategoriID = '$kategori' where BukuID='$id'";
    $sql2 = mysqli_query($koneksidb, $query2);
    if($sql2){
        echo "<script type='text/javascript'>
        alert('Berhasil edit data.'); 	
        document.location = 'buku.php'; 
    </script>";
    }else{
        echo "Maaf, terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
        echo "<br><a href='edit_buku.php?id=$id'>Kembali ke Form</a>";  
    }
}
?>

