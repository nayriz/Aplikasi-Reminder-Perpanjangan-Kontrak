<?php

include('koneksi.php');
session_start();
$penilai=$_SESSION['penilai'];
$sqlpenilai=mysqli_fetch_assoc(mysqli_query($koneksi,"select * from tbpenilai where username='$penilai'"));
$kotapenilai=$sqlpenilai['kota'];
$tahun='Pilih Tahun';
$sql = mysqli_query($koneksi,"select * from tbpenilaian");
if (isset($_POST['tampil'])){
    $tahun=$_POST['tahun'];
    $sql = mysqli_query($koneksi,"select * from tbpenilaian where tahun='".$_POST['tahun']."'");
}
//error_reporting(0);
$no=1;
?>
<?php
if (isset($_POST['proses'])){
    $tahun=$_POST['tahun'];
    $sql = mysqli_query($koneksi,"select * from tbpenilaian where tahun='".$_POST['tahun']."' order by keterangan");
    ?>
    <div class="row">
        <div class="col-xl-12">
            <div class="card card-shadow mb-4">
                <div class="card-header border-0">
                    <div class="custom-title-wrap bar-primary">
                        <div class="custom-title">View Hasil Pengelompokan</div>
                    </div>
                </div>
                <form action="" method="post">
                    <div class="form-group row" style="margin-left: 10px">
                        <div class="col-sm-3">
                            <h5 for="">Tahun : <?=$tahun?></h5>
                        </div>
                    </div>
                </form>
                <div class="card-body- pt-3 pb-4">
                    <div class="table-responsive">
                        <table id="data_table" class="table table-bordered table-striped" cellspacing="0">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Situs</th>
                                <th>Jenis Objek</th>
                                <th>Provinsi</th>
                                <th>Kab/Kota</th>
                                <th>Kelompok</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            while ($data=mysqli_fetch_assoc($sql)){
                                $sqlsitus=mysqli_fetch_assoc(mysqli_query($koneksi,"select * from tbbangunan where namasitus='".$data['idbangunan']."'"));
                                if ($data['keterangan']=='I'){
                                    $ket='Sangat Buruk';
                                }elseif ($data['keterangan']=='II'){
                                    $ket='Buruk';
                                }elseif ($data['keterangan']=='III'){
                                    $ket='Baik';
                                }elseif ($data['keterangan']=='IV'){
                                    $ket='Sangat Baik';
                                }
                                ?>
                                <tr>
                                    <td><?=$no?></td>
                                    <td><?=$data['idbangunan']?></td>
                                    <td><?=$data['jenisobjek']?></td>
                                    <td><?=$sqlsitus['provinsi']?></td>
                                    <td><?=$sqlsitus['kota']?></td>
                                    <td><?=$data['keterangan']?></td>
                                </tr>
                                <?php
                                $no++;
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}else{


?>

    <div class="row">
            <div class="col-xl-12">
                <div class="card card-shadow mb-4">
                    <div class="card-header border-0">
                        <div class="custom-title-wrap bar-primary">
                            <div class="custom-title">Laporan Penilaian</div>
                        </div>
                    </div>
                    <form action="" method="post">
                    <div class="form-group row" style="margin-left: 10px">
                        <div class="col-sm-2">
                            <select class="form-control" name="tahun" id="jaman">
                                <option value="<?=$tahun?>"><?=$tahun?></option>
                                <?php
                                $a=2019;
                                while ($a <=2030){
                                    ?>
                                    <option
                                        value="<?=$a?>"><?=$a ?></option>
                                    <?php
                                    $a++;
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <center>
                            <button type="submit" name="tampil" class="btn btn-primary rounded-0">Tampilkan</button>
                            </center>
                        </div>
                        <div class="col-sm-4">
                            <button type="submit" name="proses" class="btn btn-success rounded-0">Proses Pengelompokan</button>
                        </div>
                    </div>
                    </form>
                    <div class="card-body- pt-3 pb-4">
                        <div class="table-responsive">
                            <table id="data_table" class="table table-bordered table-striped" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Bangunan</th>
                                    <th>Pondasi</th>
                                    <th>Atap</th>
                                    <th>Plafon</th>
                                    <th>Dinding</th>
                                    <th>Jendela</th>
                                    <th>Lantai</th>
                                    <th>Menara</th>
                                    <th>Jendala Penjara</th>
                                    <th>Pintu Penjara</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                while ($data=mysqli_fetch_assoc($sql)){
                                    $sqlsitus=mysqli_fetch_assoc(mysqli_query($koneksi,"select * from tbbangunan where idbangunan='".$data['idbangunan']."'"));
                                    ?>
                                    <tr>
                                        <td><?=$no?></td>
                                        <td><?=$data['idbangunan']?></td>
                                        <td><?=$data['pondasi']?></td>
                                        <td><?=$data['atap']?></td>
                                        <td><?=$data['plafon']?></td>
                                        <td><?=$data['dinding']?></td>
                                        <td><?=$data['jendela']?></td>
                                        <td><?=$data['lantai']?></td>
                                        <td><?=$data['menara']?></td>
                                        <td><?=$data['jendelapenjara']?></td>
                                        <td><?=$data['pintupenjara']?></td>
                                    </tr>
                                    <?php
                                    $no++;
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php }?>

