<?php if ($logged_in) { ?>


<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
<?
include "conn/config.php";

$download=mysql_query("select * from file_gambar");
$cek=mysql_num_rows($download);

if($cek){
	
	?><center>
	<h2 align="center">Download Free</h2>
	<table class="datatable" align="center">
		<tr>
			<th>No</th>
			<th>Nama File</th>
			<th>Ukuran (byte)</th>
			<th>Label</th>
			<th>Deskripsi</th>
			<th>Download</th>
		</tr>
	<?
	while($row=mysql_fetch_array($download)){
		?>
		<tr>
			<td><? echo $c=$c+1;?></td>
			<td><?=$row['nama_download'];?></td>
			<td><?=$row['ukuran'];?></td>
			<td><?=$row['label'];?></td>
			<td><?=$row['deskripsi'];?></td>
			<td><a href="<?=$row['link'];?>" target="_blank"><center><img src="download.jpg" border="0"/></center></a></td>
		</tr>
		<?
	}
	?>
	</table></center>
	<?
	
}else{
	echo "<font color=red><center><b>Belum Ada Data!!</b><center</font>";
}


?>



<?php } else {
echo "<meta http-equiv='refresh' content='0; url=./index.php?hal=login-again'>";
}?>