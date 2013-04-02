<?php
include 'conn/config.php';
$nama=addslashes($_POST['nama']);
$email=addslashes($_POST['email']);
$komentar=addslashes($_POST['komentar']);
$judul=addslashes($_POST['judul']);
$ava=addslashes($_POST['ava']);
$simpan="insert into komentar(nama,komentar,email,judul,ava) values('$nama','$komentar','$email','$judul','$ava')";
$query=mysql_query($simpan);
if ($query) {
echo "<script>window.alert('Komentar Telah dikirim')</script>";
//echo "<meta http-equiv='refresh' content='0; url=index.php'>";
} else {echo "<script>window.alert('Terjadi kesalahan')</script>";
//echo "<meta http-equiv='refresh' content='0; url=index.php'>";
};

?>
