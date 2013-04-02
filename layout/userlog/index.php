<?php 
session_start();
$logged_in = false;
//jika session username belum dibuat, atau session username kosong
if (isset($_SESSION['username']) || !empty($_SESSION['username'])) {
	$logged_in = true;
}
include_once('../koneksi/config.php');
?>
			<?php
			// jika user yang login memiliki role sebagai admin, maka tampilkan opsi ini
			if ($_SESSION['role'] == 'admin') {
			?>


<html>
<title>Rockz With Me</title>
<link href='../html/images/with-icon.png' rel='SHORTCUT ICON'/> <!--icon address bar-->
</html>

<?php } else { ?>
<?
echo "<script>window.alert('Terjadi kesalahan')</script>";
echo "<meta http-equiv='refresh' content='0; url=../index.php'>";
}
?>