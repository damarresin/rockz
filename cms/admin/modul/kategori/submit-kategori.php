<?
include '../../conn/config.php';
$nama_kategori 	= mysql_real_escape_string($_POST['nama_kategori']);
$seo_kategori 	= mysql_real_escape_string($_POST['seo_kategori']);
$simpan="insert into kategori(nama_kategori,seo_kategori) values('$nama_kategori','$seo_kategori')";
$query= mysql_query($simpan);
if ($query) {
echo "<script>window.alert('Kategori telah ditambahkan')</script>";
echo "<meta http-equiv='refresh' content='0; url=index.php?hal=kategori'>";
} else {echo "<script>window.alert('Terjadi kesalahan')</script>";
echo "<meta http-equiv='refresh' content='0; url=index.php?hal=tambah-kategori'>";
};
 ?>