<?
$id=$_GET['id'];
include '../koneksi/koneksi.php';
$hapus = "delete from user_cms where id='$id'";
$query=mysql_query($hapus);
echo $hapus;
echo "<meta http-equiv='refresh' content='0; url=./index.php?hal=akun-cms'>";
?>

