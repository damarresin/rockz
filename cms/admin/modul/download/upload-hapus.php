<?php
//Skrip uload file gambar
//oleh: http://www.magzimp.com

include "conn/config.php";	//koneksi dengan database database_ku

//aksi upload
if($_GET['act']=='upload'):
	$tipe =$_FILES['fgambar']['type'];
	if(	$tipe != "image/jpg" AND
		$tipe != "image/jpeg" AND
		$tipe != "image/pjpeg" AND
		$tipe != "image/png" AND
		$tipe != "image/gif"
		)
	echo '<p><b>Upload Gagal</b></p>
		<p>Tipe file yang diperbolehkan jpg, jpeg, pjpeg, png atau gif.</p>
		<p><a href="index.php">ULANGI</p></p>';	
		
	else{	
		$file_name	=$_FILES['fgambar']['name'];
		$ukuran		=$_FILES['fgambar']['size'];
		$direktori	=$_POST['direktori'];
		$deskripsi	=$_POST['deskripsi'];
		$ndownload	=$_POST['ndownload'];
		$link		=$_POST['link'];
		$label		=$_POST['label'];
		
		//Cek gambar
		$SQL ="SELECT file_name FROM file_gambar WHERE file_name='$file_name'";
		$qGambar =@mysql_query($SQL);
		if(count(@mysql_fetch_array($qGambar)) > 1){
			echo '<p><b>Upload Gagal</b></p>
			<p>Gambar telah tersedia</p>
			<p><a href="index.php">KEMBALI</p></p>';	
		}else{
			//upload gambar
			move_uploaded_file($_FILES['fgambar']['tmp_name'],$direktori.'/'.$file_name);
			
			//simpan data gambar
			@mysql_query("INSERT INTO file_gambar
				SET file_name	='$file_name',
					ukuran		='$ukuran',
					direktori	='$direktori',
					nama_download='$ndownload',
					link		='$link',
					label		='$label',
					deskripsi	='$deskripsi'");
echo "<SCript>window.alert('Upload Sukses')</script>";
echo "<meta http-equiv='refresh' content='0; url=index.php?hal=download'>";
		}
	}	
endif;

//aksi hapus
if($_GET['act']=='hapus'):
	//pilih gambar
	$id =$_GET['id'];
	$SQL ="SELECT * FROM file_gambar WHERE file_id='$id'";
	$qGambar =@mysql_query($SQL);
	$row =@mysql_fetch_array($qGambar);
	//hapus gambar
	if(file_exists($row['direktori'].'/'.$row['file_name']))
		unlink($row['direktori'].'/'.$row['file_name']);
	
	//hapus data gambar
	@mysql_query("DELETE FROM file_gambar WHERE file_id='$id'");
echo "<SCript>window.alert('Delete Sukses')</script>";
echo "<meta http-equiv='refresh' content='0; url=index.php?hal=download'>";
endif;

?>
