<?php 
session_start();
include('koneksi.php');
$user=$_SESSION['pegawai'];
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "select * from tbpegawai where username = '$user'"));
 ?>
<div class="row">
    <div class="col-xl-12">
        <div class="card card-shadow mb-4">
            <div class="card-header border-0">
                <div class="custom-title-wrap bar-primary">
                    <div class="custom-title">Profil</div>
                </div>
            </div>
            <div class="card-body">                            
                <div class="text-center">
                    <div class="mt-4 mb-3">
                        <img class="rounded-circle" src="mod_pegawai/img/<?=$data['foto']?>" width="85" alt=""/>
                    </div>
                </div>
                <form method="post" action="mod_pegawai/prosespegawai.php?mod=profil&act=edit" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="noregis" class="col-sm-3 col-form-label">Nomor Registrasi Magang</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="noregis" id="noregis" value="<?=$data['noregis']?>" placeholder="Nomor Registrasi Magang">
                            <input type="hidden" class="form-control" name="id" id="noregis" value="<?=$data['idpegawai']?>" placeholder="Nomor Registrasi Magang">
                            <input type="hidden" class="form-control" name="fotolama" id="noregis" value="<?=$data['foto']?>" placeholder="Nomor Registrasi Magang">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nik" class="col-sm-3 col-form-label">NIK</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="nik" id="nik" value="<?=$data['nik']?>" placeholder="NIK">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="nama" id="nama" value="<?=$data['nama']?>" placeholder="Nama">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tlahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="tlahir" id="tlahir" value="<?=$data['tempatlahir']?>" placeholder="Tempat Lahir">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tgllahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" name="tgllahir" id="tgllahir" value="<?=$data['tgllahir']?>" placeholder="Tanggal Lahir">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Pendidikan</label>
                        <div class="col-sm-9">
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
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Jabatan</label>
                        <div class="col-sm-9">
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
                    </div>
                    <div class="form-group row">
                        <label for="tmt" class="col-sm-3 col-form-label">Tanggal Mulai Terhitung</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" name="tmt" id="tmt" value="<?=$data['tmt']?>" readonly="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="ts" class="col-sm-3 col-form-label">Tanggal Selesai</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" name="ts" id="ts" value="<?=$data['ts']?>" readonly="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="foto" class="col-sm-3 col-form-label">Foto</label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" name="foto" id="foto" placeholder="Foto">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-sm-3 col-form-label">Username</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="username" id="username" value="<?=$data['username']?>" placeholder="Username">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Password" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="password" id="Password" value="<?=$data['password']?>" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12 text-center">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>