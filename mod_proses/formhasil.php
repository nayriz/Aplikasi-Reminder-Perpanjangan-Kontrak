<?php
session_start();
include('koneksi.php');
if (isset($_POST['tampil'])){
    $thn=$_POST['thn'];
    $sql = mysqli_query($koneksi,"SELECT * from tbpenilaian inner join tbpegawai on tbpegawai.idpegawai=tbpenilaian.idpegawai 
where tbpenilaian.bln like '%$thn%' group by tbpenilaian.idpegawai");
}else{
    $thn=date("Y");
    $sql = mysqli_query($koneksi,"SELECT * from tbpenilaian inner join tbpegawai on tbpegawai.idpegawai=tbpenilaian.idpegawai 
where tbpenilaian.bln like '%$thn%' group by tbpenilaian.idpegawai");
}

//error_reporting(0);
$no=1;
?>

<?php
switch ($_GET['pg']) {
    default:
        ?>

        <div class="row">
            <div class="col-xl-12">
                <div class="card card-shadow mb-4">
                    <div class="card-header border-0">
                        <div class="custom-title-wrap bar-primary">
                            <?php
                                    if($_SESSION['admin']){
                                    ?>
                                    <div class="custom-title">Data Perpanjangan Kontrak Pegawai</div>
                                    <?php }else{?>
                            <div class="custom-title">View Data Hasil Penilaian</div>
                            <?php } ?>

                        </div>
                        <?php
                        ?>

                    </div>
                    <form action="" method="post">
                    <div class="form-group row" style="margin-left: 20px">
                            <label class="col-sm-2 col-form-label">Pilih Tahun</label>
                            <div class="col-sm-2">
                                <select name="thn" id="" class="form-control">
                                    <option value="<?=$thn?>"><?=$thn?></option>
                                    <?php
                                    $sqlthn = mysqli_query($koneksi,"SELECT * from tbpenilaian group by bln desc");
//
                                    while ($datathn=mysqli_fetch_assoc($sqlthn)){
                                        $sthn=substr($datathn['bln'],3,4);
                                        $tthn[]=$sthn;
                                    }
                                    rsort($tthn);
//                                    $tthn=array_unique($tthn);
                                    $thn1=2020;
                                    $thn2=date("Y");
                                    $thnakhir=$thn2-$thn1;
                                    $thn1=$thn1+$thnakhir;
                                    for ($i=0;$i<=$thnakhir;$i++){
                                    ?>
                                    <option value="<?=$thn1?>"><?=$thn1?></option>
                                    <?php
                                        $thn1--;
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" name="tampil" class="btn btn-primary">Tampil</button>
                            </div>
                    </div>
                    </form>
                    <div class="card-body- pt-3 pb-4">
                        <div style="width: 98%">
                        <div class="table-responsive">
                            <table id="data_table" class="table table-bordered table-striped">
                                <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th><center>Januari</center></th>
                                    <th><center>Februari</center></th>
                                    <th><center>Maret</center></th>
                                    <th><center>April</center></th>
                                    <th><center>Mei</center></th>
                                    <th><center>Juni</center></th>
                                    <th><center>Juli</center></th>
                                    <th><center>Agustus</center></th>
                                    <th><center>September</center></th>
                                    <th><center>Oktober</center></th>
                                    <th><center>November</center></th>
                                    <th><center>Desember</center></th>
                                    <th>Total</th>
                                    <th>Keterangan</th>
                                    <?php
                                    if($_SESSION['admin']){
                                    ?>
                                    <th>Action</th>
                                    <?php }?>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                while ($data=mysqli_fetch_assoc($sql)){

                                ?>
                                    <tr>
                                        <td><?=$no?></td>
                                        <td><?=$data['nik']?></td>
                                        <td><?=$data['nama']?></td>
                                <?php
                                for ($i=1;$i<=12;$i++){
                                    if ($i<10){
                                        $cek='0'.$i.'-'.$thn;
                                    }else{
                                        $cek=$i.'-'.$thn;
                                    }

                                    $sqlnilai = mysqli_query($koneksi,"SELECT * from tbpenilaian 
                                    inner join tbpegawai on tbpegawai.idpegawai=tbpenilaian.idpegawai where 
                                    tbpenilaian.idpegawai='".$data['idpegawai']."' and tbpenilaian.bln='$cek'");
                                    $datanilai=mysqli_fetch_assoc($sqlnilai);

                                ?>
                                        <td><a href="?mod=hasil&pg=hapus&kode=<?php echo $datanilai['idpenilaian'];?>" class="btn btn-primary">View</a></td>
                                <?php }
                                $datan=mysqli_fetch_assoc(mysqli_query($koneksi,"select * from tbpenilaian 
                                where idpegawai='".$data['idpegawai']."' order by bln desc"));
                                if ($datan['nilai'] > 75) {
                                        $status="Perpanjang";

                                    }elseif ($datan['nilai']!=0 and $datan['nilai']<=75){
                                        $status="Putus";
                                    }
                                ?>
                                        <td><?=$datan['nilai']?></td>
                                        <td><?=$status?></td>
                                        <?php
                                        if($_SESSION['admin']){
                                            if($status=='Perpanjang') {
                                                ?>
                                        <td><a href="mod_campur/cetak.php?id=<?=$data['idpenilaian']?>&pegawai=<?=$data['idpegawai']?>&penilai=<?=$data['idpenilai']?>" class="btn btn-secondary" target="_blank">Cetak</a></td>
                                            <?php }elseif ($status=="Putus"){
                                                ?>
                                                <td><a href="mod_campur/cetakputus.php?id=<?=$data['idpenilaian']?>&pegawai=<?=$data['idpegawai']?>&penilai=<?=$data['idpenilai']?>&thn=<?=$thn?>" class="btn btn-secondary" target="_blank">Cetak</a></td>
                                        <?php
                                            }else{
                                                echo "<td></td>";
                                            }
                                        }
                                        ?>
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
        </div>
    <?php
    break;
    case 'tambah':
        ?>
<?php
    break;
    case 'edit':
    $sql=mysqli_query($koneksi,"SELECT * from tbpenilaian inner join tbpegawai on tbpegawai.idpegawai=tbpenilaian.idpegawai where idpenilaian='$_GET[kode]'");
    $data = mysqli_fetch_assoc($sql);
        ?>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="round-form" role="tabpanel" aria-labelledby="round-form-tab">
                <div class="row">
                    <div class="col-xl-12 col-md-12">
                        <div class="card card-shadow mb-4">
                            <div class="card-header border-0">
                                <div class="custom-title-wrap bar-primary">
                                    <div class="custom-title">Input Penilaian</div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form method="post" action="mod_proses/prosespenilaian.php?mod=penilaian&act=simpan&st=1">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">NIK</label>
                                        <label class="col-sm-9 col-form-label">: <?=$data['nik']?></label>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Nama</label>
                                        <label class="col-sm-9 col-form-label">: <?=$data['nama']?></label>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Berkas</label>
                                        <a class="col-sm-9 col-form-label" href="mod_proses/file/<?=$data['berkas']?>" target="_blank">: <?=$data['berkas']?></a>
                                    </div>
                                    <div class="form-group row">
                                        <label for="hasil" class="col-sm-3 col-form-label">1. Penilaian Hasil Kerja</label>
                                        <div class="col-sm-9">
                                            <input type="number" min="0" max="100" class="form-control" name="hasil" id="hasil" required>
                                            <input type="hidden" class="form-control" name="id" value="<?=$data['idpenilaian']?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="perilaku" class="col-sm-3 col-form-label">2. Perilaku Kerja</label>
                                        <div class="col-sm-9">
                                            <input type="number" min="0" max="100" class="form-control" name="perilaku" id="perilaku"required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="kehadiran" class="col-sm-3 col-form-label">3. Disiplin / Kehadiran</label>
                                        <div class="col-sm-9">
                                            <input type="number" min="0" max="100" class="form-control" name="kehadiran" id="kehadiran"required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="kerjasama" class="col-sm-3 col-form-label">4. Kerjasama</label>
                                        <div class="col-sm-9">
                                            <input type="number" min="0" max="100" class="form-control" name="kerjasama" id="kerjasama"required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="komitmen" class="col-sm-3 col-form-label">5. Komitmen</label>
                                        <div class="col-sm-9">
                                            <input type="number" min="0" max="100" class="form-control" name="komitmen" id="komitmen"required>
                                        </div>
                                    </div>
                                    <div class="text-left">
                                        <button type="submit" class="btn btn-purple">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    break;
    case 'hapus':
        $bln='0'.$_GET['bln'].'-2020';
        $sql=mysqli_query($koneksi,"select * from tbpenilaian inner join tbpegawai 
    on tbpegawai.idpegawai=tbpenilaian.idpegawai where idpenilaian='$_GET[kode]'");
        $data = mysqli_fetch_assoc($sql);
        ?>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="round-form" role="tabpanel" aria-labelledby="round-form-tab">
                <div class="row">
                    <div class="col-xl-12 col-md-12">
                        <div class="card card-shadow mb-4">
                            <div class="card-header border-0">
                                <div class="custom-title-wrap bar-primary">
                                    <div class="custom-title">Hasil Penilaian</div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form method="post" action="mod_pegawai/prosespegawai.php?mod=pegawai&act=">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">NIK</label>
                                        <label for="inputEmail3" class="col-sm-9 col-form-label">: <?=$data['nik']?></label>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Nama</label>
                                        <label for="inputEmail3" class="col-sm-9 col-form-label">: <?=$data['nama']?></label>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Berkas Laporan</label>
                                        <a href="../mod_proses/file/<?=$data['berkas']?>" target="_blank"
                                           class="col-sm-9 col-form-label">: <?=$data['berkas']?></a>
                                        <!--                                        <label for="inputEmail3" class="col-sm-9 col-form-label">: --><?//=$data['berkas']?><!--</label>-->
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Bulan</label>
                                        <label for="inputEmail3" class="col-sm-9 col-form-label">: <?=$data['bln']?></label>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Penilaian Hasil Kerja</label>
                                        <label for="inputEmail3" class="col-sm-9 col-form-label">: <?=$data['hasil']?></label>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Perilaku Kerja</label>
                                        <label for="inputEmail3" class="col-sm-9 col-form-label">: <?=$data['perilaku']?></label>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Disiplin / Kehadiran</label>
                                        <label for="inputEmail3" class="col-sm-9 col-form-label">: <?=$data['kehadiran']?></label>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">KerjaSama</label>
                                        <label for="inputEmail3" class="col-sm-9 col-form-label">: <?=$data['kerjasama']?></label>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Komitmen</label>
                                        <label for="inputEmail3" class="col-sm-9 col-form-label">: <?=$data['komitmen']?></label>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Total</label>
                                        <label for="inputEmail3" class="col-sm-9 col-form-label">: <?=$data['nilai']?></label>
                                    </div>
                                    <div class="text-left">
                                        <a href="?mod=hasil" class="btn btn-primary">Kembali</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    break;

}
?>
