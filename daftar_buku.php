<?php include('koneksi.php');
error_reporting(0);
session_start();
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
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content d-md-flex justify-content-between align-items-center">
                    <div class="mb-3 mb-md-0">
                        <h2>Daftar Buku</h2>

                    </div>
                    <div class="page_link">
                        <a href="index.php">Home</a>
                        <a href="aftar_buku.php">Daftar Buku</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Header Menu Area =================-->

    <!--================Home Banner Area =================-->

    <!--================End Home Banner Area =================-->

    <!-- Start feature Area -->
    <!-- End feature Area -->

    <!--================ Feature Product Area =================-->
    <section class="inspired_product_area section_gap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="main_title">
                        <h2><span>Daftar Buku</span></h2>
                        <p>Pilih Buku Yang Ingin Dipinjam </p>
                    </div>
                </div>
            </div>

            <div class="row">
                <?php
                $sql = "select buku.*, kategoribuku.* from kategoribuku, buku where
                        buku.KategoriID = kategoribuku.KategoriID and buku.Stok>0 order by BukuID asc";
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
                                        <a href="tambah_koleksi
                                        .php?id=<?php echo $result['BukuID']; ?>">
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