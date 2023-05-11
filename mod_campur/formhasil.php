<?php
session_start();

include('koneksi.php');
$id=$_SESSION['pegawai'];
$sql=mysqli_query($koneksi,"select * from tbpenilaian inner join tbpegawai 
    on tbpegawai.idpegawai=tbpenilaian.idpegawai where username='$id'");
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
                            <div class="custom-title">Hasil Penilaian</div>
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
                                    <th>Berkas</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                while ($data=mysqli_fetch_assoc($sql)){
                                    $awal  = date_create($data['tmt']);
                                    $akhir = date_create($data['ts']);
                                    $diff  = $akhir->diff($awal)->days + 1;
                                    ?>
                                    <tr>
                                        <td><?=$no?></td>
                                        <td><?=$data['nik']?></td>
                                        <td><?=$data['nama']?></td>
                                        <td><?=$data['jabatan']?></td>
                                        <td><?=substr($data['bln'],0,2)?></td>
                                        <td><?=substr($data['bln'],3,4)?></td>
                                        <td><?=$data['berkas']?></td>
                                        <td>
                                            <center>
                                                <a class="btn btn-danger btn-sm form-pill" href="?mod=hasilpegawai&pg=hapus&kode=<?php echo $data['idpenilaian'];?>"><span class="fa fa-eye"></span> Hasil Penilaian</a>
                                            </center>
                                        </td>
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
        break;
    case 'tambah':
        $user=$_SESSION['pegawai'];
        $data = mysqli_fetch_assoc(mysqli_query($koneksi, "select * from tbpegawai where username = '$user'"));
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
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Bualn</label>
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
                                        <a href="?mod=hasilpegawai" class="btn btn-primary">Kembali</a>
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
