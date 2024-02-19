<?php include('koneksi.php');
session_start();
if (strlen($_SESSION['ulogin']) == 0) {
    header('location:login_user.php');
} else {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link rel="icon" href="img/favicon.png" type="image/png" />
        <title>Paw Paw Pus</title>
        <link rel="shortcut icon" href="admin/assets/avatars/buku.png">

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
    </head>

    <body>
        <!--================Header Menu Area =================-->
        <?php
        include('include/header.php');
        ?>
        <section class="cart_area">
            <div class="container">
                <div class="main_title">
                    <h2><span>Riwayat Peminjaman</span></h2>
                </div>
                <div class="cart_inner">

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">No</th>
                                    <th scope="col">Judul Buku</th>
                                    <th scope="col">Tanggal Peminjaman</th>
                                    <th scope="col">Tanggal Pengembalian</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Jumlah Buku</th>
                                    <th scope="col">Cetak</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 0;
                                $sql = "SELECT peminjaman.*,buku.*,kategoribuku.*,user.* FROM peminjaman,buku,kategoribuku,user WHERE buku.BukuID=peminjaman.BukuID
											AND kategoribuku.KategoriID=buku.KategoriID AND user.UserID=peminjaman.UserID";
                                $query = mysqli_query($koneksidb, $sql);
                                while ($result = mysqli_fetch_array($query)) {
                                    $no++;
                                ?>
                                    <tr class="text-center">
                                        <th><?php echo $no ?></th>
                                        <th><?php echo $result['Judul']; ?></th>

                                        <th><?php echo $result['TanggalPeminjaman']; ?></th>
                                        <th><?php echo $result['TanggalPengembalian']; ?></th>
                                        <th><?php echo $result['StatusPeminjaman']; ?></th>
                                        <th><?php echo $result['Jumlah']; ?></th>
                                        <th>
                                            <a href="cetak_struk_pinjam.php?id=<?php echo $result['peminjamanID']; ?>" target="_blank"><i class="ti-file"></a></i>
                                        </th>

                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>



        <!--================Home Banner Area =================-->

        <!--================End Home Banner Area =================-->

        <!-- Start feature Area -->
        <!-- End feature Area -->

        <!--================ Feature Product Area =================-->


        <!--================ End Feature Product Area =================-->

        <!--================ Offer Area =================-->

        <!--================ End Offer Area =================-->

        <!--================ New Product Area =================-->
        <!--================ End New Product Area =================-->

        <!--================ Inspired Product Area =================-->

        <!--================ End Inspired Product Area =================-->

        <!--================ Start Blog Area =================-->
        <!--================ End Blog Area =================-->

        <!--================ start footer Area  =================-->
        <?php
        include('include/footer.php');
        ?>
        <!--================ End footer Area  =================-->

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
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
<?php } ?>