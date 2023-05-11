<?php

include('../koneksi.php');
$Id=isset($_POST['id'])?htmlspecialchars($_POST['id']):'';
$nama=isset($_POST['nama'])?htmlspecialchars($_POST['nama']):'';
$username=isset($_POST['username'])?htmlspecialchars($_POST['username']):'';
$password=isset($_POST['password'])?htmlspecialchars($_POST['password']):'';
$provinsi=isset($_POST['provinsi'])?htmlspecialchars($_POST['provinsi']):'';
$kota=isset($_POST['kota'])?htmlspecialchars($_POST['kota']):'';
$kecamatan=isset($_POST['kecamatan'])?htmlspecialchars($_POST['kecamatan']):'';
$kelurahan=isset($_POST['kelurahan'])?htmlspecialchars($_POST['kelurahan']):'';
$jaman=isset($_POST['jaman'])?htmlspecialchars($_POST['jaman']):'';
$arsitektur=isset($_POST['arsitektur'])?htmlspecialchars($_POST['arsitektur']):'';
$objek=isset($_POST['objek'])?htmlspecialchars($_POST['objek']):'';
$aksi=$_GET['act'];
$tempat=$_GET['mod'];

if ($tempat=='bangunan' && $aksi == 'simpan'){

    $sql=mysqli_query($koneksi, "INSERT INTO `tbbangunan` (`idbangunan`, `namasitus`, `kelurahan`, `kecamatan`,
    `kota`, `provinsi`, `jaman`, `arsitektur`, `jenisobjek`) VALUES (NULL, '$nama', '$kelurahan', '$kecamatan',
     '$kota', '$provinsi', '$jaman', '$arsitektur', '$objek')");
}
if ($tempat=='bangunan' && $aksi == 'edit'){

    $sql=mysqli_query($koneksi, "UPDATE `tbbangunan` SET `namasitus` = '$nama', `kelurahan` = '$kelurahan',
    `kecamatan` = '$kecamatan', `kota` = '$kota', `provinsi` = '$provinsi', `jaman` = '$jaman', `arsitektur` = '$arsitektur',
    `jenisobjek` = '$objek' WHERE `tbbangunan`.`idbangunan` = '$Id'");
}

if ($tempat=='bangunan' && $aksi == 'hapus'){
    $sql=mysqli_query($koneksi, "DELETE FROM tbbangunan WHERE idbangunan='$Id'");

}

if($sql){
    echo"
			<script>
			alert('Data Berhasil Di$aksi');
			document.location.href='../index.php?mod=$tempat';
			</script>";
}
else{
    echo"
			<script>
			alert('Data Gagal Di$aksi')
			document.location.href='../index.php?mod=$tempat';
			</script>";
}


?>