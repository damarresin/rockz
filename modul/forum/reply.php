<div class="main">
	<div class="indent-left">


<? 
include "conn/config.php";
if(isset($_POST['nama']))
{
	$nama=$_POST['nama'];
	$email=$_POST['email'];
	$topik=$_POST['topik'];
	$isi=$_POST['isi'];
	$ID_topik=$_POST['ID_topik'];
	
	if (empty($nama) || empty($email) || empty($topik) || empty($isi))
	{
		?><script language="javascript">document.location.href='forum-reply.php?ID_topik=<? echo $ID_topik;?>&topik=<? echo $topik;?>&status=Maaf, Data Anda masih kosong!!'; </script>";</script><?
	}else{
		$query=mysql_db_query($db,"insert into forum(nama,email,topik,isi,tanggal,ID_replay) values('$nama','$email','$topik','$isi','$tanggal','$ID_topik')",$koneksi);
	
		
		if($query)
		{
			echo "<script>alert('Berhasil mengisi reply!!');</script>";
			echo "<meta http-equiv='refresh' content='0; url=index.php?hal=view&ID_topik=$ID_topik'>";
		}else{
			echo "<script>alert('gagal!!');</script>";
		}
	}
}else{
	unset($_POST['nama']);
}


?>


<center><br>
<table width="25%" border="0" cellpadding="0" cellspacing="0" bordercolor="#99CC99">
<tr> 
	<td width="2%" align="right"></td>
	<td width="90% ><div align="center"><strong><font face="verdana" size="2" color="#000000"><h3>Reply Forum</h3></font></strong></div></td>
	<td width="6%"></td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td>
	<table width="331" align="center">
		<tr><td width="269">
		<center><font color="#FF0000" face='verdana' size='2'><blink><? echo $_GET['status'] ?></blink></font><br><br></center>
		<form action="" method="post" name="form1">
		
					<?php if ($logged_in) { ?>
					<?php
					$username = $_SESSION['username'];
					$query_user_login = mysql_query("select * from users where username='$username'");
					$user_login = mysql_fetch_array($query_user_login);?>
					
		<table width="100%" border="0">
		<tr >
			<td align="left"><font face="verdana" size="2">ID</font></td><td>:</td><td align="left">
			<input type="hidden" value="<? echo $_GET['ID_topik']; ?>" name="ID_topik"><font face="verdana" size="2"><? echo $_GET['ID_topik']; ?></font></td>
		</tr>
		
		
		
		<tr >
			<td align="left"><font face="verdana" size="2">Nama</font></td><td>:</td><td align="left">
			<input type="text" size="20" name="nama" value="<? echo $user_login['username']; ?>"></td>
		</tr>
		
		<tr>
			<td align="left"><font face="verdana" size="2">Email</font></td><td>:</td><td align="left">
			<input type="text" name="email" size="20" value="<? echo $user_login['email']; ?>"></td>
		</tr>
<?php } ?>
		<tr>
			<td align="left"><font face="verdana" size="2">Topik</font></td><td>:</td><td align="left">
			<input type="text" value="<? echo $_GET['topik']; ?>" name="topik" size="33"></td>
		</tr>
		
		
		
		<tr>
			<td align="left"><font face="verdana" size="2">Isi</font></td><td>:</td><td align="left"><textarea name="isi" cols="25" rows="10"></textarea></td>
		</tr>
		
		<tr>
			<td>
			<a href="index.php?hal=view&ID_topik=<? echo $_GET['ID_topik']; ?>&topik=<? echo $_GET['topik'];?>" style="text-decoration:none" title="Kembali">
			<< Back
			</a>
			</td>
			<td></td>
			<td><input type="submit" name="submit" value="POST"></td>
		</tr>
		</table>
		</form>
		
		
		</td></tr>
	</table>
	</td>
	<td>&nbsp;</td>
	<td width="2%"></td>
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