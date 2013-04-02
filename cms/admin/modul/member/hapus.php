<?
$id=$_GET['id'];
include '../koneksi/koneksi.php';
$hapus = "delete from users where id_user='$id'";
$query=mysql_query($hapus);
echo $hapus;
echo "<meta http-equiv='refresh' content='0; url=./index.php?hal=member'>";
?>

