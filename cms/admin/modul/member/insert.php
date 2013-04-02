<?php 
include('../../koneksi/koneksi.php');

// terima data dari halaman index.php
$username 	= mysql_real_escape_string($_POST['username']);
$password 	= md5($_POST['password']);
$email		= mysql_real_escape_string($_POST['email']);
$fullname	= mysql_real_escape_string($_POST['fullname']);
$role 		= mysql_real_escape_string($_POST['role']);

// simpan data ke database
$query = mysql_query("insert into users values('', '$username', '$password', '$email', '$fullname', '$role')");

if ($query) {
	// jika berhasil menyimpan
	echo "<script>window.alert('Terdaftar, dan coba login')</script>";
	header('location: ./../../index.php?hal=tambah-member&msg=success');
	echo "<meta http-equiv='refresh' content='0; url=index.php?hal=member'>";
} else {
	// jika gagal menyimpan
	echo "<script>window.alert('Terjadi kesalahan, mohon coba lagi')</script>";
	header('location: ../../index.php?hal=tambah-member&msg=failed');
}
?>