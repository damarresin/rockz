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
<ul class="list-2">			
					<?php
					$kode_kategori = $_GET['id_kategori'];					
					$dataPerPage = 6;
					//error_reporting(0);
					if(isset($_GET['page']))
					{
					$noPage = $_GET['page'];
					}
					else $noPage = 1;
					$offset = ($noPage - 1) * $dataPerPage;
					$query = "SELECT * FROM artikel where id_kategori=$kode_kategori LIMIT $offset, $dataPerPage";
					$result = mysql_query($query) or die('Error');
					echo "";
					while($data = mysql_fetch_array($result))
					{
					echo "<li><h3>".$data['judul']."</h3><br/>".substr($data['artikel'],0,150)." <a href='index.php?hal=artikel-detail&id=$data[0]'>Read More . . .</a>"."<br/></li>";
					}
					$query = "SELECT COUNT(*) AS jumData FROM artikel";
					$hasil = mysql_query($query);
					$data = mysql_fetch_array($hasil);
					$jumData = $data['jumData'];
					$jumPage = ceil($jumData/$dataPerPage);
if ($logged_in)
{ echo"<center>";					
					if ($noPage > 1) echo "<a href='".$_SERVER['PHP_SELF']."?hal=kategori-artikel&id_kategori=$kode_kategori&page=".($noPage-1)."'><< Prev</a>";
					for($page = 1; $page <= $jumPage; $page++)
					{
					if ((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page == $jumPage))
					{
					if (($showPage == 1) && ($page != 2)) echo "...";
					if (($showPage != ($jumPage - 1)) && ($page == $jumPage)) echo "...";
					if ($page == $noPage) echo " <b>".$page."</b> ";
					else echo " <a href='".$_SERVER['PHP_SELF']."?hal=kategori-artikel&id_kategori=$kode_kategori&page=".$page."'>".$page."</a> ";
					$showPage = $page;
					}
					}
					if ($noPage < $jumPage) echo "<a href='".$_SERVER['PHP_SELF']."?hal=kategori-artikel&id_kategori=$kode_kategori&page=".($noPage+1)."'>Next >></a>";
echo"</center>";
}				
					?>

</ul>			
			</div>												
		</article>
		
<!--registerrrrr atau software update===================================================-->				
		<article class="col-3">

		</article>	
	</div>
</div>	