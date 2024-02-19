<?php
include('koneksi.php');
session_start();
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $sql = "SELECT * FROM user WHERE Email='$email' AND Password='$password' and level='user'";
    $query = mysqli_query($koneksidb, $sql);
    $results = mysqli_fetch_array($query);
    if (mysqli_num_rows($query) > 0) {
        $_SESSION['ulogin'] = $_POST['email'];
        $_SESSION['nama'] = $results['Username'];
        echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
    } else {
        echo "<script>alert('Email atau Password Salah!');</script>";
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <link rel="shortcut icon" href="admin/assets/avatars/buku.png">

    <title>Paw Paw Pus</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="admin/css/simplebar.css">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="admin/css/feather.css">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href=admin/css/daterangepicker.css">
    <!-- App CSS -->
    <link rel="stylesheet" href="admin/css/app-light.css" id="lightTheme">
    <link rel="stylesheet" href="admin/css/app-dark.css" id="darkTheme" disabled>
    <link rel="stylesheet" href="asset_login/style.css">
</head>

<body>
    <div class="wrapper">
        <form method="post">
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" name="email" placeholder="Username" required>
                <i class='bx bxs-user-pin'></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <p class="text-center">Belum Punya Akun? <a href="registrasi.php">Klik Disini</a></p>
            <div class="box">
                <input type="submit" name="login" value="Login" />
            </div>
            <div class="box mt-3">
                <a href="index.php" class="text-center">Kembali</a>
            </div>

    </div>


    <!-- Loading Scripts -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap-select.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
    <script src="js/Chart.min.js"></script>
    <script src="js/fileinput.js"></script>
    <script src="js/chartData.js"></script>
    <script src="js/main.js"></script>

</body>

</html>