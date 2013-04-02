<h2>Page heading</h2>
<input type=button value='Back' onclick="window.location.href='index.php?hal=content'">

<form method='post' action=''>
<?
$id=$_GET['id'];
include '../../conn/config.php';
$show="select  * from artikel where id='$id'";
$query=mysql_query($show);
$row = mysql_fetch_array($query);


echo "Judul:<br>";
echo "<input type='text' name='judul' value='".$row['judul']."'><br>";
echo "Artikel:<br>";
echo "<textarea cols='120' rows='6' name='artikel'>".$row['artikel']."</textarea><br>";
echo "<select name='kategori'>";
$kat=mysql_query("SELECT * FROM kategori ORDER BY nama_kategori");
$r=mysql_fetch_array($kat);
echo "<option value=0 selected>".$r['nama_kategori']."</option>";
	$tampil=mysql_query("SELECT * FROM kategori ORDER BY nama_kategori");
    while($r=mysql_fetch_array($tampil)){
    echo "<option value=$r[id_kategori]>$r[nama_kategori]</option>";
	}
echo "</select>";
echo "label:<br>";
echo "<input type='text' name='label' value='".$row['label']."'>";
echo "<input type='submit' value='Update' name='ubah'>";
echo "</form>";

if(isset($_POST['ubah'])){
$update="update artikel set judul='".$_POST['judul']."' ,artikel='".$_POST['artikel']."' ,id_kategori='".$_POST['kategori']."' ,label='".$_POST['label']."' where id='$id'";
$simpan=mysql_query($update);
if ($simpan){
echo "<script>window.alert('Artikel telah di edit')</script>";
echo "<meta http-equiv='refresh' content='0; url=index.php?hal=content'>";
 };
}
?>
