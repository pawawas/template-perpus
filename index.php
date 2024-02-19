<?php include('koneksi.php');
session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="icon" href="img/favicon.png" type="image/png" />
    <link rel="shortcut icon" href="admin/assets/avatars/buku.png">

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
</head>

<body>
    <!--================Header Menu Area =================-->
    <?php
    include('include/header.php');
    ?>
    <!--================Header Menu Area =================-->

    <!--================Home Banner Area =================-->
    <section class="home_banner_area mb-40">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content row">
                    <div class="col-lg-12">
                        <p class="sub text-uppercase">Paw Paw Pus</p>
                        <h3><span>Cari</span> Buku <br />Favorit <span>Anda</span></h3>
                        <h4>Fowl saw dry which a above together place.</h4>
                        <a class="main_btn mt-40" href="buku.php">Lihat Koleksi</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!-- Start feature Area -->
    <!-- End feature Area -->
    <section class="feature-area section_gap_bottom_custom">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="single-feature">
                        <a href="#" class="title">
                            <i class="fa fa-book"></i>
                            <h3>Tersedia</h3>
                        </a>
                        <?php
                        $query = mysqli_query($koneksidb, "select * from buku");
                        $jumlah_buku = mysqli_num_rows($query);
                        ?>
                        <p><?php echo $jumlah_buku ?> Buku</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="single-feature">
                        <a href="#" class="title">
                            <i class="fa fa-user"></i>
                            <h3>Member</h3>
                            <?php
                            $query1 = mysqli_query($koneksidb, "select * from user where level = 'user'");
                            $jumlah_member = mysqli_num_rows($query1);
                            ?>
                        </a>
                        <p><?php echo $jumlah_member ?> Member</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="single-feature">
                        <a href="#" class="title">
                            <i class="flaticon-support"></i>
                            <h3>Fast Respon</h3>
                        </a>
                        <p>Layanan admin 24 Jam</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="single-feature">
                        <a href="#" class="title">
                            <i class="flaticon-blockchain"></i>
                            <h3>Mudah</h3>
                        </a>
                        <p>Simple dan mudah di akses</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ Feature Product Area =================-->
    <section class="feature_product_area section_gap_bottom_custom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="main_title">
                        <h2><span>buku Terbaru</span></h2>
                        <p>Daftar Buku Terbaru Bulan ini</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <?php
                $sql = "select buku.*, kategoribuku.* from kategoribuku, buku where
                        buku.KategoriID = kategoribuku.KategoriID and buku.Stok>0 order by BukuID desc limit 3";
                $query = mysqli_query($koneksidb, $sql);
                while ($result = mysqli_fetch_array($query)) {
                ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-product">
                            <div class="product-img">
                                <img class="img-fluid w-100" src="foto/<?php echo $result['Gambar'] ?>" alt="" />

                                <div class="p_icon">
                                    <?php
                                    if ($_SESSION['ulogin']) { ?>
                                        <a href="tambah_koleksi.php?id=<?php echo $result['BukuID']; ?>">
                                            <i class="ti-bookmark"></i>
                                        </a>

                                    <?php } else {
                                    } ?>

                                    <a href="pinjam.php?id=<?php echo $result['BukuID'] ?>">
                                        <i class="ti-plus"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="product-btm">
                                <a href="#" class="d-block">
                                    <span><?php echo $result['Judul'] ?></span>

                                </a>
                                <div class="mt-3">

                                    <p>Tersedia untuk Dipinjam
                                    <p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <!--================ End Feature Product Area =================-->

    <!--================ Offer Area =================-->
    <section class="offer_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="offset  text-center">
                    <div class="offer_content">

                        <h3 class="text-uppercase mb-40">Paw Paw Pus</h3>
                        <h2 class="text-uppercase">Info Selengkapnya</h2>
                        <a href="contact_us.php" class="main_btn mb-20 mt-5">Klik Disini</a>

                    </div>
                </div>
            </div>
        </div>
    </section>
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