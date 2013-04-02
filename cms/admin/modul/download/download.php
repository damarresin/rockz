<?php
	include "conn/config.php";	//koneksi dengan database database_ku
?>
<div id="wrapper">
    <div class="content">
    <div class="form-wrap">
    	<p>Pilih Gambar:</p>
        <form action="index.php?hal=uphap&act=upload" method="post" enctype="multipart/form-data">
        <p><input name="fgambar" type="file" id="fgambar" /></p>
        <p>Tipe file yang diperbolehkan jpg, jpeg, pjpeg, png atau gif.</p>
        <p>Deskripsi:</p>
        <p><textarea name="deskripsi" cols="38" rows="5" id="deskripsi"></textarea></p>
        <input type="hidden" name="direktori" id="direktori" value="images"	/>
		<p>Nama Download.an :</p>
		<input type="text" name="ndownload" id="ndownload" value=""	/>
		<p>Link :</p>
		<input type="text" name="link" id="link" value=""	/>
		<p>Label :</p>
		<input type="text" name="label" id="label" value=""	/>
        <p><input name="upload" type="submit" value="Upload" id="upload" /></p>
        </form>
        <p>Skrip dapat anda modifikasi sesuka hati.</p>
	</div>
    <hr />
    <p>Gambar Tesedia:</p>
    <?php
	//tampilkan gambar tersedia
	$SQL ="SELECT * FROM file_gambar";
	$qryGambar =@mysql_query($SQL);
	$no=0;
	while($row =@mysql_fetch_array($qryGambar)):
		$no++;
		$conf ="Anda yakin akan menghapus gambar ".$row['file_name'];
		echo '<p>No : '.$no.'</p>';
		echo '<p>Nama : '.$row['nama_download'].'
			 | <a href="index.php?hal=uphap&act=hapus&id='.$row['file_id'].'" 
			 onclick="return confirm(\'Anda yakin akan menghapus gambar '.$row['file_name'].'\');">Hapus</a></p>';
		echo '<p>Ukuran : '.$row['ukuran'].' bytes</p>';
		echo '<p><img src="'.$row['direktori'].'/'.$row['file_name'].'" /></p>';
		echo '<p>Deskripsi : '.$row['deskripsi'].'</p><hr />';
		echo "<p>Link : <a href='".$row['link']."'target='_blank'>Download</a></p><hr />";
		echo '<p>Label : '.$row['label'].'</p><hr />';
	endwhile;	
	if($no==0){
		echo "<p>Gambar belum tersedia.</p>";
	}
	?>
    </div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
</div>
