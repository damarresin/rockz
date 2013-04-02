<?
$id=$_GET['id'];
include 'koneksi/koneksi.php';
$hapus = "delete from tabel_pesan where nomor='$id'";
$query=mysql_query($hapus);
echo $hapus;
header("location:index.php");
?>

