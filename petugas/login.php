<?php include('koneksi.php');

session_start();
include('koneksi.php');
if (isset($_POST['login'])) {
  $email = $_POST['user'];
  $password = md5($_POST['pass']);
  $sql = "SELECT * FROM user WHERE Username='$email' AND Password='$password'";
  $query = mysqli_query($koneksidb, $sql);
  $results = mysqli_fetch_array($query);
  if (mysqli_num_rows($query) > 0) {
    if ($results['Level'] == "petugas") {
      $_SESSION['alogin'] = $_POST['user'];
      echo "<script type='text/javascript'> document.location = '../petugas/index.php'; </script>";
    } elseif ($results['Level'] == "admin") {
      $_SESSION['alogin'] = $_POST['user'];
      echo "<script type='text/javascript'> document.location = '../admin/index.php'; </script>";
    } else {
      echo "<script>alert('Data Login Tidak Valid');</script>";
    }
  } else {
    echo "<script>alert('Data Login Tidak Valid');</script>";
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
  <link rel="shortcut icon" href="assets/avatars/buku.png">

  <title>Tiny Dashboard - A Bootstrap Dashboard Template</title>
  <!-- Simple bar CSS -->
  <link rel="stylesheet" href="css/simplebar.css">
  <!-- Fonts CSS -->
  <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <!-- Icons CSS -->
  <link rel="stylesheet" href="css/feather.css">
  <!-- Date Range Picker CSS -->
  <link rel="stylesheet" href="css/daterangepicker.css">
  <!-- App CSS -->
  <link rel="stylesheet" href="css/app-light.css" id="lightTheme">
  <link rel="stylesheet" href="css/app-dark.css" id="darkTheme" disabled>
</head>

<body class="light ">
  <div class="wrapper vh-100">
    <div class="row align-items-center h-100">
      <form class="col-lg-3 col-md-4 col-10 mx-auto text-center" method="post">
        <div>
          <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="">
            <img src="assets/avatars/buku.png" width="100" height="100" alt="">
          </a>
          <h1 class="h6 mb-3">Sign in</h1>
          <div class="form-group">
            <label for="inputEmail" class="sr-only">Username</label>
            <input type="text" id="inputEmail" class="form-control form-control-lg" name="user" placeholder="Masukkan Username" required="" autofocus="">
          </div>
          <div class="form-group">
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" class="form-control form-control-lg" name="pass" placeholder="Masukkan Pasword" required="">
          </div>

          <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Login</button>
          <p class="mt-5 mb-3 text-muted">© 2020</p>
      </form>
    </div>
  </div>
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/moment.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/simplebar.min.js"></script>
  <script src='js/daterangepicker.js'></script>
  <script src='js/jquery.stickOnScroll.js'></script>
  <script src="js/tinycolor-min.js"></script>
  <script src="js/config.js"></script>
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
</body>

</html>