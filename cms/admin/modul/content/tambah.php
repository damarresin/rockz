<h2>Page heading</h2>
<input type=button value='Back' onclick="window.location.href='index.php?hal=content'">

<form method='post' action='index.php?hal=submit'>
Judul:<br>
<input type='text' name='judul'><br>
Artikel:<br>
<textarea cols='100' rows='10' name='artikel'></textarea><br>

<select name='kategori'>
    <option value=0 selected>- Pilih Kategori -</option>
<? 
	include '../../conn/config.php';
	$tampil=mysql_query("SELECT * FROM kategori ORDER BY nama_kategori");
    while($r=mysql_fetch_array($tampil)){
    echo "<option value=$r[id_kategori]>$r[nama_kategori]</option>";
	}
?>
</select>
label:<br>
<input type='text' name='label'><br>
<input type='submit' value='Posting'>
</form>