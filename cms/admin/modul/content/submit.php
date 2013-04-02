<?
include '../../conn/config.php';
$judul 	= mysql_real_escape_string($_POST['judul']);
$artikel 	= mysql_real_escape_string($_POST['artikel']);
$kategori		= mysql_real_escape_string($_POST['kategori']);
$label		= mysql_real_escape_string($_POST['label']);
$date =date("y-m-d");
$simpan="insert into artikel(judul,artikel,date,id_kategori,label) values('$judul','$artikel','$date','$kategori','$label')";
$query= mysql_query($simpan);
if ($query) {
echo "<script>window.alert('Artikel telah disubmit')</script>";
echo "<meta http-equiv='refresh' content='0; url=index.php?hal=content'>";
} else {echo "<script>window.alert('Terjadi kesalahan')</script>";
echo "<meta http-equiv='refresh' content='0; url=index.php?hal=tambah'>";
};
 ?>