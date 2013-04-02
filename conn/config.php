<?php
// host yang digunakan
// 99,9% tidak perlu dirubah
$host = 'localhost'; 
 
// username untuk login ke host
// biasanya didapatkan pada email konfirmasi order hosting
$user = 'root'; 
 
// jika menggunakan PC sendiri sebagai host,
// secara default password dikosongkan
$pass = '';
 
// isikan nama database sesuai database yang akan digunakan
$dbname = 'rockz_db';
 
// mengubung ke host
$connect = mysql_connect($host, $user, $pass) or die(mysql_error());
 
// memilih database yang akan digunakan
$dbselect = mysql_select_db($dbname);
?>


<?
//koneksi untuk forum
ini_set('display_errors',FALSE);
$host="localhost";
$user="root";
$pass="";
$db="rockz_db";
$entries=10;


$koneksi=mysql_connect($host,$user,$pass);
$tanggal=date("Y-m-d H:i:s");

if ($koneksi)
{
	//echo "berhasil : )";
}else{
	?><script language="javascript">alert("Gagal Koneksi Database MySql !!")</script><?
}

?>