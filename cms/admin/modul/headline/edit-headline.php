<h2>Headline</h2>
<input type=button value='Back' onclick="window.location.href='index.php?hal=headline'">

<form method='post' action=''>
<?
$id=$_GET['id'];
include '../../conn/config.php';
$show="select  * from sekilas_info where id_seinfo='$id'";
$query=mysql_query($show);
$row = mysql_fetch_array($query);


echo "Nama:<br>";
echo "<input type='text' name='nama' value='".$row['nama']."'><br>";
echo "Berita:<br>";
echo "<textarea cols='120' rows='6' name='berita'>".$row['berita']."</textarea><br>";
echo "<input type='submit' value='Update' name='ubah'>";
echo "</form>";

if(isset($_POST['ubah'])){
$update="update sekilas_info set nama='".$_POST['nama']."' ,berita='".$_POST['berita']."' where id_seinfo='$id'";
$simpan=mysql_query($update);
if ($simpan){
echo "<script>window.alert('Headline telah di edit')</script>";
echo "<meta http-equiv='refresh' content='0; url=index.php?hal=headline'>";
 };
}
?>
