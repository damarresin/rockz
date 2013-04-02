<?php 
include_once('conn/config.php');

// terima data dari halaman index.php
$username 	= mysql_real_escape_string($_POST['username']);
$password 	= md5($_POST['password']);
$email		= mysql_real_escape_string($_POST['email']);
$fullname	= mysql_real_escape_string($_POST['fullname']);
$role		= 'member'; // variabel untuk settingan default level yang mendaftar

// simpan data ke database
$query = mysql_query("insert into users values('', '$username', '$password', '$email', '$fullname', '$role')");

if ($query) {
	// jika berhasil menyimpan
	echo "<script>window.alert('Terdaftar, dan coba login')</script>";
	header('location: ./index.php?hal=home&msg=success');
} else {
	// jika gagal menyimpan
	echo "<script>window.alert('Terjadi kesalahan, mohon coba lagi')</script>";
	header('location: ./index.php?hal=home&msg=failed');
}
?>

			<div class="main">
				<div class="indent-left">
<div style="margin:auto">
	<form action="auth.php" method="post" style="width:500px; margin:auto;">
		<fieldset class="rounded_3">
			<legend>Login</legend>
			<center><strong>:::Warning:::</strong></center>
			<h4>1. Anda belum register menjadi anggota. Klik Daftar Baru untuk PENDAFTARAN GRATIS, atau isi form login di bawah apabila anda sudah menjadi member</h4>
			<h4>2. Atau! proses registrasi member belum lengkap, butuh posting di forum terbuka dulu atau butuh verifikasi email. Cek email & lakukan proses aktifasi. Atau hubungi kami</h4>
			<h4>3. Atau! link yang anda ketik salah.</h4>
			<h3>Jadilah Member untuk akses info ke semua halaman TANPA BATAS</h3>
			<div>
				<label for="username">Username</label> <input id="username" name="username" class="wide" type="text" required="required" />
			</div>
			<div>
				<label for="password">Password</label> <input id="password" name="password" class="wide" type="password" required="required" />
			</div>
			<div>
				<span class="left"><a href="home.php">Daftar Baru</a></span>
				<input class="right" type="submit" name="submit" value="Login" />
			</div>
		</fieldset>
	</form>
</div>

		</div>
			</div>