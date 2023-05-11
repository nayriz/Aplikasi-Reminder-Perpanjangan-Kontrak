<?php
session_start();

include('koneksi.php');
$id=$_SESSION['pegawai'];
$sql=mysqli_query($koneksi,"select * from tbpegawai where username='$id'");
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
                            <div class="custom-title">Reminder Masa Kontrak</div>
                        </div>
                    </div>
                    <div class="card-body- pt-3 pb-4">
                        <div class="table-responsive">
                            <table id="data_table" class="table table-bordered table-striped" cellspacing="0">
                                <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th>Bulan</th>
                                    <th>Tahun</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                while ($data=mysqli_fetch_assoc($sql)){
                                    $datanilai=mysqli_fetch_assoc(mysqli_query($koneksi,"select * from tbpenilaian where idpegawai='".$data['idpegawai']."' order by bln desc "));
                                    $awal  = date_create($data['tmt']);
                                    $bulan = substr($datanilai['bln'],0,2);
                                    $tahun = substr($datanilai['bln'],3,4);
                                    $akhir = date_create($data['ts']);
                                    $tgl=date("m");
                                    $tgl1=2;
//                                    $tgl=date_create($tgl);
//                                    $diff  = $akhir->diff($tgl)->days;

                                ?>
<!--                                    <tr>-->
<!--                                        <td>--><?//=$datanilai['bln']?><!--</td>-->
<!--                                    </tr>-->

                                <?php
                                    $no++;
                                    if ($bulan=='' and $tgl==2){
                                        $bulan='01';
                                        $tahun=date("Y");
//                                        $tahun=$tahun-1;
                                        ?>
                                        <tr>
                                            <td><?=$no?></td>
                                            <td><?=$data['nik']?></td>
                                            <td><?=$data['nama']?></td>
                                            <td><?=$data['jabatan']?></td>
                                            <td><?=$bulan?></td>
                                            <td><?=$tahun?></td>
                                            <td>
                                                <center>
                                                    <a class="btn btn-warning btn-sm form-pill" href="?mod=remender&pg=tambah&kode=<?php echo $data['idpegawai'];?>&bulan=<?php echo $bulan;?>-<?php echo $tahun;?>"><span class="icon-plus menu-icon"></span> Input Berkas</a>
                                                </center>
                                            </td>
                                        </tr>
                                <?php
                                    }elseif ($bulan==1 and $datanilai['hasil']!=0){
                                        $bulank="02";
                                        ?>
                                        <tr>
                                            <td><?=$no?></td>
                                            <td><?=$data['nik']?></td>
                                            <td><?=$data['nama']?></td>
                                            <td><?=$data['jabatan']?></td>
                                            <td><?=$bulan+1?></td>
                                            <td><?=$tahun?></td>
                                            <td>
                                                <center>
                                                    <a class="btn btn-warning btn-sm form-pill" href="?mod=remender&pg=tambah&kode=<?php echo $data['idpegawai'];?>&bulan=<?php echo $bulank;?>-<?php echo $tahun;?>"><span class="icon-plus menu-icon"></span> Input Berkas</a>
                                                </center>
                                            </td>
                                        </tr>
                                <?php
                                    }elseif ($bulan+2==13){
                                        $bulan++;
                                        $bulank =$bulan . "-" . $tahun;
                                ?>
                                        <tr>
                                            <td><?=$no?></td>
                                            <td><?=$data['nik']?></td>
                                            <td><?=$data['nama']?></td>
                                            <td><?=$data['jabatan']?></td>
                                            <td><?=$bulan+1?></td>
                                            <td><?=$tahun?></td>
                                            <td>
                                                <center>
                                                    <a class="btn btn-warning btn-sm form-pill" href="?mod=remender&pg=tambah&kode=<?php echo $data['idpegawai'];?>&bulan=<?php echo $bulank;?>-<?php echo $tahun;?>"><span class="icon-plus menu-icon"></span> Input Berkas</a>
                                                </center>
                                            </td>
                                        </tr>
                                        <?php
                                    }elseif ($bulan+2==14){
                                        $bulan='01';
                                        $bulank =$bulan . "-" . $tahun;
                                        ?>
                                        <tr>
                                            <td><?=$no?></td>
                                            <td><?=$data['nik']?></td>
                                            <td><?=$data['nama']?></td>
                                            <td><?=$data['jabatan']?></td>
                                            <td><?=$bulan?></td>
                                            <td><?=$tahun?></td>
                                            <td>
                                                <center>
                                                    <a class="btn btn-warning btn-sm form-pill" href="?mod=remender&pg=tambah&kode=<?php echo $data['idpegawai'];?>&bulan=<?php echo $bulank;?>-<?php echo $tahun;?>"><span class="icon-plus menu-icon"></span> Input Berkas</a>
                                                </center>
                                            </td>
                                        </tr>
                                <?php
                                    }elseif ($bulan+2==$tgl){
                                    if ($bulan+1<10) {
                                        $bulan++;
                                        $bulank = "0" . $bulan . "-" . $tahun;
                                    }else{
                                        $bulan++;
                                        $bulank =$bulan . "-" . $tahun;
                                    }
                                    ?>
                                    <tr>
                                        <td><?=$no?></td>
                                        <td><?=$data['nik']?></td>
                                        <td><?=$data['nama']?></td>
                                        <td><?=$data['jabatan']?></td>
                                        <td><?=$bulan?></td>
                                        <td><?=$tahun?></td>
                                        <td>
                                            <center>
                                                <a class="btn btn-warning btn-sm form-pill" href="?mod=remender&pg=tambah&kode=<?php echo $data['idpegawai'];?>&bulan=<?php echo $bulank;?>"><span class="icon-plus menu-icon"></span> Input Berkas</a>
                                            </center>
                                        </td>
                                    </tr>
                                <?php
                                }
                                }
                                ?>
                                </tbody>
                            </table>
