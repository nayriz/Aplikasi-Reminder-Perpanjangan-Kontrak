<?php
session_start();
include('../koneksi.php');
$Id=isset($_POST['id'])?htmlspecialchars($_POST['id']):'';
$berkas=isset($_POST['berkas'])?htmlspecialchars($_POST['berkas']):'';
$st=isset($_GET['st'])?htmlspecialchars($_GET['st']):'';
$hasil=isset($_POST['hasil'])?htmlspecialchars($_POST['hasil']):'';
$perilaku=isset($_POST['perilaku'])?htmlspecialchars($_POST['perilaku']):'';
$kehadiran=isset($_POST['kehadiran'])?htmlspecialchars($_POST['kehadiran']):'';
$kerjasama=isset($_POST['kerjasama'])?htmlspecialchars($_POST['kerjasama']):'';
$komitmen=isset($_POST['komitmen'])?htmlspecialchars($_POST['komitmen']):'';
$idpegawai=isset($_POST['idpegawai'])?htmlspecialchars($_POST['idpegawai']):'';
$bulan=isset($_POST['bulan'])?htmlspecialchars($_POST['bulan']):'';
$aksi=$_GET['act'];
$tempat=$_GET['mod'];
$user=$_SESSION['penilai'];
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "select * from tbpenilai where usernamepenilai = '$user'"));
$datapegawai = mysqli_fetch_assoc(mysqli_query($koneksi, "select * from tbpegawai where idpegawai = '$idpegawai'"));
$penilai=$data['idpenilai'];
$tgl2 = date('Y-m-d', strtotime('+365 days', strtotime($datapegawai['ts'])));
$tgl3 = date('Y-m-d', strtotime('+1 days', strtotime($datapegawai['ts'])));
$tgl=date("Y-m-d");
//var_dump($Id);

if ($aksi == 'simpan' && $st == ''){
    $berkas=upload();
            if (!$berkas) {
        exit();
    }
    $sql=mysqli_query($koneksi, "INSERT INTO tbpenilaian VALUES('','$Id','','$berkas','','','','','','','$tgl','$bulan')");
}
if ($aksi == 'simpan' && $st == '1'){
    $nhasil=$hasil*30/100;
    $nperilaku=$perilaku*30/100;
    $nkehadiran=$kehadiran*20/100;
    $nkerjasama=$kerjasama*10/100;
    $nkomitmen=$komitmen*10/100;
    $final=$nhasil+$nperilaku+$nkehadiran+$nkerjasama+$nkomitmen;
//    if ($final > 75) {
//        $status="Perpanjang";
//        $sql=mysqli_query($koneksi, "UPDATE tbpegawai SET tmt='".$datapegawai['ts']."', ts='$tgl2' WHERE idpegawai='$idpegawai'");
//    }else{
//        $status="Putus";
//    }
    $sql=mysqli_query($koneksi, "UPDATE tbpenilaian SET idpenilai='$penilai', hasil='$hasil',perilaku='$perilaku',
                       kehadiran='$kehadiran', kerjasama='$kerjasama', komitmen='$komitmen' WHERE idpenilaian='$Id'");
    $datanilai=mysqli_fetch_assoc(mysqli_query($koneksi,"select * from tbpenilaian where idpenilaian='$Id'"));
    $cekbulan=substr($datanilai['bln'],'0','2');
    $cektahun=substr($datanilai['bln'],'3','4');
    $pegawai=$datanilai['idpegawai'];
    if ($cekbulan==12){
        $sqlnilai=mysqli_query($koneksi,"select * from tbpenilaian where idpegawai='$pegawai' and bln like '%$cektahun%'");
        $nhasil=0;
        $nperilaku=0;
        $nkehadiran=0;
        $nkerjasama=0;
        $nkomitmen=0;
        while ($datahasil=mysqli_fetch_assoc($sqlnilai)){
            $nhasil=$datahasil['hasil']+$nhasil;
            $nperilaku=$datahasil['perilaku']+$nperilaku;
            $nkehadiran=$datahasil['kehadiran']+$nkehadiran;
            $nkerjasama=$datahasil['kerjasama']+$nkerjasama;
            $nkomitmen=$datahasil['komitmen']+$nkomitmen;
        }
        $nhasil=$nhasil/12*0.3;
        $nperilaku=$nperilaku/12*0.3;
        $nkehadiran=$nkehadiran/12*0.2;
        $nkerjasama=$nkerjasama/12*0.2;
        $nkomitmen=$nkomitmen/12*0.1;
        $final=$nhasil+$nperilaku+$nkehadiran+$nkerjasama+$nkomitmen;
        $sql=mysqli_query($koneksi, "UPDATE tbpenilaian SET nilai='$final' WHERE idpenilaian='$Id'");
        if ($final > 75) {
        $status="Perpanjang";
        $sql=mysqli_query($koneksi, "UPDATE tbpegawai SET tmt='$tgl3', ts='$tgl2' WHERE idpegawai='$idpegawai'");
    }else{
        $status="Putus";
    }
    }
}

if ($aksi == 'hapus'){
    $sql=mysqli_query($koneksi, "DELETE FROM tbpenilai WHERE idpenilai='$Id'");

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

function upload(){
    global $koneksi;
    $namafile=$_FILES['berkas']['name'];
    $ukaranfile=$_FILES['berkas']['size'];
    $error=$_FILES['berkas']['error'];
    $tmpname=$_FILES['berkas']['tmp_name'];

        // if($error===4){
        //  echo "<script>
        //  alert('Pilih Gambar');
        //  window.history.back();
        //  </script>
        //  ";
        //  return false;
        // }

    $ekstensiboleh=['pdf'];
    $ekstensigambar=explode('.', $namafile);
    $ekstensigambar=strtolower(end($ekstensigambar));

        if(!in_array($ekstensigambar, $ekstensiboleh)){
         echo "<script>
         alert('Bukan File PDF');
         window.history.back();
         </script>
         ";
         return false;
        }
        if( $ukaranfile > 5000000 ){
         echo "<script>
         alert('File Terlalu Besar');
         window.history.back();
         </script>
         ";
         return false;
        }

        
    $namafilebaru=uniqid();
    $namafilebaru.='.';
    $namafilebaru.=$ekstensigambar;
    move_uploaded_file($tmpname, 'file/'. $namafilebaru);
    return $namafilebaru;
}

?>