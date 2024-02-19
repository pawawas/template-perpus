<?php
session_start();
include('koneksi.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:login.php');
} else {
?>
    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="favicon.ico">
        <link rel="shortcut icon" href="assets/avatars/buku.png">
        <title>Paw Paw Pus</title>
        <!-- Simple bar CSS -->
        <link rel="stylesheet" href="css/simplebar.css">
        <!-- Fonts CSS -->
        <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <!-- Icons CSS -->
        <link rel="stylesheet" href="css/feather.css">
        <link rel="stylesheet" href="css/select2.css">
        <link rel="stylesheet" href="css/dropzone.css">
        <link rel="stylesheet" href="css/uppy.min.css">
        <link rel="stylesheet" href="css/jquery.steps.css">
        <link rel="stylesheet" href="css/jquery.timepicker.css">
        <link rel="stylesheet" href="css/quill.snow.css">
        <!-- Date Range Picker CSS -->
        <link rel="stylesheet" href="css/daterangepicker.css">
        <!-- App CSS -->
        <link rel="stylesheet" href="css/app-light.css" id="lightTheme">
        <link rel="stylesheet" href="css/app-dark.css" id="darkTheme" disabled>
    </head>

    <body class="vertical  light  ">
        <div class="wrapper">
            <nav class="topnav navbar navbar-light">
                <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
                    <i class="fe fe-menu navbar-toggler-icon"></i>
                </button>
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link text-muted my-2" href="#" id="modeSwitcher" data-mode="light">
                            <i class="fe fe-sun fe-16"></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-muted pr-0 mt-2" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="avatar avatar-sm mt-2">
                                <i class="fe fe-user fe-16"></i> </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="logout.php">Logout</a>
                        </div>
                    </li>
                </ul>
            </nav>
            <aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
                <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
                    <i class="fe fe-x"><span class="sr-only"></span></i>
                </a>
                <nav class="vertnav navbar navbar-light">
                    <!-- nav bar -->
                    <div class="w-100 mb-4 d-flex mt-4">

                        <a class="navbar-brand mx-auto mt-2 flex-fill text-center">
                            <img src="assets/avatars/buku.png" width="50" height="50" alt="">
                        </a>
                    </div>
                    <ul class="navbar-nav flex-fill w-100 mb-2">
                        <li class="nav-item w-100">
                            <a class="nav-link" href="index.php">
                                <i class="fe fe-home fe-16"></i>
                                <span class="ml-3 item-text">Dashboard</span>
                            </a>
                        </li>
                        <p class="text-muted nav-heading mt-4 mb-1">
                            <span>Pages</span>
                        </p>
                        <ul class="navbar-nav flex-fill w-100 mb-2">
                            <li class="nav-item dropdown">
                                <a href="#ui-elements" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                                    <i class="fe fe-user fe-16"></i>
                                    <span class="ml-3 item-text">User Page</span>
                                </a>
                                <ul class="collapse list-unstyled pl-4 w-100" id="ui-elements">
                                    <li class="nav-item">
                                        <a class="nav-link pl-3" href="user.php"><span class="ml-1 item-text">User</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link pl-3" href="petugas.php"><span class="ml-1 item-text">Petugas</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link pl-3" href="admin.php"><span class="ml-1 item-text">Admin</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="#ui-elementss" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                                    <i class="fe fe-book fe-16"></i>
                                    <span class="ml-3 item-text">Buku</span>
                                </a>
                                <ul class="collapse list-unstyled pl-4 w-100" id="ui-elementss">
                                    <li class="nav-item">
                                        <a class="nav-link pl-3" href="kategori.php"><span class="ml-1 item-text">Kategori Buku</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link pl-3" href="buku.php"><span class="ml-1 item-text">Data Buku</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <p class="text-muted nav-heading mt-4 mb-1">
                            <span>Form</span>
                        </p>
                        <ul class="navbar-nav flex-fill w-100 mb-2">
                            <li class="nav-item dropdown">
                                <a href="#contact" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                                    <i class="fe fe-book-open fe-16"></i>
                                    <span class="ml-3 item-text">Peminjaman</span>
                                </a>
                                <ul class="collapse list-unstyled pl-4 w-100" id="contact">
                                    <a class="nav-link pl-3" href="peminjaman_dipesan.php"><span class="ml-1">Dipesan</span></a>
                                    <a class="nav-link pl-3" href="peminjaman_dipinjam.php"><span class="ml-1">Dipinjam</span></a>
                                    <a class="nav-link pl-3" href="peminjaman_selesai.php"><span class="ml-1">Selesai</span></a>
                                    <a class="nav-link pl-3" href="peminjaman_kembali.php"><span class="ml-1">Data Pengembalian</span></a>
                                    <a class="nav-link pl-3" href="peminjaman.php"><span class="ml-1">Data Peminjaman</span></a>
                                </ul>
                            </li>
                            <li class="nav-item w-100">
                                <a class="nav-link" href="laporan.php">
                                    <i class="fe fe-file fe-16"></i>
                                    <span class="ml-3 item-text">Laporan</span>
                                </a>
                            </li>
                            <li class="nav-item w-100">
                                <a class="nav-link" href="ulasan.php">
                                    <i class="fe fe-message-circle fe-16"></i>
                                    <span class="ml-3 item-text">Ulasan</span>
                                </a>
                            </li>
                        </ul>

                </nav>
            </aside>
            <main role="main" class="main-content">
                <div class="container-fluid">
                    <!-- .container-fluid -->
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <h2 class="mb-2 page-title">Tambah Data Kategori</h2>
                            <div class="row my-4">
                                <!-- Small table -->
                                <div class="col-md-12">
                                    <div class="card shadow">
                                        <div class="card-body">

                                            <?php
                                            $id = $_GET['id'];
                                            $query = mysqli_query($koneksidb, "select * from kategoribuku where KategoriID = '$id'");
                                            $result = mysqli_fetch_array($query);
                                            ?>
                                            <!-- table -->
                                            <form action="proses_tambah_kategori.php" method="post">
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label">Nama Kategori</label>
                                                    <input type="text" name="nama" class="form-control" value="<?php echo $result['NamaKategori'] ?>" disabled>
                                                </div>
                                                <a href="kategori.php" class="btn btn-warning">Kembali</a>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- simple table -->
                        </div> <!-- end section -->
                    </div> <!-- .col-12 -->
                </div> <!-- .row -->
            </main> <!-- main -->
        </div> <!-- .wrapper -->
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/moment.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/simplebar.min.js"></script>
        <script src='js/daterangepicker.js'></script>
        <script src='js/jquery.stickOnScroll.js'></script>
        <script src="js/tinycolor-min.js"></script>
        <script src="js/config.js"></script>
        <script src="js/d3.min.js"></script>
        <script src="js/topojson.min.js"></script>
        <script src="js/datamaps.all.min.js"></script>
        <script src="js/datamaps-zoomto.js"></script>
        <script src="js/datamaps.custom.js"></script>
        <script src="js/Chart.min.js"></script>
        <script>
            /* defind global options */
            Chart.defaults.global.defaultFontFamily = base.defaultFontFamily;
            Chart.defaults.global.defaultFontColor = colors.mutedColor;
        </script>
        <script src="js/gauge.min.js"></script>
        <script src="js/jquery.sparkline.min.js"></script>
        <script src="js/apexcharts.min.js"></script>
        <script src="js/apexcharts.custom.js"></script>
        <script src='js/jquery.mask.min.js'></script>
        <script src='js/select2.min.js'></script>
        <script src='js/jquery.steps.min.js'></script>
        <script src='js/jquery.validate.min.js'></script>
        <script src='js/jquery.timepicker.js'></script>
        <script src='js/dropzone.min.js'></script>
        <script src='js/uppy.min.js'></script>
        <script src='js/quill.min.js'></script>
        <script>
            $('.select2').select2({
                theme: 'bootstrap4',
            });
            $('.select2-multi').select2({
                multiple: true,
                theme: 'bootstrap4',
            });
            $('.drgpicker').daterangepicker({
                singleDatePicker: true,
                timePicker: false,
                showDropdowns: true,
                locale: {
                    format: 'MM/DD/YYYY'
                }
            });
            $('.time-input').timepicker({
                'scrollDefault': 'now',
                'zindex': '9999' /* fix modal open */
            });
            /** date range picker */
            if ($('.datetimes').length) {
                $('.datetimes').daterangepicker({
                    timePicker: true,
                    startDate: moment().startOf('hour'),
                    endDate: moment().startOf('hour').add(32, 'hour'),
                    locale: {
                        format: 'M/DD hh:mm A'
                    }
                });
            }
            var start = moment().subtract(29, 'days');
            var end = moment();

            function cb(start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            }
            $('#reportrange').daterangepicker({
                startDate: start,
                endDate: end,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                }
            }, cb);
            cb(start, end);
            $('.input-placeholder').mask("00/00/0000", {
                placeholder: "__/__/____"
            });
            $('.input-zip').mask('00000-000', {
                placeholder: "____-___"
            });
            $('.input-money').mask("#.##0,00", {
                reverse: true
            });
            $('.input-phoneus').mask('(000) 000-0000');
            $('.input-mixed').mask('AAA 000-S0S');
            $('.input-ip').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
                translation: {
                    'Z': {
                        pattern: /[0-9]/,
                        optional: true
                    }
                },
                placeholder: "___.___.___.___"
            });
            // editor
            var editor = document.getElementById('editor');
            if (editor) {
                var toolbarOptions = [
                    [{
                        'font': []
                    }],
                    [{
                        'header': [1, 2, 3, 4, 5, 6, false]
                    }],
                    ['bold', 'italic', 'underline', 'strike'],
                    ['blockquote', 'code-block'],
                    [{
                            'header': 1
                        },
                        {
                            'header': 2
                        }
                    ],
                    [{
                            'list': 'ordered'
                        },
                        {
                            'list': 'bullet'
                        }
                    ],
                    [{
                            'script': 'sub'
                        },
                        {
                            'script': 'super'
                        }
                    ],
                    [{
                            'indent': '-1'
                        },
                        {
                            'indent': '+1'
                        }
                    ], // outdent/indent
                    [{
                        'direction': 'rtl'
                    }], // text direction
                    [{
                            'color': []
                        },
                        {
                            'background': []
                        }
                    ], // dropdown with defaults from theme
                    [{
                        'align': []
                    }],
                    ['clean'] // remove formatting button
                ];
                var quill = new Quill(editor, {
                    modules: {
                        toolbar: toolbarOptions
                    },
                    theme: 'snow'
                });
            }
            // Example starter JavaScript for disabling form submissions if there are invalid fields
            (function() {
                'use strict';
                window.addEventListener('load', function() {
                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                    var forms = document.getElementsByClassName('needs-validation');
                    // Loop over them and prevent submission
                    var validation = Array.prototype.filter.call(forms, function(form) {
                        form.addEventListener('submit', function(event) {
                            if (form.checkValidity() === false) {
                                event.preventDefault();
                                event.stopPropagation();
                            }
                            form.classList.add('was-validated');
                        }, false);
                    });
                }, false);
            })();
        </script>
        <script>
            var uptarg = document.getElementById('drag-drop-area');
            if (uptarg) {
                var uppy = Uppy.Core().use(Uppy.Dashboard, {
                    inline: true,
                    target: uptarg,
                    proudlyDisplayPoweredByUppy: false,
                    theme: 'dark',
                    width: 770,
                    height: 210,
                    plugins: ['Webcam']
                }).use(Uppy.Tus, {
                    endpoint: 'https://master.tus.io/files/'
                });
                uppy.on('complete', (result) => {
                    console.log('Upload complete! We’ve uploaded these files:', result.successful)
                });
            }
        </script>
        <script src="js/apps.js"></script>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());
            gtag('config', 'UA-56159088-1');
        </script>
    </body>

    </html>
<?php } ?>