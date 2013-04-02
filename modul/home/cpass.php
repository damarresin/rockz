<form class="rounded_3" action="" method="post" style="margin:auto;">
		<fieldset class="rounded_3">
			<legend>Change Password</legend>

			<?
error_reporting(0);
$id=$_GET['id'];
include 'conn/config.php';
$username = $_SESSION['username'];
$show="select * from users where username='$username'";
$query=mysql_query($show);
$row = mysql_fetch_array($query);

echo "Username:<br>";
echo "<input type='text' name='user' value='".$row['username']."'disabled='disabled'><br>";
echo "Password Lama:<br>";
echo "<input type='password' name='passlama' value=''><br>";
echo "Password Baru:<br>";
echo "<input type='password' name='passbaru' value=''><br>";
echo "<input type='submit' value='Save' name='ubah'>";
echo "<a href='.'><input class='left' type='button' value='Cancel' /></a>";
echo "</form>";

$passlama=md5($_POST['passlama']);
$query = mysql_query("select * from users where password='$passlama'");

$data = mysql_fetch_array($query);

if (mysql_num_rows($query) == 1) {

if(isset($_POST['ubah'])){
$update="update users set password='".md5($_POST['passbaru'])."' where username='$username'";
$simpan=mysql_query($update);
if ($simpan){
echo "<script>window.alert('Sukses Ganti Password')</script>";
echo "<meta http-equiv='refresh' content='0; url=index.php?hal=akun-cms'>";
 }
else{
echo "<script>window.alert('Kesalahan Kemungkinan Password Tidak SAMA')</script>"; 
}
}
}
?>