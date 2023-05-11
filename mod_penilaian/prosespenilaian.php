<?php

include('../koneksi.php');

session_start();
$penilai=$_SESSION['penilai'];
$sqlpenilai=mysqli_fetch_assoc(mysqli_query($koneksi,"select * from tbpenilai where username='$penilai'"));
$idpenilai=$sqlpenilai['idpenilai'];
$Id=isset($_POST['id'])?htmlspecialchars($_POST['id']):'';
$jenis=isset($_POST['jenis'])?htmlspecialchars($_POST['jenis']):'';
$tahun=isset($_POST['tahun'])?htmlspecialchars($_POST['tahun']):'';
$atap=isset($_POST['atap'])?htmlspecialchars($_POST['atap']):'';
$pondasi=isset($_POST['pondasi'])?htmlspecialchars($_POST['pondasi']):'';
$plafon=isset($_POST['plafon'])?htmlspecialchars($_POST['plafon']):'';
$dinding=isset($_POST['dinding'])?htmlspecialchars($_POST['dinding']):'';
$jendela=isset($_POST['jendela'])?htmlspecialchars($_POST['jendela']):'';
$lantai=isset($_POST['lantai'])?htmlspecialchars($_POST['lantai']):'';
$menara=isset($_POST['menara'])?htmlspecialchars($_POST['menara']):'';
$jendelapenjara=isset($_POST['jendelapenjara'])?htmlspecialchars($_POST['jendelapenjara']):'';
$pintupenjara=isset($_POST['pintupenjara'])?htmlspecialchars($_POST['pintupenjara']):'';
$aksi=$_GET['act'];
$tempat=$_GET['mod'];
$lama=$tahun-1;
$total=$atap+$pondasi+$plafon+$dinding+$jendela+$lantai+$menara+$jendelapenjara+$pintupenjara;



if ($tempat=='penilaian' && $aksi == 'simpan'){
    $nilai=[];
    $sqlulang=mysqli_query($koneksi,"select * from tbpenilaian where jenisobjek='$jenis' and tahun='$lama'");
    while ($dataulang=mysqli_fetch_assoc($sqlulang)){
        $nilai[]=abs($dataulang['pondasi']-$pondasi)+abs($dataulang['atap']-$atap)+
            abs($dataulang['plafon']-$plafon)+abs($dataulang['dinding']-$dinding)+
            abs($dataulang['jendela']-$jendela)+abs($dataulang['lantai']-$lantai)+
            abs($dataulang['menara']-$menara)+abs($dataulang['jendelapenjara']-$jendelapenjara)+
            abs($dataulang['pintupenjara']-$pintupenjara);
        $nama[]=$dataulang['idbangunan'];
    }
//    var_dump($nilai);
    for($a=0;$a< mysqli_num_rows($sqlulang);$a++){
        for($b=$a;$b< mysqli_num_rows($sqlulang);$b++){
            if($nilai[$b] < $nilai[$a]) {
                $tmp = $nilai[$b];
                $nilai[$b] = $nilai[$a];
                $nilai[$a] = $tmp;
                $tmpj = $nama[$b];
                $nama[$b] = $nama[$a];
                $nama[$a] = $tmpj;
            }
        }
    }
    $bangunan=mysqli_fetch_assoc(mysqli_query($koneksi,"select * from tbpenilaian where idbangunan='$nama[0]' and tahun='$lama'"));

    $sql=mysqli_query($koneksi, "INSERT INTO `tbpenilaian` (`idpenilaian`, `idbangunan`,`jenisobjek`,`tahun`, `pondasi`, `atap`,
    `plafon`, `dinding`, `jendela`, `lantai`, `menara`, `jendelapenjara`, `pintupenjara`,`total`,`keterangan`,`idpenilai`) VALUES
    (NULL, '$Id','$jenis', '$tahun', '$pondasi', '$atap', '$plafon', '$dinding', '$jendela', '$lantai', '$menara', '$jendelapenjara',
    '$pintupenjara','$total','".$bangunan['keterangan']."','$idpenilai')");
}

if($sql){
    echo"
			<script>
			alert('$jenis, $Id Masuk Kedalam Pengelompokan ".$bangunan['keterangan']."');
			document.location.href='../index.php?mod=$tempat';
			</script>";
}
else{
    $bangunan1=$bangunan['Keterangan'];
    echo"
			<script>
			alert('Data Gagal Di$nama[0]');
//			document.location.href='../index.php?mod=$tempat';
			</script>";
}


?>