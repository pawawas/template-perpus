<?php include('koneksi.php');
$id = $_GET['id'];
$sql1     = "SELECT peminjaman.*,buku.*,kategoribuku.*,user.* FROM peminjaman,buku,kategoribuku,user WHERE buku.BukuID=peminjaman.BukuID
AND kategoribuku.KategoriID=buku.KategoriID AND user.UserID=peminjaman.UserID and peminjaman.peminjamanID = '$id'";
$query1 = mysqli_query($koneksidb, $sql1);
$result = mysqli_fetch_array($query1);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="icon" href="img/favicon.png" type="image/png" />
    <title>Paw Paw Pus</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="vendors/linericon/style.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/themify-icons.css" />
    <link rel="stylesheet" href="css/flaticon.css" />
    <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="vendors/lightbox/simpleLightbox.css" />
    <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css" />
    <link rel="stylesheet" href="vendors/animate-css/animate.css" />
    <link rel="stylesheet" href="vendors/jquery-ui/jquery-ui.css" />
    <!-- main css -->
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/responsive.css" />
    <link rel="shortcut icon" href="admin/assets/avatars/buku.png">

</head>

<body>
    <section class="inspired_product_area section_gap mt-3">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="main_title">

                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td rowspan="3" width="16%" class="text-center">
                                        <img src="admin/assets/avatars/buku.png" alt="logo-dkm" width="80" />
                                    </td>
                                    <td class="text-center">
                                        <h3>Perpustakaan</h3>
                                    </td>
                                    <td rowspan="3" width="16%">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td class="text-center">
                                        <h2>Paw Paw Pus</h2>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">Jl.Kamboja No 110, RW.07/RW.13, perum pondok teratai, Kec Sooko, kab Mojokerto </td>
                                </tr>
                            </tbody>
                        </table>
                        <hr class="line-top" />
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <h4 class="text-center">Detail Peminjaman</h4>
                <br />
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <td width="23%">No. Peminjaman</td>
                            <td width="2%">:</td>
                            <td><?php echo $result['peminjamanID']; ?></td>
                        </tr>
                        <tr>
                            <td>Peminjam</td>
                            <td>:</td>
                            <td><?php echo $result['Username'] ?></td>
                        </tr>

                        <tr>
                            <td>Judul Buku</td>
                            <td>:</td>
                            <td><?php echo $result['Judul']; ?></td>
                        </tr>
                        <tr>
                            <td>Kategori Buku</td>
                            <td>:</td>
                            <td><?php echo $result['NamaKategori']; ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Mulai</td>
                            <td>:</td>
                            <td><?php echo $result['TanggalPeminjaman']; ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Selesai</td>
                            <td>:</td>
                            <td><?php echo $result['TanggalPengembalian']; ?></td>
                        </tr>
                        <tr>
                            <td>Jumlah Buku</td>
                            <td>:</td>
                            <td><?php echo $result['Jumlah']; ?></td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>:</td>
                            <td><?php echo $result['StatusPeminjaman']; ?></td>
                        </tr>
                        <?php
                        if ($result['StatusPeminjaman'] == 'selesai') {
                            # code... <tr>
                        ?>
                            <td>Denda</td>
                            <td>:</td>
                            <td><?php echo $result['Denda']; ?></td>
                            </tr>
                        <?php } else {
                        } ?>

                    </tbody>
                </table>
            </div><!-- /.container -->
    </section>

    <script type="text/javascript">
        window.print();
    </script>

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/stellar.js"></script>
    <script src="vendors/lightbox/simpleLightbox.min.js"></script>
    <script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
    <script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
    <script src="vendors/isotope/isotope-min.js"></script>
    <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="vendors/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendors/counter-up/jquery.counterup.js"></script>
    <script src="js/mail-script.js"></script>
    <script src="js/theme.js"></script>
</body>

</html>