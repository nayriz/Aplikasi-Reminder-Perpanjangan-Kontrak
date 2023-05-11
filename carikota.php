<?php
include "koneksi.php";

    # code...
if (isset($_POST['provinsi'])){
    $lokasi1="select * from tbwilayah where provinsi like '%".$_POST["provinsi"]."%' GROUP BY kota";
    $data1 = mysqli_query($koneksi,$lokasi1);
    ?>
    <option value="" selected="">Pilih Kota</option>
    <?php
    foreach ($data1 as $data_lokasi1){

        ?>
        <option value="<?php echo $data_lokasi1["kota"] ?>"><?php echo $data_lokasi1["kota"] ?></option>
        <?php
    }
}elseif (isset($_POST['kota'])) {
    $lokasi2 = "select * from tbwilayah where kota like '%" . $_POST["kota"] . "%' GROUP BY kecamatan";
    $data2 = mysqli_query($koneksi, $lokasi2);
    ?>
    <option value="" selected="">Pilih Kecamatan</option>
    <?php
    foreach ($data2 as $data_lokasi2) {

        ?>
        <option value="<?php echo $data_lokasi2["kecamatan"] ?>"><?php echo $data_lokasi2["kecamatan"] ?></option>
        <?php
    }
}elseif (isset($_POST['kecamatan'])) {
    $lokasi2 = "select * from tbwilayah where kecamatan like '%" . $_POST["kecamatan"] . "%' GROUP BY kelurahan";
    $data2 = mysqli_query($koneksi, $lokasi2);
    ?>
    <option value="" selected="">Pilih Kelurahan</option>
    <?php
    foreach ($data2 as $data_lokasi2) {

        ?>
        <option value="<?php echo $data_lokasi2["kelurahan"] ?>"><?php echo $data_lokasi2["kelurahan"] ?></option>
        <?php
    }
}



?>