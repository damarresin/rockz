<h2>Page heading</h2>
<input type=button value='Tambah Berita' onclick="window.location.href='index.php?hal=tambah'">
<?
include '../../conn/config.php';
echo "<table border='2' width='100%' >";
echo "<tr><th>Judul</th><th>Date</th><th>Hapus</th><th>Edit</th></tr>";
$show="select * from artikel";
$query=mysql_query($show);
while ($row=mysql_fetch_array($query)){

echo "<tr><td>".$row['judul']."</td><td>".$row['date']."</td><td><a href='index.php?hal=hapus&id=".$row['id']."'>Hapus</a></td><td><a href='index.php?hal=edit&id=".$row['id']."'>Edit</a></td></tr>";
};
echo "</table>";
?>