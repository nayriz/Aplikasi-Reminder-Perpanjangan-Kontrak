<?php
error_reporting(0);
session_start();
$_SESSION['admin'];
$_SESSION['penilai'];
if ($_SESSION['admin']=='' && $_SESSION['penilai']=='' && $_SESSION['pegawai']==''){
    echo"
			<script>
			document.location.href='login.php';
			</script>";
    exit();
}
if($_GET['mod'] == 'penilai'){
    include "mod_penilai/formpenilai.php";
}
elseif($_GET['mod'] == 'pegawai'){
    include "mod_pegawai/formpegawai.php";
}
elseif($_GET['mod'] == 'penilaian'){
    include "mod_proses/formpenilaian.php";
}
elseif($_GET['mod'] == 'remender'){
    include "mod_campur/formremender.php";
}
elseif($_GET['mod'] == 'hasil'){
    include "mod_proses/formhasil.php";
}
elseif($_GET['mod'] == 'hasiladmin'){
    include "mod_proses/formhasiladmin.php";
}
elseif($_GET['mod'] == 'hasilpegawai'){
    include "mod_campur/formhasil.php";
}
elseif($_GET['mod'] == 'profil'){
    include "mod_campur/formprofil.php";
}
elseif($_GET['mod'] == 'laporan'){
    include "mod_laporan/formlaporan.php";
}
else{
    
    include "mod_laporan/formdashboard.php";

}
?>
