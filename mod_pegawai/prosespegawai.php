<?php

include('../koneksi.php');
$Id=isset($_POST['id'])?htmlspecialchars($_POST['id']):'';
$nik=isset($_POST['nik'])?htmlspecialchars($_POST['nik']):'';
$noregis=isset($_POST['noregis'])?htmlspecialchars($_POST['noregis']):'';
$nama=isset($_POST['nama'])?htmlspecialchars($_POST['nama']):'';
$tlahir=isset($_POST['tlahir'])?htmlspecialchars($_POST['tlahir']):'';
$tgllahir=isset($_POST['tgllahir'])?htmlspecialchars($_POST['tgllahir']):'';
$pendidikan=isset($_POST['pendidikan'])?htmlspecialchars($_POST['pendidikan']):'';
$tmt=isset($_POST['tmt'])?htmlspecialchars($_POST['tmt']):'';
$ts=isset($_POST['ts'])?htmlspecialchars($_POST['ts']):'';
$jabatan=isset($_POST['jabatan'])?htmlspecialchars($_POST['jabatan']):'';
$username=isset($_POST['username'])?htmlspecialchars($_POST['username']):'';
$password=isset($_POST['password'])?htmlspecialchars($_POST['password']):'';
$aksi=$_GET['act'];
$tempat=$_GET['mod'];



if ($aksi == 'simpan'){

    $cek = mysqli_num_rows(mysqli_query($koneksi,"select * from tbpegawai where username='$username'"));
    if ($cek===1){
        echo "<script>
			alert('Username Telah Terdaftar');
			window.history.back();
			</script>
			";
        exit();
    }
    $cek = mysqli_num_rows(mysqli_query($koneksi,"select * from tbpegawai where nik='$nik'"));
    if ($cek===1){
        echo "<script>
			alert('NIK Telah Terdaftar');
			window.history.back();
			</script>
			";
        exit();
    }
    $cek = mysqli_num_rows(mysqli_query($koneksi,"select * from tbpegawai where noregis='$noregis'"));
    if ($cek===1){
        echo "<script>
            alert('Nomor Registrasi Magang Telah Terdaftar');
            window.history.back();
            </script>
            ";
        exit();
    }
    $sql=mysqli_query($koneksi, "INSERT INTO tbpegawai VALUES('$Id','$noregis','$nik','$nama','$tlahir','$tgllahir','$pendidikan','$jabatan','$tmt','$ts','$username','$password','user.png')");
}
if ($aksi == 'edit'){
    $cek = mysqli_num_rows(mysqli_query($koneksi,"SELECT * from tbpegawai where nik='$nik' and idpegawai !='$Id'"));
    if ($cek===1){
        echo "<script>
			alert('NIK Telah Terdaftar');
			window.history.back();
			</script>
			";
        exit();
    }
    $cek = mysqli_num_rows(mysqli_query($koneksi,"SELECT * from tbpegawai where username='$username' and idpegawai !='$Id'"));
    if ($cek===1){
        echo "<script>
			alert('Username Telah Terdaftar');
			window.history.back();
			</script>
			";
        exit();
    }
    $cek = mysqli_num_rows(mysqli_query($koneksi,"SELECT * from tbpegawai where noregis='$noregis' and idpegawai !='$Id'"));
    if ($cek===1){
        echo "<script>
            alert('Nomor Registrasi Magang Telah Terdaftar');
            window.history.back();
            </script>
            ";
        exit();
    }
    if($_GET['admin']=='1'){
        $sql=mysqli_query($koneksi, "UPDATE tbpegawai SET nik='$nik', noregis='$noregis', nama='$nama',tempatlahir='$tlahir',jabatan='$jabatan', tgllahir='$tgllahir', pendidikan='$pendidikan', tmt='$tmt', ts='$ts', username='$username', password='$password' WHERE idpegawai='$Id'");
    }else{
    $FotoLama=$_POST['fotolama'];
		if ($_FILES['foto']['error']===4) {
			$Foto=$FotoLama;
		}else{
			$Foto=upload();
		}
			if (!$Foto) {
		exit();
	    }
    $sql=mysqli_query($koneksi, "UPDATE tbpegawai SET nik='$nik', noregis='$noregis', nama='$nama',tempatlahir='$tlahir',jabatan='$jabatan', tgllahir='$tgllahir', pendidikan='$pendidikan', tmt='$tmt', ts='$ts', username='$username', password='$password', foto='$Foto' WHERE idpegawai='$Id'");

    }
    }

if ($aksi == 'hapus'){
    $sql=mysqli_query($koneksi, "DELETE FROM tbpegawai WHERE idpegawai='$Id'");

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
			document.location.href='../index.php?mod=$tempat';
			</script>";
}

function upload(){
	global $koneksi;
	global $FotoLama;
	$namafile=$_FILES['foto']['name'];
	$ukaranfile=$_FILES['foto']['size'];
	$error=$_FILES['foto']['error'];
	$tmpname=$_FILES['foto']['tmp_name'];

		if($error===4){
			echo "<script>
			alert('Pilih Gambar');
			window.history.back();
			</script>
			";
			return false;
		}

	$ekstensiboleh=['jpg','png','jpeg','jfif'];
	$ekstensigambar=explode('.', $namafile);
	$ekstensigambar=strtolower(end($ekstensigambar));

		if(!in_array($ekstensigambar, $ekstensiboleh)){
			echo "<script>
			alert('Bukan Gambar');
			window.history.back();
			</script>
			";
			return false;
		}
		// if( $ukaranfile > 500000 ){
		// 	echo "<script>
		// 	alert('Gambar Terlalu Besar');
		// 	window.history.back();
		// 	</script>
		// 	";
		// 	return false;
		// }

		
	$namafilebaru=uniqid();
	$namafilebaru.='.';
	$namafilebaru.=$ekstensigambar;
	move_uploaded_file($tmpname, 'img/'. $namafilebaru);
	return $namafilebaru;
}


?>