<!--                            <div>--><?//=$bulan?><!-- 1</div>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    break;
    case 'tambah':
    $user=$_SESSION['pegawai'];
    $data = mysqli_fetch_assoc(mysqli_query($koneksi, "select * from tbpegawai where username = '$user'"));
    $bulan=$_GET['bulan'];
        ?>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="round-form" role="tabpanel" aria-labelledby="round-form-tab">
                <div class="row">
                    <div class="col-xl-12 col-md-12">
                        <div class="card card-shadow mb-4">
                            <div class="card-header border-0">
                                <div class="custom-title-wrap bar-primary">
                                    <div class="custom-title">Input Berkas Laporan</div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form method="post" action="mod_proses/prosespenilaian.php?mod=remender&act=simpan" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <label for="noregis" class="col-sm-3 col-form-label">Nomor Registrasi Magang</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="noregis" id="noregis" value="<?=$data['noregis']?>" placeholder="Nomor Registrasi Magang" readonly>
                                            <input type="hidden" class="form-control" name="id" id="" value="<?=$data['idpegawai']?>" placeholder="Nomor Registrasi Magang">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nik" class="col-sm-3 col-form-label">NIK</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="nik" value="<?=$data['nik']?>" readonly placeholder="NIK">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="nama" id="nama" value="<?=$data['nama']?>" readonly placeholder="Nama">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="bulan" class="col-sm-3 col-form-label">Bulan</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="bulan" id="bulan" value="<?=$bulan?>" readonly placeholder="Nama">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="berkas" class="col-sm-3 col-form-label">Berkas</label>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-control" name="berkas" id="Berkas" placeholder="Berkas" required="">
                                        </div>
                                    </div>
                                    <div class="text-center">
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
    case 'edit':
    $sql=mysqli_query($koneksi,"select * from tbpegawai where idpegawai='$_GET[kode]'");
    $data = mysqli_fetch_assoc($sql);
        ?>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="round-form" role="tabpanel" aria-labelledby="round-form-tab">
                <div class="row">
                    <div class="col-xl-12 col-md-12">
                        <div class="card card-shadow mb-4">
                            <div class="card-header border-0">
                                <div class="custom-title-wrap bar-primary">
                                    <div class="custom-title">Edit Data Pegawai Kontrak</div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form method="post" action="mod_pegawai/prosespegawai.php?mod=pegawai&act=edit">
                                    <div class="form-group">
                                        <label>No. Registrasi Magang</label>
                                        <input type="text" class="form-control" name="noregis" placeholder="Masukkan No. Registrasi Magang" value="<?=$data['noregis']?>" required>
                                        <input type="hidden" class="form-control" name="id" placeholder="Masukkan No. Registrasi Magang" value="<?=$data['idpegawai']?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>NIK</label>
                                        <input type="text" class="form-control" name="nik" placeholder="Masukkan NIK" value="<?=$data['nik']?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama" value="<?=$data['nama']?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Tempat Lahir</label>
                                        <input type="text" class="form-control" name="tlahir" placeholder="Masukkan Tempat Lahir" value="<?=$data['tempatlahir']?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                        <input type="date" class="form-control" name="tgllahir" placeholder="Masukkan Tanggal Lahir" value="<?=$data['tgllahir']?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Pendidikan</label>
                                        <select class="form-control" name="pendidikan" required="">
                                            <option value="<?=$data['pendidikan']?>"><?=$data['pendidikan']?></option>
                                            <option value="SMP">SMP</option>
                                            <option value="SMA">SMA</option>
                                            <option value="SMK">SMK</option>
                                            <option value="MA">MA</option>
                                            <option value="D-III">D-III</option>
                                            <option value="D-IV">D-IV</option>
                                            <option value="S-1">S-1</option>
                                            <option value="S-2">S-2</option>
                                            <option value="S-3">S-3</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Jabatan</label>
                                        <select class="form-control" name="jabatan" required="">
                                            <option value="<?=$data['jabatan']?>"><?=$data['jabatan']?></option>
                                            <option value="Jurnalis">Jurnalis</option>
                                            <option value="Pengadministrasi Kepegawaian">Pengadministrasi Kepegawaian</option>
                                            <option value="Pengadministrasi Umum">Pengadministrasi Umum</option>
                                            <option value="Pengelola Data">Pengelola Data</option>
                                            <option value="Pengelola Dokumentasi">Pengelola Dokumentasi</option>
                                            <option value="Pengelola Kepegawaian">Pengelola Kepegawaian</option>
                                            <option value="Pengelola Perjalanan Dinas">Pengelola Perjalanan Dinas</option>
                                            <option value="Pengelola Surat">Pengelola Surat</option>
                                            <option value="Pengelola Terjemahan & Kerjasama">Pengelola Terjemahan & Kerjasama</option>
                                            <option value="Petugas Protokol">Petugas Protokol</option>
                                            <option value="Pranata Acara">Pranata Acara</option>
                                            <option value="Pranata Fotografi">Pranata Fotografi</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Mulai Terhitung</label>
                                        <input type="date" class="form-control" name="tmt" placeholder="Masukkan Tanggal Lahir" value="<?=$data['tmt']?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Selesai</label>
                                        <input type="date" class="form-control" name="ts" placeholder="Masukkan Tanggal Lahir" value="<?=$data['ts']?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" name="username" placeholder="Masukkan Username" value="<?=$data['username']?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="text" class="form-control" name="password" placeholder="Masukkan Password" value="<?=$data['password']?>" required>
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
    $sql=mysqli_query($koneksi,"select * from tbpegawai where idpegawai='$_GET[kode]'");
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
                                    <div class="form-group">
                                        <label>No. Registrasi Magang</label>
                                        <input type="text" class="form-control" name="noregis" placeholder="Masukkan No. Registrasi Magang" value="<?=$data['noregis']?>" disabled>
                                        <input type="hidden" class="form-control" name="id" placeholder="Masukkan No. Registrasi Magang" value="<?=$data['idpegawai']?>">
                                    </div>
                                    <div class="form-group">
                                        <label>NIK</label>
                                        <input type="text" class="form-control" name="nik" placeholder="Masukkan NIK" value="<?=$data['nik']?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama" value="<?=$data['nama']?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Tempat Lahir</label>
                                        <input type="text" class="form-control" name="tlahir" placeholder="Masukkan Tempat Lahir" value="<?=$data['tempatlahir']?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                        <input type="date" class="form-control" name="tgllahir" placeholder="Masukkan Tanggal Lahir" value="<?=$data['tgllahir']?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Pendidikan</label>
                                        <select class="form-control" name="pendidikan" disabled="">
                                            <option value="<?=$data['pendidikan']?>"><?=$data['pendidikan']?></option>
                                            <option value="SMP">SMP</option>
                                            <option value="SMA">SMA</option>
                                            <option value="SMK">SMK</option>
                                            <option value="MA">MA</option>
                                            <option value="D-III">D-III</option>
                                            <option value="D-IV">D-IV</option>
                                            <option value="S-1">S-1</option>
                                            <option value="S-2">S-2</option>
                                            <option value="S-3">S-3</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Jabatan</label>
                                        <select class="form-control" name="jabatan" disabled="">
                                            <option value="<?=$data['jabatan']?>"><?=$data['jabatan']?></option>
                                            <option value="Jurnalis">Jurnalis</option>
                                            <option value="Pengadministrasi Kepegawaian">Pengadministrasi Kepegawaian</option>
                                            <option value="Pengadministrasi Umum">Pengadministrasi Umum</option>
                                            <option value="Pengelola Data">Pengelola Data</option>
                                            <option value="Pengelola Dokumentasi">Pengelola Dokumentasi</option>
                                            <option value="Pengelola Kepegawaian">Pengelola Kepegawaian</option>
                                            <option value="Pengelola Perjalanan Dinas">Pengelola Perjalanan Dinas</option>
                                            <option value="Pengelola Surat">Pengelola Surat</option>
                                            <option value="Pengelola Terjemahan & Kerjasama">Pengelola Terjemahan & Kerjasama</option>
                                            <option value="Petugas Protokol">Petugas Protokol</option>
                                            <option value="Pranata Acara">Pranata Acara</option>
                                            <option value="Pranata Fotografi">Pranata Fotografi</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Mulai Terhitung</label>
                                        <input type="date" class="form-control" name="tmt" placeholder="Masukkan Tanggal Lahir" value="<?=$data['tmt']?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Selesai</label>
                                        <input type="date" class="form-control" name="ts" placeholder="Masukkan Tanggal Lahir" value="<?=$data['ts']?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" name="username" placeholder="Masukkan Username" value="<?=$data['username']?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="text" class="form-control" name="password" placeholder="Masukkan Password" value="<?=$data['password']?>" disabled>
                                    </div>
                                    <div class="text-left">
                                        <button type="" class="btn btn-danger">Kembali</button>
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
