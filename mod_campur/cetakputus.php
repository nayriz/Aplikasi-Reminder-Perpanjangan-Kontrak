<?php
$koneksi='';
include "../koneksi.php";
$idpenilaian=$_GET['id'];
$idpenilai=$_GET['penilai'];
$idpegawai=$_GET['pegawai'];
$thn=$_GET['thn'];
$pegawai=mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * From tbpegawai where idpegawai='$idpegawai'"));
$penilai=mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * From tbpenilai where idpenilai='$idpenilai'"));
$sql=mysqli_query($koneksi,"SELECT * From tbpenilaian where idpegawai='$idpegawai' and bln like '%$thn%' order by bln");
$date = new DateTime($pegawai['tgllahir']);
$tgls=date("d-m-Y");
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

<div style="width: 21cm; height: 29cm;margin-top: 1cm">
    <div style="width: 21cm" style="margin-top: 4cm">
        <center>
            <img src="../assets/img/cropped-logo.png" style="width: 50px;"><br>
            <label style="font-size: 14px;font-weight: bold;">PEMERINTAH PROVINSI SULAWESI SELATAN</label><br>
            <label style="font-size: 16px;font-weight: bold;">SEKRETARIAT DAERAH</label><br>
            <label style="font-size: 12px;">Jalan Jenderal Urip Sumohardjo No.269 Telp.(0411) 453050</label><br>
            <label>Makassar 90231</label><br>
        </center>
    </div>
    <center>
        <hr style="color: #000000;width: 45%" color=#000>
    </center>
    <div style="width: 21cm" style="margin-top: 2cm">
        <center>
            <label style="font-size: 12px;font-weight: bold;">SURAT PERJANJIAN KERJA</label><br>
            <hr style="color: #000000;width: 20%;margin-top: -0.01%;" color=#000>
        </center>
        <center>
            <label style="font-size: 12px;font-weight: bold;">Nomor :</label>
        </center>
    </div>
    <table style="width: 21cm; margin-top: 15px;margin-left: 30px;">
        <tr>
            <td style="width: 60%;">Perihal : Surat Pemutusan Hubungan Kerja / Surat Pemberhentian Kerja</td>
            <td style="width: 45%;">
