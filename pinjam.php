<?php
include('koneksi.php');
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
    <title>Paw Paw Pus</title>
    <link rel="shortcut icon" href="admin/assets/avatars/buku.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="vendors/linericon/style.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/themify-icons.css" />
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
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content d-md-flex justify-content-between align-items-center">
                    <div class="mb-3 mb-md-0">
                        <h2>Proses Pinjam</h2>
                    </div>
                    <div class="page_link">
                        <a href="index.php">Home</a>
                        <?php $id = $_GET['id']; ?>
                        <a href="pinjam.php?id=<?php echo $id ?>">Proses Pinjam</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--================End Home Banner Area =================-->

    <!--================Cart Area =================-->
    <?php
    $id = $_GET['id'];
    $sql = "select buku.*, kategoribuku.* from kategoribuku, buku where
                        buku.KategoriID = kategoribuku.KategoriID and BukuID ='$id'";
    $query = mysqli_query($koneksidb, $sql);
    while ($result = mysqli_fetch_array($query)) {
    ?>
        <section class="blog_area section_gap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mb-5 mb-lg-0">
                        <div class="blog_left_sidebar">
                            <article class="blog_item">
                                <div class="blog_item_img">
                                    <img class="card-img rounded-0" src="foto/<?php echo $result['Gambar']; ?>" alt="">
                                    <a href="#" class="blog_item_date">
                                        <h3 class="text-center">Tersedia</h3>
                                        <p class="text-center"><?php echo $result['Stok']; ?> Buku</p>
                                    </a>

                                </div>
                                <div class="blog_details">
                                    <a class="d-inline-block" href="#">
                                        <h2><?php echo $result['Judul']; ?> </h2>
                                    </a>

                                </div>

                            </article>
                        <?php } ?>


                        <article class="blog_item">
                            <div class="blog_item_img">
                                <a href="#" class="blog_item_date">

                                    <p>Ulasan</p>
                                </a>
                            </div>


                            <div class="blog_details">
                                <?php
                                $id = $_GET['id'];
                                $sql1 = "select buku.*, ulasanbuku.*, user.* from ulasanbuku, user, buku where
                        buku.BukuID = ulasanbuku.BukuID and ulasanbuku.UserID = user.UserID and buku.BukuID ='$id'";
                                $query1 = mysqli_query($koneksidb, $sql1);
                                while ($result = mysqli_fetch_array($query1)) {
                                ?>
                                    <a class="d-inline-block" href="single-blog.html">
                                        <h2></h2>
                                    </a>
                                    <p><?php echo $result['Ulasan']; ?></p>
                                    <ul class="blog-info-link">
                                        <li><i class="ti-user"></i> <?php echo $result['Username']; ?></li>
                                        <li><i class="ti-star"></i> <?php echo $result['Rating']; ?></li>
                                    </ul>
                                <?php }
                                ?>
                            </div>
                        </article>


                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="blog_right_sidebar">
                            <?php
                            $id = $_GET['id'];
                            $sql = "select buku.*, kategoribuku.* from kategoribuku, buku where
                        buku.KategoriID = kategoribuku.KategoriID and BukuID ='$id'";
                            $query = mysqli_query($koneksidb, $sql);
                            while ($result = mysqli_fetch_array($query)) {
                            ?>
                                <aside class="single_sidebar_widget post_category_widget">
                                    <h4 class="widget_title">Detail Buku</h4>
                                    <ul class="list cat-list">
                                        <li>
                                            <p>Kategori Buku : <?php echo $result['NamaKategori']; ?> </p>
                                        </li>
                                        <li>
                                            <p>Penulis : <?php echo $result['Penulis']; ?> </p>
                                        </li>
                                        <li>
                                            <p>Penerbit : <?php echo $result['Penerbit']; ?> </p>
                                        </li>
                                        <li>
                                            <p>Tahun Terbit : <?php echo $result['TahunTerbit']; ?> </p>
                                        </li>
                                        <?php
                                        if ($_SESSION['ulogin']) {
                                            # code...
                                        ?>
                                            <a href=tambah_koleksi.php?id=<?php echo $id ?>" class="btn btn-primary mt-3 form-control">Tambah Ke Koleksi</a>
                                        <?php  } else {
                                        ?>
                                        <?php } ?>



                                    </ul>
                                </aside>
                                <?php
                                $useremail = $_SESSION['ulogin'];
                                $sqli = "SELECT * from user where Email='$useremail'";
                                $queryi = mysqli_query($koneksidb, $sqli);
                                $resultt = mysqli_fetch_array($queryi); ?>
                                <aside class="single_sidebar_widget popular_post_widget">
                                    <form action="proses_pinjam.php" method="post">
                                        <h3 class="widget_title">Form Pinjam Buku</h3>
                                        <div class="media post_item">
                                            <label class="form-label">Tanggal Peminjaman</label>
                                            <input type="hidden" name="buku" id="" value="<?php echo $id ?>" class="form-control">
                                            <input type="hidden" name="user" id="" value="<?php echo $resultt['UserID']; ?>" class="form-control">
                                        </div>
                                        <div class="media post_item">
                                            <?php
                                            $mulai = date("Y-m-d");
                                            ?>
                                            <input type="text" name="" id="" value="" placeholder="<?php echo $mulai ?>" class="form-control" disabled>
                                            <input type="hidden" name="tglawal" id="" value="<?php echo $mulai ?>" class="form-control">
                                        </div>
                                        <div class="media post_item">

                                            <label class="form-label">Tanggal Peminjaman</label>
                                        </div>
                                        <div class="media post_item">
                                            <input type="date" name="tglakhir" id="" class="form-control" class="form-control" Required>

                                        </div>
                                        <div class="media post_item">
                                            <label class="form-label">Jumlah</label>
                                        </div>
                                        <div class="media post_item">
                                            <input type="number" name="jumlah" id="" class="form-control" class="form-control" Required>
                                        </div>
                                        <?php
                                        if ($_SESSION['ulogin']) {
                                            # code...
                                        ?>
                                            <button type="submit" class="btn btn-primary mt-3 form-control">Pinjam</button>
                                        <?php  } else {
                                        ?>
                                            <a href="login_user.php" class="btn btn-primary mt-3 form-control" disabled>Login Terlebih Dahulu</a>
                                        <?php } ?>
                                </aside>
                                </form>
                            <?php } ?>


                            <form action="proses_tambah_ulasan.php" method="post">
                                <input type="hidden" name="buku" value="<?php echo $id ?>" id="">
                                <input type="hidden" name="user" id="" value="<?php echo $resultt['UserID']; ?>" class="form-control">
                                <aside class="single_sidebar_widget popular_post_widget">
                                    <h3 class="widget_title">Tambahkan Ulasan</h3>
                                    <div class="media post_item">
                                        <label class="form-label">Berikan Ulasan</label>
                                    </div>
                                    <div class="media post_item">
                                        <textarea type="text" name="ulasan" placeholder="Masukkan Ulasan" rows="3" class="form-control"></textarea>
                                    </div>
                                    <div class="media post_item">
                                        <label class="form-label">Rating</label>
                                    </div>
                                    <div class="media post_item">
                                        <input type="checkbox" name="rating1" value="1" id="" class="ml-5">
                                        <p class="ml-2 mr-3">1</p>
                                        <input type="checkbox" name="rating2" id=""">
                                    <p class=" ml-2 mr-3">2</p>
                                        <input type="checkbox" name="rating3" id="">
                                        <p class="ml-2 mr-3">3</p>
                                        <input type="checkbox" name="rating4" id="">
                                        <p class="ml-2 mr-3">4</p>
                                        <input type="checkbox" name="rating5" id="">
                                        <p class="ml-2 mr-3">5</p>
                                    </div>
                                    <?php
                                    if ($_SESSION['ulogin']) {
                                        # code...
                                    ?>
                                        <button type="submit" class="btn btn-primary mt-3 form-control">Kirim</button>
                                    <?php  } else {
                                    ?>
                                        <a href="login_user.php" class="btn btn-primary mt-3 form-control" disabled>Login Terlebih Dahulu</a>
                                    <?php } ?>


                                </aside>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!--================End Cart Area =================-->

        <!--================ start footer Area  =================-->
        <?php
        include('include/footer.php');
        ?>
        <!-- ======== End footer Area=================-->

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
        <script src="js/mail-script.js"></script>
        <script src="vendors/jquery-ui/jquery-ui.js"></script>
        <script src="vendors/counter-up/jquery.waypoints.min.js"></script>
        <script src="vendors/counter-up/jquery.counterup.js"></script>
        <script src="js/theme.js"></script>
</body>

</html>