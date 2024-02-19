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
        <divc class="wrapper">
            <div class="container-fluid">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <td rowspan="3" width="16%" class="text-center">

                            </td>
                            <td class="text-center">
                                <h3>LAPORAN</h3>
                                <img src="assets/avatars/buku.png" width="50" height="50" alt="">
                            </td>
                            <td rowspan="3" width="16%">&nbsp;</td>
                        </tr>
                        <tr>
                            <td class="text-center">
                                <h2>PERPUSTAKAAN</h2>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">Jl.Kamboja No 110, RW.07/RW.13, perum pondok teratai, Kec Sooko, kab Mojokerto </td>
                        </tr>
                    </tbody>
                </table>
                <hr class="line-top" />
            </div>
            </section>
            <?php
            if (isset($_POST['cetak'])) {
                $no = 0;
                $mulai    = $_GET['awal'];
                $selesai = $_GET['akhir'];
                $status = $_GET['status'];
                $sqlsewa =   "SELECT peminjaman.*,buku.*,kategoribuku.*,user.* FROM peminjaman,buku,kategoribuku,user WHERE buku.BukuID=peminjaman.BukuID
                AND kategoribuku.KategoriID=buku.KategoriID AND user.UserID=peminjaman.UserID AND StatusPeminjaman='$status' AND peminjaman.TanggalPeminjaman BETWEEN '$mulai' AND '$selesai'";
                $querysewa = mysqli_query($koneksidb, $sqlsewa);
            ?>
                <div class="container-fluid">
                    <h4 class="text-center">Detail Laporan</h4>
                    <h5 class="text-center">Tanggal <?php echo $mulai . " s/d " . $selesai; ?></h5>
                    <br />
                    <table id="zctb" class="text-center display table-striped table-bordered table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Peminjaman</th>
                                <th>Buku</th>
                                <th>Tanggal Peminjaman</th>
                                <th>Jumlah</th>
                                <th>Denda</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total = 0;
                            while ($result = mysqli_fetch_array($querysewa)) {
                                $denda = $result['Denda'];
                                $total += $denda;
                                $no++;
                            ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo htmlentities($result['peminjamanID']); ?></td>
                                    <td><?php echo htmlentities($result['Judul']); ?></td>
                                    <td><?php echo htmlentities($result['TanggalPeminjaman']); ?></td>
                                    <td><?php echo htmlentities($result['Jumlah']); ?></td>
                                    <td><?php echo number_format($result['Denda']); ?></td>
                                </tr>
                            <?php }
                            ?>
                        </tbody>
                        <tfoot>
                            <?php
                            echo '<tr>';
                            echo '<th></th>';
                            echo '<th></th>';
                            echo '<th colspan="3" class="text-center">Total Denda</th>';

                            echo '<th class="text-center">' . number_format($total) . '</th>';
                            echo '</tr>';
                            ?>
                        </tfoot>
                    </table>
                <?php }
                ?>

                </div><!-- /.container -->

                <script type="text/javascript">
                    window.print();
                </script>
                </div>
                <!-- .wrapper -->
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