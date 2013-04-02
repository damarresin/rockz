<?
$id=$_GET['id'];
include '../../conn/config.php';
$hapus = "delete from artikel where id='$id'";
$query=mysql_query($hapus);
echo $hapus;
header("location:index.php?hal=content");
?>

