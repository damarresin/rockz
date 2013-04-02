<?
$id=$_GET['id'];
include '../../conn/config.php';
$hapus = "delete from kategori where id_kategori='$id'";
$query=mysql_query($hapus);
echo $hapus;
echo "<meta http-equiv='refresh' content='0; url=index.php?hal=kategori'>";
?>

