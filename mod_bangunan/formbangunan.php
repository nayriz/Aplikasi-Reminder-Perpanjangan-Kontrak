<?php

include('koneksi.php');
$sql = mysqli_query($koneksi,"select * from tbbangunan");
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
                            <div class="custom-title">Data Bangunan</div>
                        </div>
                    </div>
                    <div style="margin-left: 20px">
                        <a class="btn btn-success btn-sm form-pill" href="?mod=bangunan&pg=tambah"><b>+</b> Tambah</a></div>
                    <div class="card-body- pt-3 pb-4">
                        <div class="table-responsive">
                            <table id="data_table" class="table table-bordered table-striped" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Bangunan</th>
                                    <th>Lokasi</th>
                                    <th>Jaman</th>
                                    <th>Gaya Arsitektur</th>
                                    <th style="width: 20%">Jenis Objek</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                while ($data=mysqli_fetch_assoc($sql)){
                                    ?>
                                    <tr>
                                        <td><?=$no?></td>
                                        <td><?=$data['namasitus']?></td>
                                        <td><?=$data['kota']?></td>
                                        <td><?=$data['jaman']?></td>
                                        <td><?=$data['arsitektur']?></td>
                                        <td><?=$data['jenisobjek']?></td>
                                        <td>
                                            <a class="btn btn-warning btn-sm form-pill" href="?mod=bangunan&pg=edit&kode=<?php echo $data['idbangunan'];?>"><span class="icon-note menu-icon"></span> Edit</a>
                                            <a class="btn btn-danger btn-sm form-pill" href="?mod=bangunan&pg=hapus&kode=<?php echo $data['idbangunan'];?>"><span class="fa fa-trash"></span> Hapus</a>
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
                                    <div class="custom-title">Input Data Cakar Budaya</div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form method="post" action="mod_bangunan/prosesbangunan.php?mod=bangunan&act=simpan"">
                                <div class="form-group">
                                    <label>Nama Situs</label>
                                    <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Situs" required>
                                </div>
                                <div class="form-group">
                                    <label>Provinsi</label>
                                    <select class="form-control" name="provinsi" id="provinsi" required>
                                        <option value="">Pilih Provinsi</option>
                                        <?php
                                        $sqlprovinsi = mysqli_query($koneksi,"select * from tbwilayah group by provinsi");
                                        while ($data=mysqli_fetch_assoc($sqlprovinsi)){
                                            ?>
                                            <option value="<?=$data['provinsi']?>"><?=$data['provinsi']?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Kabupaten / Kota</label>
                                    <select class="form-control" name="kota" id="kota" required>
                                        <option value="">Pilih Kabupaten / Kota</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Kecamatan</label>
                                    <select class="form-control" name="kecamatan" id="kecamatan" required>
                                        <option value="">Pilih Kecamatan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Kelurahan</label>
                                    <select class="form-control" name="kelurahan" id="kelurahan" required>
                                        <option value="">Pilih Kelurahan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Jaman</label>
                                    <select class="form-control" name="jaman" id="jaman" required>
                                        <option value="">Pilih Jaman</option>
                                        <?php
                                        $sqljaman = mysqli_query($koneksi,"select * from tbbangunan group by jaman");
                                        while ($datajaman=mysqli_fetch_assoc($sqljaman)){
                                        if($datajaman['jaman'] !='' and $datajaman['jaman'] !='-') {
                                            ?>
                                            <option
                                                value="<?= $datajaman['jaman'] ?>"><?= $datajaman['jaman'] ?></option>
                                            <?php
                                        }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Gaya Arsitektur</label>
                                    <select class="form-control" name="arsitektur" id="arsitektur" required>
                                        <option value="">Pilih Arsitektur</option>
                                        <?php
                                        $sqlobjek = mysqli_query($koneksi,"select * from tbbangunan group by arsitektur");
                                        while ($datajaman=mysqli_fetch_assoc($sqlobjek)){
                                            if($datajaman['arsitektur'] !='' and $datajaman['arsitektur'] !='-') {
                                                ?>
                                                <option
                                                    value="<?= $datajaman['arsitektur'] ?>"><?= $datajaman['arsitektur'] ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Objek</label>
                                    <select class="form-control" name="objek" id="objek" disabled>
                                        <option value="">Pilih Jenis Objek</option>
                                        <?php
                                        $sqlobjek = mysqli_query($koneksi,"select * from tbbangunan group by jenisobjek");
                                        while ($datajaman=mysqli_fetch_assoc($sqlobjek)){
                                        if ($datajaman['jenisobjek'] != '' and $datajaman['jenisobjek'] != '-') {
                                            ?>
                                            <option
                                                value="<?= $datajaman['jenisobjek'] ?>"><?= $datajaman['jenisobjek'] ?></option>
                                            <?php
                                        }
                                        }
                                        ?>
                                    </select>
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
        $sql=mysqli_query($koneksi,"select * from tbbangunan where idbangunan='$_GET[kode]'");
        $data = mysqli_fetch_assoc($sql);
        ?>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="round-form" role="tabpanel" aria-labelledby="round-form-tab">
                <div class="row">
                    <div class="col-xl-12 col-md-12">
                        <div class="card card-shadow mb-4">
                            <div class="card-header border-0">
                                <div class="custom-title-wrap bar-primary">
                                    <div class="custom-title">Edit Data Cakar Budaya</div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form method="post" action="mod_bangunan/prosesbangunan.php?mod=bangunan&act=edit"">
                                <div class="form-group">
                                    <label>Nama Situs</label>
                                    <input type="text" class="form-control" name="nama" value="<?=$data['namasitus']?>" placeholder="Masukkan Nama Situs">
                                    <input type="hidden" class="form-control" name="id" value="<?=$data['idbangunan']?>" placeholder="Masukkan Nama Situs">
                                </div>
                                <div class="form-group">
                                    <label>Provinsi</label>
                                    <select class="form-control" name="provinsi" id="provinsi">
                                        <option value="<?=$data['provinsi']?>"><?=$data['provinsi']?></option>
                                        <?php
                                        $sqlprovinsi = mysqli_query($koneksi,"select * from tbwilayah group by provinsi");
                                        while ($dataprovinsi=mysqli_fetch_assoc($sqlprovinsi)){
                                            ?>
                                            <option value="<?=$dataprovinsi['provinsi']?>"><?=$dataprovinsi['provinsi']?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Kabupaten / Kota</label>
                                    <select class="form-control" name="kota" id="kota">
                                        <option value="<?=$data['kota']?>"><?=$data['kota']?></option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Kecamatan</label>
                                    <select class="form-control" name="kecamatan" id="kecamatan">
                                        <option value="<?=$data['kecamatan']?>"><?=$data['kecamatan']?></option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Kelurahan</label>
                                    <select class="form-control" name="kelurahan" id="kelurahan">
                                        <option value="<?=$data['kelurahan']?>"><?=$data['kelurahan']?></option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Jaman</label>
                                    <select class="form-control" name="jaman" id="jaman">
                                        <option value="<?=$data['jaman']?>"><?=$data['jaman']?></option>
                                        <?php
                                        $sqljaman = mysqli_query($koneksi,"select * from tbbangunan group by jaman");
                                        while ($datajaman=mysqli_fetch_assoc($sqljaman)){
                                            if($datajaman['jaman'] !='' and $datajaman['jaman'] !='-') {
                                                ?>
                                                <option
                                                    value="<?= $datajaman['jaman'] ?>"><?= $datajaman['jaman'] ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Gaya Arsitektur</label>
                                    <select class="form-control" name="arsitektur" id="arsitektur">
                                        <option value="<?=$data['arsitektur']?>"><?=$data['arsitektur']?></option>
                                        <?php
                                        $sqlobjek = mysqli_query($koneksi,"select * from tbbangunan group by arsitektur");
                                        while ($datajaman=mysqli_fetch_assoc($sqlobjek)){
                                            if($datajaman['arsitektur'] !='' and $datajaman['arsitektur'] !='-') {
                                                ?>
                                                <option
                                                    value="<?= $datajaman['arsitektur'] ?>"><?= $datajaman['arsitektur'] ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Objek</label>
                                    <select class="form-control" name="objek" id="objek">
                                        <option value="<?=$data['jenisobjek']?>"><?=$data['jenisobjek']?></option>
                                        <?php
                                        $sqlobjek = mysqli_query($koneksi,"select * from tbbangunan group by jenisobjek");
                                        while ($datajaman=mysqli_fetch_assoc($sqlobjek)){
                                            if ($datajaman['jenisobjek'] != '' and $datajaman['jenisobjek'] != '-') {
                                                ?>
                                                <option
                                                    value="<?= $datajaman['jenisobjek'] ?>"><?= $datajaman['jenisobjek'] ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
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
        $sql=mysqli_query($koneksi,"select * from tbbangunan where idbangunan='$_GET[kode]'");
        $data = mysqli_fetch_assoc($sql);
        ?>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="round-form" role="tabpanel" aria-labelledby="round-form-tab">
                <div class="row">
                    <div class="col-xl-12 col-md-12">
                        <div class="card card-shadow mb-4">
                            <div class="card-header border-0">
                                <div class="custom-title-wrap bar-primary">
                                    <div class="custom-title">Hapus Data Cakar Budaya</div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form method="post" action="mod_bangunan/prosesbangunan.php?mod=bangunan&act=hapus"">
                                <div class="form-group">
                                    <label>Nama Situs</label>
                                    <input type="text" class="form-control" name="nama" value="<?=$data['namasitus']?>" disabled placeholder="Masukkan Nama Situs">
                                    <input type="hidden" class="form-control" name="id" value="<?=$data['idbangunan']?>" placeholder="Masukkan Nama Situs">
                                </div>
                                <div class="form-group">
                                    <label>Provinsi</label>
                                    <select class="form-control" name="provinsi" id="provinsi" disabled>
                                        <option value="<?=$data['provinsi']?>"><?=$data['provinsi']?></option>
                                        <?php
                                        $sqlprovinsi = mysqli_query($koneksi,"select * from tbwilayah group by provinsi");
                                        while ($dataprovinsi=mysqli_fetch_assoc($sqlprovinsi)){
                                            ?>
                                            <option value="<?=$dataprovinsi['provinsi']?>"><?=$dataprovinsi['provinsi']?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Kabupaten / Kota</label>
                                    <select class="form-control" name="kota" id="kota" disabled>
                                        <option value="<?=$data['kota']?>"><?=$data['kota']?></option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Kecamatan</label>
                                    <select class="form-control" name="kecamatan" id="kecamatan" disabled>
                                        <option value="<?=$data['kecamatan']?>"><?=$data['kecamatan']?></option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Kelurahan</label>
                                    <select class="form-control" name="kelurahan" id="kelurahan" disabled>
                                        <option value="<?=$data['kelurahan']?>"><?=$data['kelurahan']?></option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Jaman</label>
                                    <select class="form-control" name="jaman" id="jaman" disabled>
                                        <option value="<?=$data['jaman']?>"><?=$data['jaman']?></option>
                                        <?php
                                        $sqljaman = mysqli_query($koneksi,"select * from tbbangunan group by jaman");
                                        while ($datajaman=mysqli_fetch_assoc($sqljaman)){
                                            if($datajaman['jaman'] !='' and $datajaman['jaman'] !='-') {
                                                ?>
                                                <option
                                                    value="<?= $datajaman['jaman'] ?>"><?= $datajaman['jaman'] ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Gaya Arsitektur</label>
                                    <select class="form-control" name="arsitektur" id="arsitektur" disabled>
                                        <option value="<?=$data['arsitektur']?>"><?=$data['arsitektur']?></option>
                                        <?php
                                        $sqlobjek = mysqli_query($koneksi,"select * from tbbangunan group by arsitektur");
                                        while ($datajaman=mysqli_fetch_assoc($sqlobjek)){
                                            if($datajaman['arsitektur'] !='' and $datajaman['arsitektur'] !='-') {
                                                ?>
                                                <option
                                                    value="<?= $datajaman['arsitektur'] ?>"><?= $datajaman['arsitektur'] ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Objek</label>
                                    <select class="form-control" name="objek" id="objek" disabled>
                                        <option value="<?=$data['jenisobjek']?>"><?=$data['jenisobjek']?></option>
                                        <?php
                                        $sqlobjek = mysqli_query($koneksi,"select * from tbbangunan group by jenisobjek");
                                        while ($datajaman=mysqli_fetch_assoc($sqlobjek)){
                                            if ($datajaman['jenisobjek'] != '' and $datajaman['jenisobjek'] != '-') {
                                                ?>
                                                <option
                                                    value="<?= $datajaman['jenisobjek'] ?>"><?= $datajaman['jenisobjek'] ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
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
