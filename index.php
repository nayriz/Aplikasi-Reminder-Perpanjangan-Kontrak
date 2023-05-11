<?php
session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from thevectorlab.net/dashlab-v1.3/dashboard-4.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Feb 2019 05:38:35 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">

    <!--favicon icon-->
    <link rel="icon" type="image/png" href="assets/img/cropped-logo.png">

    <title>PROVINSI SULAWESI SELATAN</title>

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
    <link href="assets/vendor/data-tables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!--vector maps -->
    <link href="assets/vendor/vector-map/jquery-jvectormap-1.1.1.css" rel="stylesheet" >

    <!--c3chart-->
    <link href="assets/vendor/c3chart/c3.min.css" rel="stylesheet">

    <!--custom styles-->
    <link href="assets/css/main.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="assets/vendor/html5shiv.js"></script>
    <script src="assets/vendor/respond.min.js"></script>
    <![endif]-->
</head>

<body class="fixed-nav leftnav-floating">

<!--navigation : sidebar & header-->
<nav class="navbar navbar-expand-lg fixed-top navbar-light" id="mainNav">

    <!--brand name-->
    <a class="navbar-brand" href="#" data-jq-dropdown="#jq-dropdown-1">
        <img style="width: 50px" class="pr-3 float-left" src="assets/img/cropped-logo.png" srcset="assets/img/cropped-logo@2x.png 2x"  alt=""/>
        <div class="float-left">
            <h3>SUL-SEL</h3>
        </div>
    </a>
    <!--/brand name-->

    <!--brand mega menu-->
    <!--/brand mega menu-->

    <!--responsive nav toggle-->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <!--/responsive nav toggle-->

    <!--responsive rightside toogle-->
    <a href="javascript:;" class="nav-link right_side_toggle responsive-right-side-toggle">
        <i class="icon-options-vertical"> </i>
    </a>
    <!--/responsive rightside toogle-->

    <div class="collapse navbar-collapse" id="navbarResponsive">

        <!--left side nav-->
        <ul class="navbar-nav left-side-nav" id="accordion">

            <li class="nav-item" data-toggle="tooltip" data-placement="right">
                <a class="nav-link" href="index.php">
                    <i class="vl_dashboard"></i>
                    <span class="nav-link-text">Dashboard</span>
                </a>
            </li>
            <?php
            if ($_SESSION['admin']){
            ?>
            <li class="nav-item" data-toggle="tooltip" data-placement="right">
                <a class="nav-link" href="<?php echo '?mod=pegawai'?>">
                    <i class="fa fa-address-book-o"></i>
                    <span class="nav-link-text">Data Pegawai Kontrak</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right">
                <a class="nav-link" href="<?php echo '?mod=hasil'?>">
                    <table>
                        <tr>
                            <td>
                                <i class="fa fa-handshake-o"></i>
                            </td>
                            <td>
                                <span class="nav-link-text">Data Perpanjangan Kontrak</span>
                            </td>
                        </tr>
                    </table>
                    
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right">
                <a class="nav-link" href="<?php echo '?mod=penilai'?>">
                    <i class="fa fa-address-card-o"></i>
                    <span class="nav-link-text">Akun Penilai</span>
                </a>
            </li>

            <?php
            }
            elseif ($_SESSION['penilai']){
            ?>
            <li class="nav-item" data-toggle="tooltip" data-placement="right">
                <a class="nav-link" href="<?php echo '?mod=penilaian'?>">
                    <table>
                        <tr>
                            <td>
                                <i class="fa fa-handshake-o"></i>
                            </td>
                            <td>
                                <span class="nav-link-text">Data Perpanjangan Kontrak</span>
                            </td>
                        </tr>
                    </table>
                    
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right">
                <a class="nav-link" href="<?php echo '?mod=hasil'?>">
                    <i class="fa fa-check-square-o"></i>
                    <span class="nav-link-text">Data Hasil Penilaian</span>
                </a>
            </li>
            <?php
            }
            elseif ($_SESSION['pegawai']){
            ?>
            <li class="nav-item" data-toggle="tooltip" data-placement="right">
                <a class="nav-link" href="<?php echo '?mod=remender'?>">
                    <i class="fa fa-bell-o"></i>
                    <span class="nav-link-text">Remender</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right">
                <a class="nav-link" href="<?php echo '?mod=hasilpegawai'?>">
                    <i class="fa fa-file"></i>
                    <span class="nav-link-text">Hasil Penilaian</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right">
                <a class="nav-link" href="<?php echo '?mod=profil'?>">
                    <i class="fa fa-user-circle-o"></i>
                    <span class="nav-link-text">Profil</span>
                </a>
            </li>
            <?php }?>
            <li class="nav-item" data-toggle="tooltip" data-placement="right">
                <a class="nav-link" href="logout.php">
                    <i class="fa icon-logout"></i>
                    <span class="nav-link-text">Log Out</span>
                </a>
            </li>
        </ul>
        <!--/left side nav-->

        <!--nav push link-->
        <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
                <a class="nav-link text-center" id="left-nav-toggler">
                    <i class="fa fa-angle-left"></i>
                </a>
            </li>
        </ul>
        <!--/nav push link-->

        <!--header leftside links-->
        <ul class="navbar-nav header-links">

        </ul>
        <!--/header leftside links-->

        <!--header rightside links-->
        <ul class="navbar-nav header-links ml-auto hide-arrow">

        </ul>
        <!--/header rightside links-->

    </div>
