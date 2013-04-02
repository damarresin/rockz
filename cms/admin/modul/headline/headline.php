<h2>Page heading</h2>
<?
include '../../conn/config.php';
echo "<table border='2' width='100%' >";
echo "<tr><th>Judul</th><th>Date</th><th>Edit</th></tr>";
$show="select * from sekilas_info";
$query=mysql_query($show);
while ($row=mysql_fetch_array($query)){

echo "<tr><td>".$row['nama']."</td><td>".$row['date']."</td><td><a href='index.php?hal=edit-headline&id=".$row['id_seinfo']."'>Edit</a></td></tr>";
};
echo "</table>";
?>