<!--                <label style=";margin-left: 25px"> Makassar, --><?//=$tgls?><!--</label>-->
            </td>
            <td style="width: 5%;"></td>
        </tr>
    </table>
    <div style="margin-left: 33px">
        <label for="">Kepada Yth,</label><br>
        <label for="">sdr. <?=$pegawai['nama']?></label><br>
        <label for="">Ditempat</label>
    </div>
    <div style="margin-left: 33px;text-align: justify">
        <p>Sehubungan dengan hasil evaluasi kinerja saudara selama 12 bulan terakhir, Saudara mendapatkan nilai dibawah
            standar yang berlaku. Maka dari itu, kami memutuskan untuk tidak melanjutkan kontrak kerja
            (Pemutusan Hubungan Kerja) dengan Saudara <?=$pegawai['nama']?>.</p>
    </div>
    <div style="margin-left: 33px;text-align: justify">
        <p>Daftar nilai 12 bulan terakhir :</p>
    </div>
    <div style="margin-left: 33px;text-align: justify">
        <table border="1" cellpadding="5" cellspacing="0">
            <tr>
                <td>Bulan</td>
                <td>Hasil Kerja</td>
                <td>Perilaku Kerja</td>
                <td>Disiplin / Kehadiran</td>
                <td>Kerjasama</td>
                <td>Komitmen</td>
            </tr>
            <?php
            while ($data=mysqli_fetch_assoc($sql)){
            ?>
            <tr>
                <td align="center"><?=$data['bln']?></td>
                <td align="center"><?=$data['hasil']?></td>
                <td align="center"><?=$data['perilaku']?></td>
                <td align="center"><?=$data['kehadiran']?></td>
                <td align="center"><?=$data['kerjasama']?></td>
                <td align="center"><?=$data['komitmen']?></td>
            </tr>
            <?php }?>
        </table>
    </div>
    <div style="margin-left: 33px;text-align: justify">
        <p>Akumulasi Nilai :</p>
    </div>
    <div style="margin-left: 33px;text-align: justify">
        <table border="1" cellpadding="5" cellspacing="0">
            <tr>
                <td align="center">Penilaian</td>
                <td>Nilai</td>
            </tr>
            <?php
            $sql=mysqli_query($koneksi,"SELECT * From tbpenilaian where idpegawai='$idpegawai' 
                and bln like '%$thn%'");
            $nhasil=0;
            $nperilaku=0;
            $nkehadiran=0;
            $nkerjasama=0;
            $nkomitmen=0;
            while ($datahasil=mysqli_fetch_assoc($sql)){
                $nhasil=$datahasil['hasil']+$nhasil;
                $nperilaku=$datahasil['perilaku']+$nperilaku;
                $nkehadiran=$datahasil['kehadiran']+$nkehadiran;
                $nkerjasama=$datahasil['kerjasama']+$nkerjasama;
                $nkomitmen=$datahasil['komitmen']+$nkomitmen;
            }
            $nhasil=number_format($nhasil/12*0.3,0);
            $nperilaku=number_format($nperilaku/12*0.2,0);
            $nkehadiran=number_format($nkehadiran/12*0.2,0);
            $nkerjasama=number_format($nkerjasama/12*0.2,0);
            $nkomitmen=number_format($nkomitmen/12*0.1,0);
            $final=$nhasil+$nperilaku+$nkehadiran+$nkerjasama+$nkomitmen;
                ?>
                <tr>
                    <td>Hasil Kerja</td>
                    <td align="center"><?=$nhasil?></td>
                </tr>
                <tr>
                    <td>Perilaku Kerja</td>
                    <td align="center"><?=$nperilaku?></td>
                </tr>
                <tr>
                    <td>Disiplin / Kehadiran</td>
                    <td align="center"><?=$nkehadiran?></td>
                </tr>
                <tr>
                    <td>KerjaSama</td>
                    <td align="center"><?=$nkerjasama?></td>
                </tr>
                <tr>
                    <td>Komitmen</td>
                    <td align="center"><?=$nkomitmen?></td>
                </tr>
        </table>
    </div>
    <br><br><br>
    <div style="margin-left: 33px;text-align: justify">
        <p>Jadi nilai akhir yang saudara dapatkan adalan <?=$final?>.</p>
    </div>
    <div style="margin-left: 33px;text-align: justify">
        <p>Demikian surat pemutusan hubungan kerja ini kami sampaikan dan agar dapat dimaklumi, terima kasih.</p>
    </div>
    <table style="width: 21cm; margin-top: 15px;margin-left: 30px;">
        <tr>
            <td style="width: 5%;"></td>
            <td style="width: 55%;"></td>
            <td style="width: 45%;">
                <label style=";margin-left: 25px;">Ditetapkan di : Makassar</label>
            </td>
            <td style="width: 5%;"></td>
        </tr>
        <tr>
            <td style="width: 5%;"></td>
            <td style="width: 55%;"></td>
            <td style="width: 45%;">
                <label style=";margin-left: 25px;">Pada Tanggal : <?=$tgls?></label>
            </td>
            <td style="width: 5%;"></td>
        </tr>
        <tr>
            <td style="width: 5%;"></td>
            <td style="width: 55%;"></td>
            <td style="width: 45%;">
                <label style=";margin-left: 25px;">PENILAI</label><br>
                <label></label>
            </td>
            <td style="width: 5%;"></td>
        </tr>
        <tr>
            <td style="width: 5%;"></td>
            <td style="width: 55%;"></td>
            <td style="width: 45%;height: 100px">
                <u><label style="width: 6cm;margin-left: 25px;"></label></u><br>
                <label style="width: 6cm;;margin-left: 25px"><?=$penilai['nama']?></label>
            </td>
            <td style="width: 5%;"></td>
        </tr>
    </table>




    <script>
        window.print();
    </script>
    <!--<CENTER>-->
    <!--<div style="margin-top: 25px">-->
    <!--	<label style="font-size: 12px;font-weight: bold;">SURAT PANGGILAN</label>-->
    <!--</div>-->
    <!--<hr style="width: 3.2cm;" colos="black"/>-->
    <!--<label style="font-size: 12px;font-weight: bold;">Nomor Surat : 123456</label>-->
    <!--</CENTER>-->

</div>

</body>
</html>