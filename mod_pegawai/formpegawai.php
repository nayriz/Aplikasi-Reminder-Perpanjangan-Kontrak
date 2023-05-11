<?php

include('koneksi.php');
$sql = mysqli_query($koneksi,"select * from tbpegawai");
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
                            <div class="custom-title">Data Pegawai Kontrak</div>
                        </div>
                    </div>
                    <div style="margin-left: 20px">
                        <a class="btn btn-success btn-sm form-pill" href="?mod=pegawai&pg=tambah"><b>+</b> Tambah</a></div>
                    <div class="card-body- pt-3 pb-4">
                        <div class="table-responsive">
                            <table id="data_table" class="table table-bordered table-striped" cellspacing="0">
                                <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>No. Registrasi Magang</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Pendidikan</th>
                                    <th>Jabatan</th>
                                    <th>TMT<br>(Tanggal Mulai Terhitung)</th>
                                    <th>TS<br>(Tanggal Selesai)</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                while ($data=mysqli_fetch_assoc($sql)){
                                ?>
                                    <tr>
                                        <td><?=$no?></td>
                                        <td><?=$data['noregis']?></td>
                                        <td><?=$data['nik']?></td>
                                        <td><?=$data['nama']?></td>
                                        <td><?=$data['tempatlahir']?></td>
                                        <td><?=$data['tgllahir']?></td>
                                        <td><?=$data['pendidikan']?></td>
                                        <td><?=$data['jabatan']?></td>
                                        <td><?=$data['tmt']?></td>
                                        <td><?=$data['ts']?></td>
                                        <td>
                                            <a class="btn btn-warning btn-sm form-pill" href="?mod=pegawai&pg=edit&kode=<?php echo $data['idpegawai'];?>"><span class="icon-note menu-icon"></span> Edit</a>
                                            <a class="btn btn-danger btn-sm form-pill" href="?mod=pegawai&pg=hapus&kode=<?php echo $data['idpegawai'];?>"><span class="fa fa-trash"></span> Hapus</a>
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
        ?>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="round-form" role="tabpanel" aria-labelledby="round-form-tab">
                <div class="row">
                    <div class="col-xl-12 col-md-12">
                        <div class="card card-shadow mb-4">
                            <div class="card-header border-0">
                                <div class="custom-title-wrap bar-primary">
                                    <div class="custom-title">Input Data Pegawai Kontrak</div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form method="post" action="mod_pegawai/prosespegawai.php?mod=pegawai&act=simpan">
                                    <div class="form-group">
                                        <label>No. Registrasi Magang</label>
                                        <input type="text" class="form-control" name="noregis" placeholder="Masukkan No. Registrasi Magang" required>
                                    </div>
                                    <div class="form-group">
                                        <label>NIK</label>
                                        <input type="text" class="form-control" name="nik" placeholder="Masukkan NIK" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Tempat Lahir</label>
                                        <input type="text" class="form-control" name="tlahir" placeholder="Masukkan Tempat Lahir" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                        <input type="date" class="form-control" name="tgllahir" placeholder="Masukkan Tanggal Lahir" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Pendidikan</label>
                                        <select class="form-control" name="pendidikan" required="">
                                            <option value="">Pilih Pendidikan</option>
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
                                            <option value="">Pilih Jabatan</option>
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
                                        <input type="date" class="form-control" name="tmt" placeholder="Masukkan Tanggal Lahir" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Selesai</label>
                                        <input type="date" class="form-control" name="ts" placeholder="Masukkan Tanggal Lahir" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" name="username" placeholder="Masukkan Username" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="text" class="form-control" name="password" placeholder="Masukkan Password" required>
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
                                <form method="post" action="mod_pegawai/prosespegawai.php?mod=pegawai&act=edit&admin=1">
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
                                    <div class="custom-title">Hapus Data Pegawai Kontrak</div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form method="post" action="mod_pegawai/prosespegawai.php?mod=pegawai&act=hapus">
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
                                        <button type="submit" class="btn btn-danger">Hapus</button>
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
