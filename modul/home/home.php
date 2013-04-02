<div class="main">	
		<div class="border-bot1 img-indent-bot">
			</div>
			<div class="slider-wrapper">
				<div class="slider">
					<ul class="items">
						<li>
							<img src="layout/images/slider-img1.jpg" alt="" />
							<strong class="banner">
							<a class="close" href="#">x</a>
<?
$show="select * from sekilas_info where id_seinfo=1";
$query=mysql_query($show);
while ($row=mysql_fetch_array($query)){

echo "<strong>".$row['nama']."</strong>";
$row['date']=$date;
$date = date("d/M/yy");
echo "<span>".$date."</span>";
echo "<b class='margin-bot'>".$row['berita']."</b>";
};
?>							
							</strong>
						</li>
						<li>
							<img src="layout/images/slider-img2.jpg" alt="" />
							<strong class="banner">
							<a class="close" href="#">x</a>
<?
$show="select * from sekilas_info where id_seinfo=2";
$query=mysql_query($show);
while ($row=mysql_fetch_array($query)){

echo "<strong>".$row['nama']."</strong>";
$row['date']=$date;
$date = date("d/M/yy");
echo "<span>".$date."</span>";
echo "<b class='margin-bot'>".$row['berita']."</b>";
};
?>		
					</strong>
						</li>
						<li>
							<img src="layout/images/slider-img3.jpg" alt="" />
							<strong class="banner">
							<a class="close" href="#">x</a>
<?
$show="select * from sekilas_info where id_seinfo=3";
$query=mysql_query($show);
while ($row=mysql_fetch_array($query)){

echo "<strong>".$row['nama']."</strong>";
$row['date']=$date;
$date = date("d/M/yy");
echo "<span>".$date."</span>";
echo "<b class='margin-bot'>".$row['berita']."</b>";
};
?>		</strong>
						</li>
						<li>
							<img src="layout/images/slider-img4.jpg" alt="" />
							<strong class="banner">
							<a class="close" href="#">x</a>
<?
$show="select * from sekilas_info where id_seinfo=4";
$query=mysql_query($show);
while ($row=mysql_fetch_array($query)){

echo "<strong>".$row['nama']."</strong>";
$row['date']=$date;
$date = date("d/M/yy");
echo "<span>".$date."</span>";
echo "<b class='margin-bot'>".$row['berita']."</b>";
};
?>		</strong>
						</li>
						</ul>
				</div>
				<ul class="pagination">
					<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
					<li><a class="item-1" href=""><strong>01</strong></a></li>
					<li><a class="item-2" href=""><strong>02</strong></a></li>
					<li><a class="item-3" href=""><strong>03</strong></a></li>
					<li><a class="item-4" href=""><strong>04</strong></a></li>
				</ul>
			</div>	
			
		<div class="border-bot1 img-indent-bot"><center>
			<?php if ($logged_in) { ?>
					<?php
					$username = $_SESSION['username'];
					$query_user_login = mysql_query("select * from users where username='$username'");
					$user_login = mysql_fetch_array($query_user_login);?>
					<h2>Selamat Datang <?php echo $user_login['fullname']; ?></h2>
			<?php } else {?>
					<h2>Withmeinfo.com</h2>
			<?php } ?></center>			
		</div>
		
<!--=======================================================-->
	<div class="wrapper">	
		<article class="col-1">
			<div class="indent-right"><br/>		
<div style="margin:auto">
	<div class="rounded_3 content2">			
				<ul class="list-2">
<h2>Kategori</h2>				
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

<div class="border-bot1 img-indent-bot"/>
				</div>	

<div class="rounded_3 shadow_1 content-randompost">				
<h3><center><span style="color:#00ff00;">Random Artikel</span></center></h3>				
<span><span style="font-style: italic;">
<span style="font-style: italic;">
<div style="height: 250px; width: 250px; font: 16px/26px Georgia,Garamond; overflow: auto;">				
				<ul class="list-3">				
					<?php
					$dataPerPage = 10;
					error_reporting(0);
					if(isset($_GET['page']))
					{
					$noPage = $_GET['page'];
					}
					else $noPage = 1;
					$offset = ($noPage - 1) * $dataPerPage;
					$query = "SELECT * FROM artikel ORDER BY RAND() LIMIT $dataPerPage";
					$result = mysql_query($query) or die('Error');

					while($data = mysql_fetch_array($result))
					{
					echo "<li><a href='index.php?hal=artikel-detail&id=$data[0]'>".$data['judul']."</a><br/>"."</li>";
					}
					?>
				</ul>				
