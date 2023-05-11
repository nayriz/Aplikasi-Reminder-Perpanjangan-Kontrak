<?php

include('koneksi.php');
$sql = mysqli_query($koneksi,"select * from tbpenilai");
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
                            <div class="custom-title">Data Akun Penilai</div>
                        </div>
                    </div>
                    <div style="margin-left: 20px">
                        <a class="btn btn-success btn-sm form-pill" href="?mod=penilai&pg=tambah"><b>+</b> Tambah</a></div>
                    <div class="card-body- pt-3 pb-4">
                        <div class="table-responsive">
                            <table id="data_table" class="table table-bordered table-striped" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIP</th>
                                    <th>Nama</th>
                                    <th>Pangkat</th>
                                    <th>Jabatan</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                while ($data=mysqli_fetch_assoc($sql)){
                                ?>
                                    <tr>
                                        <td><?=$no?></td>
                                        <td><?=$data['nip']?></td>
                                        <td><?=$data['nama']?></td>
                                        <td><?=$data['pangkat']?></td>
                                        <td><?=$data['jabatan']?></td>
                                        <td>
                                            <a class="btn btn-warning btn-sm form-pill" href="?mod=penilai&pg=edit&kode=<?php echo $data['idpenilai'];?>"><span class="icon-note menu-icon"></span> Edit</a>
                                            <a class="btn btn-danger btn-sm form-pill" href="?mod=penilai&pg=hapus&kode=<?php echo $data['idpenilai'];?>"><span class="fa fa-trash"></span> Hapus</a>
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
                                    <div class="custom-title">Input Akun Penilai</div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form method="post" action="mod_penilai/prosespenilai.php?mod=penilai&act=simpan">
                                    <div class="form-group">
                                        <label>NIP</label>
                                        <input type="text" class="form-control" name="nip" placeholder="Masukkan NIP" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Penilai</label>
                                        <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Penilai" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Pangkat</label>
                                        <input type="text" class="form-control" name="pangkat" placeholder="Masukkan Pangkat" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Jabatan</label>
                                        <input type="text" class="form-control" name="jabatan" placeholder="Masukkan Jabatan" required>
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
    $sql=mysqli_query($koneksi,"select * from tbpenilai where idpenilai='$_GET[kode]'");
    $data = mysqli_fetch_assoc($sql);
        ?>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="round-form" role="tabpanel" aria-labelledby="round-form-tab">
                <div class="row">
                    <div class="col-xl-12 col-md-12">
                        <div class="card card-shadow mb-4">
                            <div class="card-header border-0">
                                <div class="custom-title-wrap bar-primary">
                                    <div class="custom-title">Edit Akun Penilai</div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form method="post" action="mod_penilai/prosespenilai.php?mod=penilai&act=edit">
                                    <div class="form-group">
                                        <label>NIP</label>
                                        <input type="text" class="form-control" value="<?=$data['nip']?>" name="nip" placeholder="Masukkan NIP" required>
                                        <input type="hidden" name="id" value="<?=$data['idpenilai']?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Penilai</label>
                                        <input type="text" class="form-control" value="<?=$data['nama']?>" name="nama" placeholder="Masukkan Nama Penilai" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Pangkat</label>
                                        <input type="text" class="form-control" value="<?=$data['pangkat']?>" name="pangkat" placeholder="Masukkan Pangkat" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Jabatan</label>
                                        <input type="text" class="form-control" value="<?=$data['jabatan']?>" name="jabatan" placeholder="Masukkan Jabatan" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" value="<?=$data['usernamepenilai']?>" name="username" placeholder="Masukkan Username" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="text" class="form-control" value="<?=$data['passwordpenilai']?>" name="password" placeholder="Masukkan Password" required>
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
    $sql=mysqli_query($koneksi,"select * from tbpenilai where idpenilai='$_GET[kode]'");
    $data = mysqli_fetch_assoc($sql);
        ?>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="round-form" role="tabpanel" aria-labelledby="round-form-tab">
                <div class="row">
                    <div class="col-xl-12 col-md-12">
                        <div class="card card-shadow mb-4">
                            <div class="card-header border-0">
                                <div class="custom-title-wrap bar-primary">
                                    <div class="custom-title">Hapus Akun Penilai</div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form method="post" action="mod_penilai/prosespenilai.php?mod=penilai&act=hapus">
                                    <div class="form-group">
                                        <label>NIP</label>
                                        <input type="text" class="form-control" value="<?=$data['nip']?>" name="nip" placeholder="Masukkan NIP" readonly>
                                        <input type="hidden" name="id" value="<?=$data['idpenilai']?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Penilai</label>
                                        <input type="text" class="form-control" value="<?=$data['nama']?>" name="nama" placeholder="Masukkan Nama Penilai" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Pangkat</label>
                                        <input type="text" class="form-control" value="<?=$data['pangkat']?>" name="pangkat" placeholder="Masukkan Pangkat" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Jabatan</label>
                                        <input type="text" class="form-control" value="<?=$data['jabatan']?>" name="jabatan" placeholder="Masukkan Jabatan" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" value="<?=$data['usernamepenilai']?>" name="username" placeholder="Masukkan Username" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="text" class="form-control" value="<?=$data['passwordpenilai']?>" name="password" placeholder="Masukkan Password" readonly>
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
