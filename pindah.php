<?php
include "koneksi.php";
$jumlah=mysqli_num_rows(mysqli_query($koneksi,"select * from Sheet1"));
$sql=mysqli_query($koneksi,"select * from Sheet1");
while ($data=mysqli_fetch_assoc($sql)){
    $regis=$data['B'];
    $nik=$data['C'];
    $nama=$data['D'];
    $tempat=$data['E'];
    $tgl=$data['F'];
    $pendidikan=$data['G'];
    $jabatan=$data['H'];
    $mulai="2021-01-01";
    $selesai="2021-12-31";
    $cek=mysqli_num_rows(mysqli_query($koneksi,"select * from tbpegawai where nik='$nik'"));

    if ($cek === 0){
        $simpan=mysqli_query($koneksi,"INSERT INTO tbpegawai VALUES ('','$regis','$nik','$nama','$tempat','$tgl',
        '$pendidikan','$jabatan','$mulai','$selesai','$nik','$nik','user.png')");
    }
}
?>