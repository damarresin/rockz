<input type=button value='Tambah User' onclick="window.location.href='index.php?hal=tambah-member'">
<h2>Manajemen User</h2>
<?
include '../koneksi/koneksi.php';
echo "<table border='2' width='100%' >";
echo "<tr><th>Username</th><th>Fullname</th><th>Email</th><th>Status</th><th>Hapus</th><th>Edit</th></tr>";
$show="select * from users";
$query=mysql_query($show);
while ($row=mysql_fetch_array($query)){

echo "<tr><td>".$row['username']."</td><td>".$row['fullname']."</td><td>".$row['email']."</td><td>".$row['role']."</td><td><a href='index.php?hal=hapus-member&id=".$row['id_user']."'>Hapus</a></td><td><a href='index.php?hal=edit-member&id=".$row['id_user']."'>Edit</a></td></tr>";
};
echo "</table>";
?>
