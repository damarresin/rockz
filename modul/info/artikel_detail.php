<div class="main">	
	<div class="wrapper">
	
		<article class="col-1">			
				<ul class="list-2">
<br/><h2>Kategori</h2>				
					<?php
					$dataPerPage = 5;
					error_reporting(0);
					if(isset($_GET['page']))
					{
					$noPage = $_GET['page'];
					}
					else $noPage = 1;
					$offset = ($noPage - 1) * $dataPerPage;
					$query = "SELECT * FROM kategori order by id_kategori desc LIMIT $dataPerPage";
					$result = mysql_query($query) or die('Error');

					while($data = mysql_fetch_array($result))
					{
					echo "<li><a href='index.php?hal=kategori-artikel&id_kategori=$data[0]'>".$data['nama_kategori']."</a><br/>"."</li>";
					}
					?>
				</ul>

	<strong>Kotak Pencarian:</strong><br>  
    <form action="<?$_SERVER['PHP_SELF']?>" method="post" name="pencarian" id="pencarian">  
    <input type="text" name="search" id="search">  
    <input type="submit" name="submit" id="submit" value="CARI">  
    </form> 
    <?php  
	error_reporting(0);
// menampilkan data  
      
    if ((isset($_POST['submit'])) AND ($_POST['search'] <> "")) {  
      $search = $_POST['search'];  
      $sql = mysql_query("SELECT * FROM artikel WHERE judul LIKE '%$search%' ") or die(mysql_error());  
      //menampilkan jumlah hasil pencarian  
      $jumlah = mysql_num_rows($sql);   
      if ($jumlah > 0) {  
        echo '<p>Ada '.$jumlah.' data yang sesuai.</p>';  
         
            while ($res=mysql_fetch_array($sql)) {  
            $nomor++; echo $nomor.'. ';  
            echo "<a href='index.php?hal=artikel-detail&id=$res[0]'>".$res[judul]."</a><br>";  
          }  
      }  
      else {  
       // menampilkan pesan zero data  
        echo 'Maaf, hasil pencarian tidak ditemukan.';  
      }  
    }   
    else { echo 'Masukkan dulu kata kuncinya';}  
    ?> 				
				
				
<div class="border-bot1 img-indent-bot"/>
		</article>		

<!--artikel list update =======================================================-->				
		<article class="col-3">
			<div class="indent-right" align="center">
			
<table width="600" border="0" align="center">
<?php
$kode_artikel = $_GET['id'];
$kueri = mysql_query(" SELECT id AS kode_artikel, judul, artikel, date "." FROM artikel WHERE id='$kode_artikel' ");
while ($baris=mysql_fetch_row($kueri)) {
echo("<br/><tr>");
echo("<td><u><h2>$baris[1]</h2></u></td>");
echo("</tr>");
echo("<tr>");
echo("<td>$baris[2]</td>");
echo("</tr>");
echo("<tr>");
$baris['3']=$date;
$date =date("d/M/yy");
echo("<td>Date : $date</td>");
echo("</tr>");
$judul = $baris['1'];
}
?>
</table>
			</div>				
<div>
           <h3>Artikel Terkait</h3>
           <?php
		   $idartikel = abs((int) $_GET['id']);
             include "modul/info/artikelterkait.php";
             artikelTerkait($idartikel);
           ?>
        </div>
<div>
<br/>
<h3>Komentar</h3>
<Form method='post' action='index.php?hal=komentar'>
<table>

<tr>
<input type="radio" name="ava" value="gambar/ava/m1.png" /><img src="gambar/ava/m1.png" height="30" width="30"/>
<input type="radio" name="ava" value="gambar/ava/m2.jpeg" /><img src="gambar/ava/m2.jpeg" height="30" width="30" />
<input type="radio" name="ava" value="gambar/ava/m3.jpg" /><img src="gambar/ava/m3.jpg" height="30" width="30" />
<input type="radio" name="ava" value="gambar/ava/m4.jpeg" /><img src="gambar/ava/m4.jpeg" height="30" width="30" />
<input type="radio" name="ava" value="gambar/ava/m5.jpg" /><img src="gambar/ava/m5.jpg" height="30" width="30" />
<input type="radio" name="ava" value="gambar/ava/m6.jpg" /><img src="gambar/ava/m6.jpg" height="30" width="30" />
<input type="radio" name="ava" value="gambar/ava/m7.gif" /><img src="gambar/ava/m7.gif" height="30" width="30" />
</tr><br/><br/><tr>
<input type="radio" name="ava" value="gambar/ava/f1.jpg" /><img src="gambar/ava/f1.jpg" height="30" width="30"/>
<input type="radio" name="ava" value="gambar/ava/f2.jpg" /><img src="gambar/ava/f2.jpg" height="30" width="30" />
<input type="radio" name="ava" value="gambar/ava/f3.jpeg" /><img src="gambar/ava/f3.jpeg" height="30" width="30" />
<input type="radio" name="ava" value="gambar/ava/f4.png" /><img src="gambar/ava/f4.png" height="30" width="30" />
<input type="radio" name="ava" value="gambar/ava/f5.jpeg" /><img src="gambar/ava/f5.jpeg" height="30" width="30" />
</tr>
<Tr><td>
<input type='hidden' name='judul' value='<?php 
echo $judul; 
?>'>

					<?php if ($logged_in) { ?>
					<?php
					$username = $_SESSION['username'];
					$query_user_login = mysql_query("select * from users where username='$username'");
					$user_login = mysql_fetch_array($query_user_login);?>
Nama :</td><Td> <input type='text' name='nama' value="<? echo $user_login['username']; ?>"></td></tr>
<tr><td>Email :</td><td><input type='text' name='email' value="<? echo $user_login['email']; ?>"></td></tr>
<tr><td>Komentar:</td><Td><textarea cols='100' rows='10' name='komentar'></textarea></td></tr>
<tr><td colspan='2'><input type='submit' name='submit' value='Komentar'></td></tr>
<?php } ?>
</table>
</form>
</div>

<?php
include 'conn/config.php';
$tampil = "select * from komentar where judul='$judul' order by id desc";
$query=mysql_query($tampil);
echo "<table>";
while ($row=mysql_fetch_array($query)){
echo "<tr>";
echo "<td><img src='".$row['ava']."' height='50' width='50'/></td></tr>"."<tr><td><h3>".$row['nama']."</h3></td>";
echo "</tr>";
echo "<tr><td></td><td><h4>Berkata : <i>".'" '.$row['komentar'].' "'."</i></h4></td></tr><tr></tr>";
echo "<tr><td></td></tr>";
}
echo "</table>";
?>	
</div>


</div>		
		</article>
		
<!--registerrrrr atau software update===================================================-->				
		<article class="col-3">

		</article>	
	</div>
</div>	