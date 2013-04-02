			<div class="main">
				<div class="indent-left">
				
				
<? 
include "../conn/config.php";

if(isset($_POST['nama']))
{
	$nama=$_POST['nama'];
	$email=$_POST['email'];
	$topik=$_POST['topik'];
	$isi=$_POST['isi'];
	$tanggal;
	
	
	if (empty($nama) || empty($email) || empty($topik) || empty($isi))
	{
		echo "<script>window.alert('Harus Di Isi Semua')</script>";
	}else{
		
		$query=mysql_db_query($db,"insert into forum(nama,email,topik,isi,tanggal) values('$nama','$email','$topik','$isi','$tanggal')",$koneksi);
		
		if($query)
		{
		echo "<script>window.alert('Berhasil Post Topik')</script>";
		echo "<meta http-equiv='refresh' content='0; url=index.php?hal=forum'>";
		}else{
			echo "<script> alert('Gagal Query!!'); </script>";
		}
	}

}else{
	unset($_POST['nama']);
}


?>
<center>
<table width="22%" border="0" cellpadding="0" cellspacing="0" bordercolor="#99CC99">
<tr> 
	<td width="22%" align="right"></td>
	<td width="60%" ><strong><font face="verdana" size="2" color="#00000"><h3>New Forum</h3></font></strong></td>
	<td width="2%"></td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td>
	<table width="331" align="center">
		<tr><td width="269">
		<center>
		<font color="#FF0000" face='verdana' size='2'><blink><? echo $_GET['status'] ?></blink></font><br><br>

			<?php 
			// terima id_user dari halaman users
			$username = $_SESSION['username'];
			
			$query = mysql_query("select * from users where username='$username'");
			
			$data = mysql_fetch_array($query);
			?>		
		
		<form action="" method="post" name="form1">
		
		<table width="100%" border="0" align="center">
		<tr >
			<td align="left"><font face="verdana" size="2">Nama</font></td><td>:</td><td align="left">
			<input type="text" name="nama" size="20" value="<?php echo $data['username']; ?>"></td>
		</tr>
		
		<tr>
			<td align="left"><font face="verdana" size="2">Email</font></td><td>:</td><td align="left">
			<input type="text" size="20" name="email" value="<?php echo $data['email']; ?>"></td>
		</tr>
		
		<tr>
			<td align="left"><font face="verdana" size="2">TOPIK</font></td><td>:</td><td align="left">
			<input type="text" name="topik" size="20"></td>
		</tr>
		
		<tr>
			<td align="left"><font face="verdana" size="2">Isi</font></td><td>:</td><td align="left"><textarea name="isi" cols="20" rows="10"></textarea></td>
		</tr>
		
		<tr>
			<td><a href="index.php?hal=forum" title="Kembali">Back</a></td>
			<td></td>
			<td><input type="submit" name="submit" value="Kirim"></td>
		</tr>
		</table>
		</center>
		</form>
		
		</td></tr>
	</table>
	</td>
	<td>&nbsp;</td>
	<td width="16%"></td>
</tr>
<tr> 
	<td align="right"></td>
	<td bgcolor="#5686c6" ><div align="center"><strong><font face="verdana" size="3"></font></strong></div></td>
	<td></td>
</tr>
</table>
</center>


</div>
			</div>