</nav>
<!--/navigation : sidebar & header-->

<!--main content wrapper-->
<div class="content-wrapper">

    <div class="container-fluid">

    <?php
    include ('konten.php');
    ?>

    </div>

    <!--footer-->
    <footer class="sticky-footer">
        <div class="container">
            <div class="text-center">
                <small>Copyright &copy; BIRO ADMINISTRASI SETDA PROVINSI SULAWESI SELATAN</small>
            </div>
        </div>
    </footer>
    <!--/footer-->
</div>
<!--/main content wrapper-->

<!--right sidebar-->

<!--/right sidebar-->

<!--basic scripts-->
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/jquery-ui/jquery-ui.min.js"></script>
<script src="assets/vendor/popper.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/vendor/jquery-dropdown-master/jquery.dropdown.js"></script>
<script src="assets/vendor/m-custom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="assets/vendor/icheck/skins/icheck.min.js"></script>

<!--sparkline-->
<script src="assets/vendor/sparkline/jquery.sparkline.js"></script>
<!--sparkline initialization-->
<script src="assets/vendor/js-init/sparkline/init-sparkline.js"></script>

<!--c3chart-->
<script src="assets/vendor/c3chart/d3.min.js"></script>
<script src="assets/vendor/c3chart/c3.min.js"></script>
<!--c3chart initialization-->
<script src="assets/vendor/js-init/c3chart/init-c3chart.js"></script>

<!--chartjs-->
<script src="assets/vendor/chartjs/Chart.bundle.min.js"></script>
<!--chartjs initialization-->
<script src="assets/vendor/js-init/chartjs/init-bubble-chart.js"></script>
<script src="assets/vendor/js-init/chartjs/init-mixed-chart.js"></script>

<!--vectormap-->
<script src="assets/vendor/vector-map/jquery-jvectormap-1.2.2.min.js"></script>
<script src="assets/vendor/vector-map/jquery-jvectormap-world-mill-en.js"></script>
<script src="assets/vendor/vector-map/jquery-jvectormap-us-aea.js"></script>
<!--vectormap initialization-->
<script src="assets/vendor/js-init/vmap/init-vmap-world.js"></script>
<script src="assets/vendor/js-init/vmap/init-vmap-usa.js"></script>
<script src="assets/vendor/data-tables/jquery.dataTables.min.js"></script>
<script src="assets/vendor/data-tables/dataTables.bootstrap4.min.js"></script>
<script src="assets/vendor/js-init/init-datatable.js"></script>
<!--to do list-->
<script src="assets/vendor/icheck/skins/icheck.min.js"></script>
<!--to do list initialization-->
<script src="assets/vendor/js-init/init-todo-list.js"></script>

<!--[if lt IE 9]>
<script src="assets/vendor/modernizr.js"></script>
<![endif]-->

<!--basic scripts initialization-->
<script src="assets/js/scripts.js"></script>

</body>

<!-- Mirrored from thevectorlab.net/dashlab-v1.3/dashboard-4.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Feb 2019 05:38:39 GMT -->
</html>

