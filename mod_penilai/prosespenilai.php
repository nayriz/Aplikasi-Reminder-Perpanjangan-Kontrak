<?php

include('../koneksi.php');
$Id=isset($_POST['id'])?htmlspecialchars($_POST['id']):'';
$nip=isset($_POST['nip'])?htmlspecialchars($_POST['nip']):'';
$pangkat=isset($_POST['pangkat'])?htmlspecialchars($_POST['pangkat']):'';
$nama=isset($_POST['nama'])?htmlspecialchars($_POST['nama']):'';
$jabatan=isset($_POST['jabatan'])?htmlspecialchars($_POST['jabatan']):'';
$username=isset($_POST['username'])?htmlspecialchars($_POST['username']):'';
$password=isset($_POST['password'])?htmlspecialchars($_POST['password']):'';
$aksi=$_GET['act'];
$tempat=$_GET['mod'];



if ($tempat=='penilai' && $aksi == 'simpan'){

    $cek = mysqli_num_rows(mysqli_query($koneksi,"select * from tbpenilai where usernamepenilai='$username'"));
    if ($cek===1){
        echo "<script>
			alert('Username Telah Terdaftar');
			window.history.back();
			</script>
			";
        exit();
    }
    $cek = mysqli_num_rows(mysqli_query($koneksi,"select * from tbpenilai where nip='$nip'"));
    if ($cek===1){
        echo "<script>
			alert('NIP Telah Terdaftar');
			window.history.back();
			</script>
			";
        exit();
    }
    $sql=mysqli_query($koneksi, "INSERT INTO tbpenilai VALUES('$Id','$nip','$nama','$pangkat','$jabatan','$username','$password')");
}
if ($tempat=='penilai' && $aksi == 'edit'){
    $cek = mysqli_num_rows(mysqli_query($koneksi,"SELECT * from tbpenilai where nip='$nip' and idpenilai !='$Id'"));
    if ($cek===1){
        echo "<script>
			alert('NIP Telah Terdaftar');
			window.history.back();
			</script>
			";
        exit();
    }
    $cek = mysqli_num_rows(mysqli_query($koneksi,"SELECT * from tbpenilai where usernamepenilai='$username' and idpenilai !='$Id'"));
    if ($cek===1){
        echo "<script>
			alert('Username Telah Terdaftar');
			window.history.back();
			</script>
			";
        exit();
    }
    $sql=mysqli_query($koneksi, "UPDATE tbpenilai SET nip='$nip', nama='$nama',pangkat='$pangkat',jabatan='$jabatan', usernamepenilai='$username', passwordpenilai='$password' WHERE idpenilai='$Id'");
}

if ($tempat=='penilai' && $aksi == 'hapus'){
    $sql=mysqli_query($koneksi, "DELETE FROM tbpenilai WHERE idpenilai='$Id'");

}
if($sql){
    echo"
			<script>
			alert('Data Berhasil Di$aksi');
			document.location.href='../index.php?mod=$tempat';
			</script>";
}
else{
    echo"
			<script>
			alert('Data Gagal Di$aksi')
			// document.location.href='../index.php?mod=$tempat';
			</script>";
}


?>