<input type=button value='Back' onclick="window.location.href='index.php?hal=akun-cms'">
<h2>Ganti Password</h2>
</div>
<form method='post' action=''>
<?
error_reporting(0);
$id=$_GET['id'];
include './koneksi/koneksi.php';
$show="select * from user_cms where id='$id'";
$query=mysql_query($show);
$row = mysql_fetch_array($query);

echo "Username:<br>";
echo "<input type='text' name='user' value='".$row['user']."'><br>";
echo "Password Lama:<br>";
echo "<input type='password' name='passlama' value=''><br>";
echo "Password Baru:<br>";
echo "<input type='password' name='passbaru' value=''><br>";
echo "<input type='submit' value='Update' name='ubah'>";
echo "</form>";

$passlama=md5($_POST['passlama']);
$query = mysql_query("select * from user_cms where pass='$passlama'");

$data = mysql_fetch_array($query);

if (mysql_num_rows($query) == 1) {

if(isset($_POST['ubah'])){
$update="update user_cms set user='".$_POST['user']."' ,pass='".md5($_POST['passbaru'])."' where id='$id'";
$simpan=mysql_query($update);
if ($simpan){
echo "<script>window.alert('telah di edit')</script>";
echo "<meta http-equiv='refresh' content='0; url=index.php?hal=akun-cms'>";
 }
else{
echo "<script>window.alert('Kesalahan Password Tidak SAMA')</script>"; 
}
}
}
?>