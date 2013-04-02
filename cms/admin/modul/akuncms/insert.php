<?php 
// terima data dari halaman index.php
$user 	= mysql_real_escape_string($_POST['user']);
$pass 	= md5($_POST['pass']);

// simpan data ke database
$query = mysql_query("insert into user_cms values('$user', '$pass','')");

if ($query) {
	// jika berhasil menyimpan
	echo "<script>window.alert('Terdaftar, dan coba login')</script>";
	echo "<meta http-equiv='refresh' content='0; url=./index.php?hal=akun-cms'>";
} else {
	// jika gagal menyimpan
	echo "<script>window.alert('Terjadi kesalahan, mohon coba lagi')</script>";
	echo "<meta http-equiv='refresh' content='0; url=../../index.php?hal=tambah-akun'>";
}
?>