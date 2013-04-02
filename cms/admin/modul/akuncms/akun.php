<input type=button value='Tambah User' onclick="window.location.href='index.php?hal=tambah-akun'">
<h2>Admin</h2>
<?
include './koneksi/koneksi.php';
echo "<table border='2' width='100%' >";
echo "<tr><th>Username</th><th>Hapus</th><th>Ganti Pass</th></tr>";
$show="select * from user_cms";
$query=mysql_query($show);
while ($row=mysql_fetch_array($query)){

echo "<tr><td>".$row['user']."</td><td><a href='index.php?hal=hapus-akuncms&id=".$row['id']."'>Hapus</a></td><td><a href='index.php?hal=gantipass-akuncms&id=".$row['id']."'>Edit</a></td></tr>";
};
echo "</table>";
?>