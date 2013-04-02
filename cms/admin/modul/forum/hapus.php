<?
$id=$_GET['ID_topik'];
include 'koneksi/koneksi.php';
$hapus = "delete from forum where ID_topik='$id'";
$query=mysql_query($hapus);
echo $hapus;
echo "<SCript>window.alert('Delete Topik Forum Sukses')</script>";
echo "<meta http-equiv='refresh' content='0; url=index.php?hal=forum'>";
?>

