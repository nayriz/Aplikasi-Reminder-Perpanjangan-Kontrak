<?php
include "../koneksi.php";

    # code...
    $lokasi1="select * from tbwilayah where provinsi like '%".$_POST["provinsi"]."%'";
    $data1 = mysqli_query($koneksi,$lokasi1);
    ?>
    <option value="" selected="">Pilih Kota</option>
    <?php
    foreach ($data1 as $data_lokasi1){

        ?>
        <option value="<?php echo $data_lokasi1["kota"] ?>"><?php echo $data_lokasi1["kota"] ?></option>
        <?php
    }


?>