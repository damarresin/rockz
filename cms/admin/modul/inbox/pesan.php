<?php
session_start();
$userid = $_SESSION['userid'];
include "koneksi/koneksi.php";
?>

<div id="kepala">
<span id="pesan">
Pesan
<span id="notifikasi"></span>
</span>
<span id="home"><input type=button value='Back' onclick="window.location.href='index.php?hal=home-inbox'"></span>
</div>
<div id="info">
    <div id="loading"><br>Loading...<img src="loading.gif"></div>
    <div id="konten-info">
    </div>
</div>
<h2>Baca</h2>
<div id="content">
<?php
$no = $_GET['no'];
$pesan = mysql_query("SELECT * FROM tabel_pesan WHERE nomor=$no
AND kepada='$userid'");
while($p = mysql_fetch_array($pesan)){
    echo "FROM : <br>".$p['dari']."<p>";
    echo "WAKTU : <br>".$p['waktu']."<p>";
    echo "PESAN :<BR>".$p['pesan']."<p>";
}
//set sudah dibaca = Y kalau sudah dibaca
$update = mysql_query("UPDATE tabel_pesan SET sudahbaca='Y'
WHERE nomor=$no AND kepada='$userid'");

?>

</div>