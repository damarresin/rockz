<?php
include('../conn/config.php');

session_start();

// terima data dari form login
$username = $_POST['username'];
$password = md5($_POST['password']);

// untuk mencegah sql injection
// kita gunakan mysql_real_escape_string
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);

// cek data yang dikirim, apakah kosong atau tidak
if (empty($username) && empty($password)) {
	// kalau username dan password kosong
	header('location:../index.php?hal=login-again&error=1');
	break;
} else if (empty($username)) {
	// kalau username saja yang kosong
	header('location:../index.php?hal=login-again&error=2');
	break;
} else if (empty($password)) {
	// kalau password saja yang kosong
	header('location:../index.php?hal=login-again&error=3');
	break;
}

$query = mysql_query("select * from users where username='$username' and password='$password'");

$data = mysql_fetch_array($query);

if (mysql_num_rows($query) == 1) {
	// kalau username dan password sudah terdaftar di database
	// buat session dengan nama username dengan isi nama user yang login
	$_SESSION['username'] = $username;
	$_SESSION['role'] = $data['role'];
	
	// redirect ke halaman users [menampilkan semua users]
	header('location:../');
} else {
	// kalau username ataupun password tidak terdaftar di database
	header('location:../index.php?hal=login-again&error=4');
}
?>