</div>
</span></span></span>
</div>
				
	</div>
</div>				
			</div>
		</article>		

<!--artikel list update =======================================================-->				
		<article class="col-2">
			<div class="indent-right" align="left">
<div class="rounded_3 content-perpost">				
				<ul class="list-2">
				<br><h2>New Info<div class="border-bot1 img-indent-bot"/></h2>
					<?php
					$dataPerPage = 3;
					error_reporting(0);
					if(isset($_GET['page']))
					{
					$noPage = $_GET['page'];
					}
					else $noPage = 1;
					$offset = ($noPage - 1) * $dataPerPage;
					$query = "SELECT * FROM artikel order by id desc LIMIT $offset, $dataPerPage";
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
					if ($noPage > 1) echo "<a href='".$_SERVER['PHP_SELF']."?page=".($noPage-1)."'><< Prev</a>";
					for($page = 1; $page <= $jumPage; $page++)
					{
					if ((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page == $jumPage))
					{
					if (($showPage == 1) && ($page != 2)) echo "...";
					if (($showPage != ($jumPage - 1)) && ($page == $jumPage)) echo "...";
					if ($page == $noPage) echo " <b>".$page."</b> ";
					else echo " <a href='".$_SERVER['PHP_SELF']."?page=".$page."'>".$page."</a> ";
					$showPage = $page;
					}
					}
					if ($noPage < $jumPage) echo "<a href='".$_SERVER['PHP_SELF']."?page=".($noPage+1)."'>Next >></a>";
echo"</center>";
}				
					?>
				</ul>	

</div>
				
			</div>												
		</article>
		
<!--registerrrrr atau software update===================================================-->				
		<article class="col-3">
			<div class="indent-right"><br/>
				<?php if ($logged_in) { ?>

						<?
						error_reporting(0);
						if ($_GET['hal']=="editprofile"){
						include "modul/home/editprofile.php";
						}

						else if($_GET['hal']=="info"){
						include "modul/info/info.php";
						}
						
						else if($_GET['hal']=="cpass"){
						include "modul/home/cpass.php";
						}
						
						else {
						?>
	
	<strong>Jelajahi Zona Rockz:</strong><br>  
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
echo "<div class='rounded_3 shadow_cari content-cari'>";	  
        echo '<p><center><h4><blink>Ada '.$jumlah.' data yang sesuai.</blink></h4></center></p>';  
         
            while ($res=mysql_fetch_array($sql)) {  
            $nomor++; echo "<span style='color:;'>".$nomor.'. </span>';  
            echo "<b><a href='index.php?hal=info&id=$res[0]'>".$res[judul]."</a></b><br>";  
          }  
echo "</div>";      
	  }  
      else { 
echo "<div class='rounded_3 shadow_tidakadacari content-cari'>";	  
       // menampilkan pesan zero data  
        echo '<h4><blink>Maaf, hasil pencarian tidak ditemukan.</blink></h4>';  
echo "</div>";       
	  }  
    }   
    else { echo 'Masukkan dulu kata kuncinya';}  
    ?>  	

						<?}
						?>
						
<?php } else {?>				
				<h3>Sign Up<br />It's free and always will be.</h3>
				<div style="margin:auto">
				<form name="daftar" onsubmit="return validateForm();" action="index.php?hal=create" method="post" style="width:300px; margin:auto;">
					<fieldset class="rounded_3">
						
						<?php 
						$message = $_GET['msg'];
						
						if ($message == 'success') {
						?>
						<div class="info">Success Get Login</div>
						<?php }
						else if ($message == 'failed') {?>
						<div class="error">Error</div>
						<?php } ?>
						
						<div>
							<label for="username">Username</label> <input id="username" name="username" class="wide" type="text" required="required" />
						</div>
						<div>
							<label for="password">Password</label> <input id="password" name="password" class="wide" type="password" required="required" />
						</div>
						<div>
							<label for="email">Email</label> <input id="email" name="email" class="wide" type="email" required="required" />
						</div>
						<div>
							<label for="fullname">Fullname</label> <input id="fullname" name="fullname" class="wide" type="text" required="required" />
						</div>
						<div>
							<input class="right" type="submit" name="submit" value="Buat User" />
						</div>
					</fieldset>
				</form>
				</div>
<?php } ?>				
			</div>
		</article>	
		
		</div>
	</div>