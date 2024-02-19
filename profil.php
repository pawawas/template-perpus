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
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
                <div class="container">
                    <div class="banner_content d-md-flex justify-content-between align-items-center">
                        <div class="mb-3 mb-md-0">
                            <h2>Profile</h2>

                        </div>
                        <div class="page_link">
                            <a href="index.php">Home</a>
                            <a href="profil.php">Profile</a>
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
                    <div class="col-lg-8 col-md-8">
                        <div class="main_title">
                            <h2><span>Profile</span></h2>
                        </div>
                        <form action="#">
                            <?php
                            $useremail = $_SESSION['ulogin'];
                            $sql = "SELECT * from user where email='$useremail'";
                            $query = mysqli_query($koneksidb, $sql);
                            $result = mysqli_fetch_array($query); ?>

                            <div class="mt-10">
                                <label for="" class="form-label">Username</label>
                                <input type="text" name="first_name" value="<?php echo $result['Username']; ?>" class="single-input" disabled>
                            </div>
                            <div class="mt-10">
                                <label for="" class="form-label">Email</label>
                                <input type="text" name="last_name" value="<?php echo $result['Email']; ?>" disabled class="single-input">
                            </div>
                            <div class="mt-10">
                                <label for="" class="form-label">Nama Lengkap</label>
                                <input type="email" name="EMAIL" value="<?php echo $result['NamaLengkap']; ?>" disabled class="single-input">
                            </div>
                            <div class="mt-10">
                                <label for="" class="form-label">Alamat</label>
                                <textarea type="email" name="EMAIL" rows="3" disabled class="single-input"><?php echo $result['Alamat']; ?></textarea>
                            </div>
                            <div class="mt-10">
                                <a href="logout.php" class="genric-btn danger-border circle single-input">Logout</a>
                            </div>

                        </form>
                    </div>


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
<?php } ?>