<?php
session_start();
include "koneksi.php";
error_reporting(0);


if (isset($_REQUEST['login'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $logon = $_POST['operator'];

    if ($logon == 1) {
        $masuk = mysqli_num_rows(mysqli_query($koneksi, "select * from tbadmin where username = '$user' and password = '$pass'"));
        if ($masuk > 0) {
            $log = mysqli_fetch_assoc(mysqli_query($koneksi, "select * from tbadmin where username = '$user' and password = '$pass'"));
            $_SESSION['admin'] = $user;
            echo "<script>
		    alert('Login Berhasil');
		    document.location.href='index.php';
		    </script>";
        } else {
            echo '<script>alert("Mohon Periksa Username, Password dan Logon anda kembali")</script>
            <script>window.history.back()</script>';
        }
    } elseif ($logon == 2) {
        $datauser = mysqli_num_rows(mysqli_query($koneksi, "select * from tbpenilai where usernamepenilai = '$user' and passwordpenilai = '$pass'"));
        if ($datauser > 0) {
            $data = mysqli_fetch_assoc(mysqli_query($koneksi, "select * from tbpenilai where usernamepenilai = '$user' and passwordpenilai = '$pass'"));
            $_SESSION['penilai'] = $user;
            echo "<script>
		    alert('Login Berhasil');
		    document.location.href='index.php';
		    </script>";
        } else {
            echo '<script>alert("Mohon Periksa Username, Password dan Logon anda kembali")</script>
            <script>window.history.back()</script>';
        }
    } elseif ($logon == 3) {
        $tgl=date("Y-m-d");
        $datauser = mysqli_num_rows(mysqli_query($koneksi, "select * from tbpegawai where username = '$user' and password = '$pass'"));
        if ($datauser > 0) {
            $data = mysqli_fetch_assoc(mysqli_query($koneksi, "select * from tbpegawai where username = '$user' and password = '$pass'"));
            $tgl2 = date('Y-m-d', strtotime('+5 days', strtotime($data['ts'])));
            if ($tgl<=$tgl2){
                $_SESSION['pegawai'] = $user;
                echo "<script>
            alert('Login Berhasil');
            document.location.href='index.php';
            </script>";
            }
            else{
                echo '<script>alert("Maaf Akun anda Telah Berakhir")</script>
            <script>window.history.back()</script>';
            }

        } else {
            echo '<script>alert("Mohon Periksa Username, Password dan Login anda kembali")</script>
            <script>window.history.back()</script>';
        }
    }

}
?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from thevectorlab.net/dashlab-v1.3/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Feb 2019 05:41:36 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">

    <!--favicon icon-->
    <link rel="icon" type="image/png" href="assets/img/cropped-logo.png">

    <title>Login</title>

    <!--web fonts-->
    <link href="http://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

    <!--bootstrap styles-->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!--icon font-->
    <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/vendor/dashlab-icon/dashlab-icon.css" rel="stylesheet">
    <link href="assets/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    <link href="assets/vendor/themify-icons/css/themify-icons.css" rel="stylesheet">
    <link href="assets/vendor/weather-icons/css/weather-icons.min.css" rel="stylesheet">

    <!--custom scrollbar-->
    <link href="assets/vendor/m-custom-scrollbar/jquery.mCustomScrollbar.css" rel="stylesheet">

    <!--jquery dropdown-->
    <link href="assets/vendor/jquery-dropdown-master/jquery.dropdown.css" rel="stylesheet">

    <!--jquery ui-->
    <link href="assets/vendor/jquery-ui/jquery-ui.min.css" rel="stylesheet">

    <!--iCheck-->
    <link href="assets/vendor/icheck/skins/all.css" rel="stylesheet">

    <!--custom styles-->
    <link href="assets/css/main.css" rel="stylesheet">
</head>

<body class="login-bg">

    <div class="container">
        <div class="row">
            <div class="col-xl-12 d-lg-flex align-items-center">
                <!--login form-->
                <div class="login-form">
                    <h4 class="text-uppercase text-success text-center mb-3">Login</h4>
                    <form method="POST">
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" class="form-control" placeholder="Enter Username" required name="username">
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Password</label>
                            <input type="password" class="form-control" placeholder="Enter Password" required name="password">
                        </div>
                        <div class="form-group form-animate-text">
                            <div class="form-group mb-2"">
                            <label for="">Jenis Login</label>
                                <select class="form-control" name="operator" required>
                                    <option value="" disabled selected>---Jenis Login---</option>
                                    <option value="1">Admin</option>
                                    <option value="2">Penilai</option>
                                    <option value="3">Pegawai Kontrak</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <center>
                            <button type="submit" class="btn btn-success" name="login">LOGIN</button>
                            </center>
                        </div>
                    </form>
                </div>
                <!--/login form-->

                <!--login promo-->
                <div class="login-promo  text-success position-relative" style="background-color: #5ffae0">
                    <div class="login-promo-content text-center">
                        <a href="#" class="mb-4 d-block">
                            <img class="pr-3"
                                 src="assets/img/cropped-logo.png"
                                 srcset="assets/img/cropped-logo.png 2x"
                                 alt=""
                                 style="width: 100px"
                            >
                        </a>
                        <h3 class="text-green">BIRO ADMINISTRASI SEKRETARIAT DAERAH</h3>
                        <h3>PROVINSI SULAWESI SELATAN</h3>
                        <p>Silahkan Login terlebih dahulu.</p>
                    </div>
                </div>
                <!--/login promo-->

            </div>
        </div>
    </div>

    <!--basic scripts-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/jquery-ui/jquery-ui.min.js"></script>
    <script src="assets/vendor/popper.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/vendor/jquery-dropdown-master/jquery.dropdown.js"></script>
    <script src="assets/vendor/m-custom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="assets/vendor/icheck/skins/icheck.min.js"></script>

    <!--[if lt IE 9]>
    <script src="assets/vendor/modernizr.js"></script>
    <![endif]-->

    <!--basic scripts initialization-->
    <script src="assets/js/scripts.js"></script>
</body>

<!-- Mirrored from thevectorlab.net/dashlab-v1.3/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Feb 2019 05:41:36 GMT -->
</html>

<?php

 ?>
