<input type=button value='Back' onclick="window.location.href='index.php?hal=member'">
<h2>Ganti Password</h2>
</div>
<form name="update" method='post' action='' onsubmit="return validateForm();">
<?
error_reporting(0);
$id=$_GET['id'];
include '../koneksi/koneksi.php';
$show="select * from users where id_user='$id'";
$query=mysql_query($show);
$row = mysql_fetch_array($query);

echo "Username:<br>";
echo "<input type='text' name='username' value='".$row['username']."'disabled='disabled'><br>";
echo "Fullname:<br>";
echo "<input type='text' name='fullname' value='".$row['fullname']."'><br>";
echo "Email:<br>";
echo "<input type='text' name='email' value='".$row['email']."'><br>";
echo "Password:<br>";
echo "<input type='password' name='password' value='".$row['password']."'><br>";
echo "Role<br>";
				echo "<select name='role'>
					<option value='admin'>Admin</option>
					<option value='member' selected>Member</option>
				</select><br>";
echo "<input type='submit' value='Update' name='ubah'>";

if(isset($_POST['ubah'])){
$update="update users set fullname='".$_POST['fullname']."' ,password='".md5($_POST['password'])."' ,email='".$_POST['email']."' ,role='".$_POST['role']."' where id_user='$id'";
$simpan=mysql_query($update);
if ($simpan){
echo "<script>window.alert('telah di edit')</script>";
echo "<meta http-equiv='refresh' content='0; url=index.php?hal=member'>";
 }
}
?>
</form>