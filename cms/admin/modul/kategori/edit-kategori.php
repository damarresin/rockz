<h2>Page heading</h2>
<input type=button value='Back' onclick="window.location.href='index.php?hal=kategori'">

<form method='post' action=''>
<?
$id=$_GET['id'];
include '../../conn/config.php';
$show="select  * from kategori where id_kategori='$id'";
$query=mysql_query($show);
$row = mysql_fetch_array($query);


echo "Nama:<br>";
echo "<input type='text' name='nama_kategori' value='".$row['nama_kategori']."'><br>";
echo "Seo:<br>";
echo "<input type='text' name='seo_kategori' value='".$row['seo_kategori']."'>";
echo "<input type='submit' value='Update' name='ubah'>";
echo "</form>";

if(isset($_POST['ubah'])){
$update="update kategori set nama_kategori='".$_POST['nama_kategori']."' ,seo_kategori='".$_POST['seo_kategori']."' where id_kategori='$id'";
$simpan=mysql_query($update);
if ($simpan){
echo "<script>window.alert('Kategori telah di Update')</script>";
echo "<meta http-equiv='refresh' content='0; url=index.php?hal=kategori'>";
 };
}
?>
