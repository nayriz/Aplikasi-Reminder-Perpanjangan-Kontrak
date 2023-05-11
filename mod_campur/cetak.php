<?php
$koneksi='';
include "../koneksi.php";
$idpenilaian=$_GET['id'];
$idpenilai=$_GET['penilai'];
$idpegawai=$_GET['pegawai'];
$pegawai=mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * From tbpegawai where idpegawai='$idpegawai'"));
$penilai=mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * From tbpenilai where idpenilai='$idpenilai'"));
$date = new DateTime($pegawai['tgllahir']);
$tgls=date("d-m-Y");
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

<div style="width: 21cm; height: 29cm;margin-top: 1cm">
    <div style="width: 21cm" style="margin-top: 4cm">
        <center>
            <img src="../assets/img/cropped-logo.png" style="width: 50px;"><br>
            <label style="font-size: 14px;font-weight: bold;">PEMERINTAH PROVINSI SULAWESI SELATAN</label><br>
            <label style="font-size: 16px;font-weight: bold;">SEKRETARIAT DAERAH</label><br>
            <label style="font-size: 12px;">Jalan Jenderal Urip Sumohardjo No.269 Telp.(0411) 453050</label><br>
            <label>Makassar 90231</label><br>
        </center>
    </div>
    <center>
        <hr style="color: #000000;width: 45%" color=#000>
    </center>
    <div style="width: 21cm" style="margin-top: 2cm">
        <center>
            <label style="font-size: 12px;font-weight: bold;">SURAT PERJANJIAN KERJA</label><br>
            <hr style="color: #000000;width: 20%;margin-top: -0.01%;" color=#000>
        </center>
        <center>
            <label style="font-size: 12px;font-weight: bold;">Nomor :</label>
        </center>
    </div>
    <div style="width: 21cm; text-align: justify">
        <p style=";margin-left: 50px;margin-right: 40px">
            Pada hari ini, Tanggal <?=$tgls?> yang bertanda tangan di hawah ini masing-masing :
        </p>
    </div>
    <table style="margin-left: 80px">
        <tr>
            <td style="width: 20px">I.</td>
            <td>Nama</td>
            <td>:</td>
            <td><?=$penilai['nama']?></td>
        </tr>
        <tr>
            <td></td>
            <td>Pangkat</td>
            <td>:</td>
            <td><?=$penilai['pangkat']?></td>
        </tr>
        <tr>
            <td></td>
            <td>NIP</td>
            <td>:</td>
            <td><?=$penilai['nip']?></td>
        </tr>
        <tr>
            <td></td>
            <td>Alamat Kantor</td>
            <td>:
            </td>
            <td>Jl. Urip Sumohatjo No. 269</td>
        </tr>
        <tr>
            <td></td>
            <td>Jabatan</td>
            <td>:
            </td>
            <td><?=$penilai['jabatan']?></td>
        </tr>
    </table>
    <div style="width: 21cm; text-align: justify">
        <p style=";margin-left: 90px;margin-right: 40px">
            bertindak untuk dan atas nama Biro Administrasi Pimpinan Sekretariat Daerah Provinsi Sulawesi Selatan yang berkedudukan di Kantor Gubernur - Jalan Urip Sumohardjo No. 269 Makassar, untuk selanjutnya dalam perjanjian ini disebut
            <b>PIHAK PERTAMA.</b>
        </p>
    </div>
    <table style="margin-left: 80px">
        <tr>
            <td style="width: 20px">II.</td>
            <td>Nama</td>
            <td>:</td>
            <td><?=$pegawai['nama']?></td>
        </tr>
        <tr>
            <td></td>
            <td>Tempat, Tanggal Lahir</td>
            <td>:</td>
            <td><?=$pegawai['tempatlahir']?>, <?=$date->format('d-m-Y')?></td>
        </tr>
        <tr>
            <td></td>
            <td>NIK</td>
            <td>:</td>
            <td><?=$pegawai['nik']?></td>
        </tr>
        <tr>
            <td></td>
            <td>Pendidikan Terakhir</td>
            <td>:
            </td>
            <td><?=$pegawai['pendidikan']?></td>
        </tr>
    </table>
    <div style="width: 21cm; text-align: justify">
        <p style=";margin-left: 90px;margin-right: 40px">
            Dalam hal ini bertindak untuk dan atas nama diri sendiri, untuk selanjutnya disebut
            <b>PIHAK KEDUA.</b>
        </p>
    </div>
    <div style="width: 21cm; text-align: justify">
        <p style="margin-left: 50px;margin-right: 40px">
            <b>Berdasarkan :</b>
        </p>
    </div>
    <table style="margin-left: 80px;margin-right: 40px;text-align: justify">
        <tr>
            <td valign="top">1.</td>
            <td>Keputusan Gubernur Sulawesi Selatan Nomor 272/I/Tahun 2021 tentang Perubahan Atas Keputusan Gubernur Sulawesi Selatan Nomor 44/I/Tahun 2021 tentang Pengesahan Dokumen Pelaksanaan Anggaran Sekretariat Daerah Provinsi Sulawesi Selatan Tahun 2021.</td>
        </tr>
        <tr>
            <td valign="top">2.</td>
            <td>Keputusan Gubernur Sulawesi Selatan Nomor 112/I/Tahun 2021 tentang Pedoman Pegawai Non Aparatur Sipil Negara pada Pemerintah Provinsi Sulawesi Selatan.</td>
        </tr>
        <tr>
            <td valign="top">3.</td>
            <td>Keputuaan Sekretaris Daerah Provinsi Sulawesi Selatan Nomor 800/155/III/BKD tentang Penetapan Pegawai Non Aparatur Sipil Negara Lingkup Pernerintah Provinsi Sulawesi Selatan Tahun Anggaran 2021</td>
        </tr>
    </table>
    <div style="width: 21cm; text-align: justify;margin-bottom: 10cm">
        <p style=";margin-left: 50px;margin-right: 40px">
            Maka PIHAK PERTAMA dan PIHAK KEDUA selenjutnya disebut “Para Pihak” sepakat dan setuju untuk rnelakukan Surat Perjanjian Kerja (SPK) dengan ketentuan dan syarat – syarat yang disepakati sebagai berikut:
        </p>
    </div>
    <br>
    <br>
    <br>
    <div style="margin-bottom: 1cm">
        <div style="width: 21cm" style="margin-top: 4cm">
            <center>
                <label style="font-size: 12px;font-weight: bold;">Pasal 1</label><br>
                <label style="font-size: 12px;font-weight: bold;">KLASIFIKASI KERJA & JANGKA WAKTU PERJANJIAN</label><br>
            </center>
        </div>
        <table style="margin-left: 80px;text-align: justify;margin-top: 20px">
            <tr>
                <td style="width: 20px">1)</td>
                <td>PIHAK PERTAMA setuju menempatkan PIHAK KEDUA pada tugas dengan klasifikasi yaitu</td>
            </tr>
        </table>
        <table style="margin-left: 100px;text-align: justify;margin-right: 40px">
            <tr>
                <td>Nama Posisi / Tugas</td>
                <td>: <?=strtoupper($pegawai['jabatan'])?></td>
            </tr>
            <tr>
                <td>Bagian</td>
                <td>: MATERI DAN KOMUNIKASI PIMPINAN</td>
            </tr>
            <tr>
                <td>Lokasi Kerja</td>
                <td>: BIRO ADMINISTRASI PIMPINAN</td>
            </tr>
        </table>
        <table style="margin-left: 80px;text-align: justify;margin-top: 20px;margin-right: 40px">
            <tr>
                <td style="width: 20px" valign="top">2)</td>
                <td>Apabila terjadi perubahan klasifikasi Posisi/Tugas karena Kepentingan/kebutuhan Bidang Kerja, maka PIHAK KEDUA bersedia menerima perubahan klasifikasi kerja tersebut sepanjang tidak mengakibatkan penurunan skala gaji PIHAK KEDUA yang tercantum Jalam perjanjian.</td>
            </tr>
        </table>
        <table style="margin-left: 80px;text-align: justify;margin-top: 20px;margin-right: 40px">
            <tr>
                <td style="width: 20px" valign="top">3)</td>
                <td>Apabila dalam masa periode kontrak kerja terdapat perubahan struktur/kebijakan komposisi kebutuhan jasa pendukung, maka PIHAK PERTAMA berwenang untuk rnelakukan review dan/atau pemutusan kontrak.</td>
            </tr>
        </table>
        <table style="margin-left: 80px;text-align: justify;margin-top: 20px;margin-right: 40px">
            <tr>
                <td style="width: 20px" valign="top">4)</td>
                <td>Disamping tugas tersebut pada ayat (1) pasal ini, PIHAK PERTAMA berkewenangan untuk memberikan tugas lain kepada PIHAK KEDUA yang berkaitan dengan tugas pokoknya. baik sebagai tambahan maupun sebagai perluasan dari lugas yang telah dnetapkan.</td>
            </tr>
            <tr>
                <td style="width: 20px" valign="top">5)</td>
                <td>Perjanjian Kerja ini berlaku sejak Tanggal 04 Jabuari 2021 dan akan brakhir 31 Desember 2021.</td>
            </tr>
        </table>
        <br>
        <div style="width: 21cm" style="margin-top: 4cm">
            <center>
                <label style="font-size: 12px;font-weight: bold;">Pasal 2</label><br>
                <label style="font-size: 12px;font-weight: bold;">PEMBAYARAN JASA</label><br>
            </center>
        </div>
        <table style="margin-left: 80px;text-align: justify;margin-top: 20px;margin-right: 40px">
            <tr>
                <td style="width: 20px" valign="top">1)</td>
                <td>PIHAK KEDUA berhak atas Pembayaran Jasa sebagai berikut:</td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <table>
                        <tr>
                            <td>-</td>
                            <td>Pembayaran Jasa : 3.100 000,-</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="width: 20px" valign="top">2)</td>
                <td>Pembayaran Jasa dilakukan setiap awal bulan berikutnya, apabila terdapat hari libur pada tanggal tersebut, maka Pembayaran Jasa akan dibayarkan pada hari kerja pertama setelahnya.</td>
            </tr>
            <tr>
                <td style="width: 20px" valign="top">3)</td>
                <td>Proses pembayaran jasa dilakukan dengan Transfer Non Tunai (TNT).</td>
            </tr>
        </table>
        <div style="margin-bottom: 0.4cm"></div>
        <div style="width: 21cm" style="margin-top: 3cm">
            <center>
                <label style="font-size: 12px;font-weight: bold;">Pasal 3</label><br>
                <label style="font-size: 12px;font-weight: bold;">HARI DAN JAM KERJA</label><br>
            </center>
        </div>
        <table style="margin-left: 80px;text-align: justify;margin-top: 20px;margin-right: 40px">
            <tr>
                <td style="width: 20px" valign="top">1)</td>
                <td>Hari kerja pada Biro Administrasi Pimpinan adalah 5 (lima) hari kerja seminggu</td>
            </tr>
            <tr>
                <td style="width: 20px" valign="top">2)</td>
                <td>Pencatatan waktu kerja pada Biro Administrsi dengan menggunakan Mesin <i>Finger Print</i> dan /atau Absen Menual serta PIHAK KEDUA wajib mencatatkan kehadiran dan/atau kepulanganya sesuai pengaturan waktu yang telah ditetapkan</td>
            </tr>
            <tr>
                <td style="width: 20px" valign="top">3)</td>
                <td>Pengaturan Jam Kerja ditentuakan sebagai berikut:</td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <table>
                        <tr>
                            <td>-</td>
                            <td>Senin</td>
                            <td>: jam 07.30 s/d 15.45</td>
                        </tr>
                        <tr>
                            <td>-</td>
                            <td>Selasa s/d Kamis</td>
                            <td>: jam 08.00 s/d 16.15</td>
                        </tr>
                        <tr>
                            <td>-</td>
                            <td>Jum'at</td>
                            <td>: jam 07.30 s/d 16.15</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Istirahat Senin s/d Kamis</td>
                            <td>: jam 12.00 s/d 13.00</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Istirahat Jum'at</td>
                            <td>: jam 11.45 s/d 13.00</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="width: 20px" valign="top">4)</td>
                <td>Apabila terdapat kelebihan jam kerja melebihi ketentuan pada ayat (3) dikarenakan adanya pekerjaan yang harus segera diselesaikan atau bersifat mendesak, maka PIHAK KEDUA wajib menyelesaikan tugas tersebut.</td>
            </tr>
        </table>
        <br>
        <br>
        <br><br><br><br><br><br>
        <table style="margin-left: 80px;text-align: justify;margin-top: 20px;margin-right: 40px">
            <tr>
                <td style="width: 20px" valign="top">5)</td>
                <td>Adapun biaya yang timbul selama pelaksanaan tugas tersebut menjadi tanggung jawab masing-masing Bagian.</td>
            </tr>
        </table>
        <div style="margin-bottom: 1cm"></div>
        <div style="width: 21cm" style="margin-top: 4cm">
            <center>
                <label style="font-size: 12px;font-weight: bold;">Pasal 4</label><br>
                <label style="font-size: 12px;font-weight: bold;">CUTI DAN PROSEDUR PENINJAUANNYA</label><br>
            </center>
        </div>
        <table style="margin-left: 80px;text-align: justify;margin-top: 20px;margin-right: 40px">
            <tr>
                <td style="width: 20px" valign="top">1)</td>
                <td>Cuti diberikan kepada pegawai non ASN dengan ketentuan:</td>
            </tr>
            <tr>
                <td style="width: 20px" valign="top"></td>
                <td>
                    <table>
                        <tr>
                            <td valign="top">a.</td>
                            <td>Cuti Tahunan palinglama 12 (dua belas) hari kerja dan dapat ditambah paling lama 14 (empat belas) hari kerja (diberikan apabila telah bekerja paling lama 3 (tiga) tahun secara terus menerus).</td>
                        </tr>
                        <tr>
                            <td valign="top">b.</td>
                            <td>Cuti Sakit paling lama 1 (satu) bulan dan dapat ditambah paling lama 1 (satu) bulan (diberikan apabila sakit lebih dari 3 (tiga) hari dengan ketentuan mengajukan permintaan secara tertulis dengan melampirkan surat keterangan sakit dari dokter dan apabila diyakini tidak dapat rnenjalankan tugasnya vang dibuktikan ketetrangan tim pemeriksa dokter setelah diperpanjang maka  dilakukan pemutusan kerja).</td>
                        </tr>
                        <tr>
                            <td valign="top">c.</td>
                            <td>Cuti Bersalin selama 1 (satu) bulan sebelum dan 2 (dua) sesudah bersalin (diberikan apabila melahirkan anak pertama, kedua dan ketiga)</td>
                        </tr>
                        <tr>
                            <td valign="top">c.</td>
                            <td>Cuti Bersalin selama 1 (satu) bulan sebelum dan 2 (dua) sesudah bersalin (diberikan apabila melahirkan anak pertama, kedua dan ketiga)</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="width: 20px" valign="top">2)</td>
                <td>Prosedur pengajuan cuti dilakukan secara tertulis paling lambat 1 minggu sebelum pelaksanaan cuti.</td>
            </tr>
            <tr>
                <td style="width: 20px" valign="top">3)</td>
                <td>Cuti berlaku setelah mendapathan persetujuan atasan langsung</td>
            </tr>
        </table>
        <div style="margin-bottom: 1cm"></div>
        <div style="width: 21cm" style="margin-top: 4cm">
            <center>
                <label style="font-size: 12px;font-weight: bold;">Pasal 5</label><br>
                <label style="font-size: 12px;font-weight: bold;">PENILAIAN KINERJA DAN KEDISIPLINAN</label><br>
            </center>
        </div>
        <table style="margin-left: 80px;text-align: justify;margin-top: 20px;margin-right: 40px">
            <tr>
                <td style="width: 20px" valign="top">1)</td>
                <td>PIHAK PERTAMA melalui Kepala Bagian Perencanaan dan Kepegawaian berkoordinasi dengan Kepala Bagian masing-masing menjelaskan tugas dan tanggung jawab PIHAK KEDUA.</td>
            </tr>
            <tr>
                <td style="width: 20px" valign="top">2)</td>
                <td>PIHAK PERTAMA melalui Kepala Bagian Perencanaan dan Kepegawaian menugaskan kepada Sub Bagian Tata Usaha Biro berkoordinasi para Kepala Sub Bagran untuk melakukan Evaluasi Kinerja dan Kedisiplinan (format terlampir) terhadap PIHAK KEDUA terkait tugas dan tanggungjawabnya dan merekapitulasi akumulasi kehadiran setiap 1 (satu) bulan.</td>
            </tr>
        </table>
        <div style="margin-bottom: 1cm"></div>
        <div style="width: 21cm" style="margin-top: 4cm">
            <center>
                <label style="font-size: 12px;font-weight: bold;">Pasal 6</label><br>
                <label style="font-size: 12px;font-weight: bold;">TATA TERTIB DAN PENEGAKAN DISIPLIN</label><br>
            </center>
        </div>
        <table style="margin-left: 80px;text-align: justify;margin-top: 20px;margin-right: 40px">
            <tr>
                <td style="width: 20px" valign="top">1)</td>
                <td>PIHAK KEDUA wajib mematuki dan mentaati seluruh Tata Tertib Biro Administrasi Pimpinan baik yang diatur dalam Peraturan Biro Administrasi Pimpinan, Perjanjian Kerja, maupun Tata Tertib yang ditempkan oleh atasan.</td>
            </tr>
            <tr>
                <td style="width: 20px" valign="top">2)</td>
                <td>Pelanggaran terhadap peratura-peraturan tersebut diatas dapat mengakibatkan PIHAK KEDUA dijatuhi Sanksi berupa :</td>
            </tr>
            <tr>
                <td style="width: 20px" valign="top"></td>
                <td>
                    <table>
                        <tr>
                            <td>a.</td>
                            <td>Surat Peringatan I, II dan III</td>
                        </tr>
                        <tr>
                            <td>b.</td>
                            <td>Skorsing / Pemberhentian Sementara</td>
                        </tr>
                        <tr>
                            <td>c.</td>
                            <td>Pemutusan Hubungan Kerja</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="width: 20px" valign="top">3)</td>
                <td>Tata Tertib Adtministrasi Pimpinan antara lain, PIHAK KEDUA diwajibkan :</td>
            </tr>
        </table>
        <br><br><br><br><br><br><br>
        <table style="margin-left: 80px;text-align: justify;margin-top: 20px;margin-right: 40px">
            <tr>
                <td style="width: 20px" valign="top"></td>
                <td>
                    <table>
                        <tr>
                            <td valign="top">a.</td>
                            <td>Hadir ditempat kerja tepat waktu dan bekerja tepat waktu, sesuai ketentuan jam kerja yang telah ditetapkan.</td>
                        </tr>
                        <tr>
                            <td valign="top">b.</td>
                            <td>Melakukan pencatatan kehadiran pada Mesin Finger Print dan/atau Absen Manual kehadiran yang telah disiapkan, baik waktu masuk dan waktu pulang kerja.</td>
                        </tr>
                        <tr>
                            <td valign="top">c.</td>
                            <td>Memelihara hubungan baik dengan sesama rekan kerja, dengan atasan/pimpinan, maupun dengan seluruh Pegawai dalam lingkungan kerja di Biro Administrasi Pimpinan</td>
                        </tr>
                        <tr>
                            <td valign="top">d.</td>
                            <td>Melaksanakan seluruh tugas dan kewajibannya sesuai Uraian Tugas dan TanggungJawab (Job Description) dan mengikuti Prosedur kerja sesuai Standar Operasional Prosedur (SOP) serta petunjuk dan instruksi yang diberikan oleh Kepala Bidang masing-masing.</td>
                        </tr>
                        <tr>
                            <td valign="top">e.</td>
                            <td>Memakai pakaian dinas (abu-abu) beserta atributnya sebagaimana diatur dalam Peraturan Gubernur Sulawesi Selatan Nomor 35 Tahun 2016 tentang pakaian Dinas Pegawai Aparatur Sipil Negara di Linkkungan Pemerintah Dearah Provinsi Sulawesi Selatan.</td>
                        </tr>
                        <tr>
                            <td valign="top">f.</td>
                            <td>Menjaga nama baik Biro Administrasi Pimpinan, dan memelihara dengan haik barang inventaris lingkup Biro Administrasi Pimpinan serta melaporkan segera kepada PIHAK PERTAMA, bila menemukan hal-hal yank dapat menimbulkan kerugian/kehilangan.</td>
                        </tr>
                        <tr>
                            <td valign="top">g.</td>
                            <td>Tidak dibenarkan meninggalkan tempat karja tampa izin atasan selama jam kerja herlangsung.</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <div style="margin-bottom: 1cm"></div>
        <div style="width: 21cm" style="margin-top: 4cm">
            <center>
                <label style="font-size: 12px;font-weight: bold;">Pasal 7</label><br>
                <label style="font-size: 12px;font-weight: bold;">JANGKA WAKTU KONTRAK KERJA</label><br>
            </center>
        </div>
        <table style="margin-left: 80px;text-align: justify;margin-top: 20px;margin-right: 40px">
            <tr>
                <td style="width: 20px" valign="top">1)</td>
                <td>Perjanjian Kerja ini berlaku selama 1 tahun anggaran dimulai dari Januari 2021 - Desember 2021.</td>
            </tr>
            <tr>
                <td style="width: 20px" valign="top">2)</td>
                <td>Pemutusan kerja dapat dilakukan apabila melanggar ketentuan sebagaimana diatur dalam Keputusan Gubernur Sulawesi Selatan Nomor 112/I/Tahun 2021 tentang Pedoman Pegawai Non Aparatur Sipil Negara pada Pemerintah Provinsi Sulawesi Selatan.</td>
            </tr>
            <tr>
                <td style="width: 20px" valign="top">3)</td>
                <td>PIHAK KEDUA tidak akan menuntut kepada PIHAK PERTAMA untuk diangkat menjadi Pegawai Tetap/Aparatur Sipil Negara (ASN).</td>
            </tr>
        </table>
        <div style="margin-bottom: 1cm"></div>
        <div style="width: 21cm" style="margin-top: 4cm">
            <center>
                <label style="font-size: 12px;font-weight: bold;">Pasal 8</label><br>
                <label style="font-size: 12px;font-weight: bold;">TATA CARA PENYELESAIAN KELUH KESAH</label><br>
            </center>
        </div>
        <table style="margin-left: 80px;text-align: justify;margin-top: 20px;margin-right: 40px">
            <tr>
                <td style="width: 20px" valign="top">1)</td>
                <td>Apabila timbul perselisihan dari salah satu pihak atau kedua belah pihak atas keadaan tertentu sedapat mungkin diselesaikan secara musyawarah dan mufakat.</td>
            </tr>
            <tr>
                <td style="width: 20px" valign="top">2)</td>
                <td>Apabila tidak menemukan solusi, maka dapat diteruskan kepada Atasan yang lebih tinggi untuk mendapat solusi terbaik.</td>
            </tr>
        </table>
        <div style="width: 21cm; text-align: justify;margin-bottom: 0.4cm">
            <p style=";margin-left: 50px;margin-right: 40px">
                Demikian Perjanjian Kerja ini dibuat dan ditandatangani dengan sukarela oleh Para Pihak dalam rangkap 2 (dua) yang dibubuhi materai, sehingga mempunyai kekuatan hukum yang tetap untuk masing-masing pihak.
            </p>
        </div>
    </div>
    <table style="width: 21cm; margin-top: 15px;margin-left: 30px;">
        <tr>
            <td style="width: 5%;"></td>
            <td style="width: 55%;"></td>
            <td style="width: 45%;">
                <label style=";margin-left: 25px;">Ditetapkan di : Makassar</label>
            </td>
            <td style="width: 5%;"></td>
        </tr>
        <tr>
            <td style="width: 5%;"></td>
            <td style="width: 55%;"></td>
            <td style="width: 45%;">
                <label style=";margin-left: 25px;">Pada Tanggal : <?=$tgls?></label>
            </td>
            <td style="width: 5%;"></td>
        </tr>
        <tr>
            <td style="width: 5%;"></td>
            <td style="width: 55%;">PIHAK PERTAMA</td>
            <td style="width: 45%;">
                <label style=";margin-left: 25px;">PIHAK KEDUA</label><br>
                <label></label>
            </td>
            <td style="width: 5%;"></td>
        </tr>
        <tr>
            <td style="width: 5%;"></td>
            <td style="width: 55%;"><?=$penilai['nama']?></td>
            <td style="width: 45%;height: 100px">
                <u><label style="width: 6cm;margin-left: 25px;"></label></u><br>
                <label style="width: 6cm;;margin-left: 25px"><?=$pegawai['nama']?></label>
            </td>
            <td style="width: 5%;"></td>
        </tr>
    </table>

    <script>
        window.print();
    </script>
    <!--<CENTER>-->
    <!--<div style="margin-top: 25px">-->
    <!--	<label style="font-size: 12px;font-weight: bold;">SURAT PANGGILAN</label>-->
    <!--</div>-->
    <!--<hr style="width: 3.2cm;" colos="black"/>-->
    <!--<label style="font-size: 12px;font-weight: bold;">Nomor Surat : 123456</label>-->
    <!--</CENTER>-->

</div>

</body>
</html>