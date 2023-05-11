<?php
include('../koneksi.php');
//$sqlulang=mysqli_query($koneksi,"thn2019");
$sql=mysqli_query($koneksi,"SELECT * FROM `Sheet1`");
$no;
while ($data=mysqli_fetch_assoc($sql)){
    unset($nilai);
    unset($nama);
    $sqlulang=mysqli_query($koneksi,"select * from thn2019 where JenisObjek='".$data['JenisObjek']."'");
    while ($dataulang=mysqli_fetch_assoc($sqlulang)){
        $nilai[]=abs($dataulang['Pondasi']-$data['Pondasi'])+abs($dataulang['Atap']-$data['Atap'])+
            abs($dataulang['Platfon']-$data['Platfon'])+abs($dataulang['Dinding']-$data['Dinding'])+
            abs($dataulang['Jendela']-$data['Jendela'])+abs($dataulang['Lantai']-$data['Lantai'])+
            abs($dataulang['MenaraMesjid']-$data['MenaraMesjid'])+abs($dataulang['JendelaBesiPenjara']-$data['JendelaBesiPenjara'])+
            abs($dataulang['PintuBesiPenjara']-$data['PintuBesiPenjara']);
        $nama[]=$dataulang['NamaSitus'];
    }
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
    $bangunan=mysqli_fetch_assoc(mysqli_query($koneksi,"select * from thn2019 where NamaSitus='".$nama[0]."'"));


    mysqli_query($koneksi, "INSERT INTO `tbpenilaian` (`idpenilaian`, `idbangunan`,`jenisobjek`,`tahun`, `pondasi`, `atap`,
    `plafon`, `dinding`, `jendela`, `lantai`, `menara`, `jendelapenjara`, `pintupenjara`,`total`,`keterangan`,`idpenilai`) VALUES ('', '".$data['NamaSitus']."','".$data['JenisObjek']."', 2020,
     '".$data['Pondasi']."', '".$data['Atap']."','".$data['Plafon']."', '".$data['Dinding']."', '".$data['Jendela']."', '".$data['Lantai']."', '".$data['MenaraMesjid']."',
      '".$data['JendelaBesiPenjara']."', '".$data['PintuBesiPenjara']."','".$data['TotalNilai']."','".$bangunan['Keterangan']."','1')");
    $no++;
}
//echo mysqli_num_rows($sql);
//$x=0-1;
//$xx=abs($x);
echo $nama[0];