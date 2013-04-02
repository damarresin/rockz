<h2>Page heading</h2>
<input type=button value='Tambah Kategori' onclick="window.location.href='index.php?hal=tambah-kategori'">
<?
include '../../conn/config.php';
echo "<table border='2' width='100%' >";
echo "<tr><th>Nama</th><th>Hapus</th><th>Edit</th></tr>";
$show="select * from kategori";
$query=mysql_query($show);
while ($row=mysql_fetch_array($query)){

echo "<tr><td>".$row['nama_kategori']."</td><td><a href='index.php?hal=hapus-kategori&id=".$row['id_kategori']."'>Hapus</a></td><td><a href='index.php?hal=edit-kategori&id=".$row['id_kategori']."'>Edit</a></td></tr>";
};
echo "</table>";
?>