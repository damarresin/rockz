<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<?php
 session_start(); 
if(empty($_SESSION['user'])){
echo "<SCript>window.alert('anda belum login')</script>";
echo "<meta http-equiv='refresh' content='0; url=../../'>"; }else {

//misal anda login sebagai user dengan id=budi
$_SESSION['userid'] = "damar";
?>
<h2>Page heading</h2>

<div id="kepala">
<span id="pesan">
Pesan
<span id="notifikasi"></span>
</span>
<span id="home">>></span>
</div>
<div id="info">
    <div id="loading"><br>Loading...<img src="loading.gif"></div>
    <div id="konten-info">
    </div>
</div>

<?
include '../koneksi/koneksi.php';
echo "<table border='2' width='100%' >";
echo "<tr><th>Terbaca</th><th>Dari</th><th>Tanggal</th><th>Hapus</th></tr>";
$show="select * from tabel_pesan";
$query=mysql_query($show);
while ($row=mysql_fetch_array($query)){

echo "<tr><td>".$row['sudahbaca']."</td><td>".$row['dari']."</td><td>".$row['waktu']."</td><td><a href='hapus.php?id=".$row['nomor']."'>Hapus</a></td></tr>";
};
echo "</table>";
?>


<?
}
 ?>
