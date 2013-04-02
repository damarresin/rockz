<?php 
session_start();
$logged_in = false;
//jika session username belum dibuat, atau session username kosong
if (isset($_SESSION['username']) || !empty($_SESSION['username'])) {
	$logged_in = true;
}
include_once('../conn/config.php');
?>
			<?php
			// jika user yang login memiliki role sebagai admin, maka tampilkan opsi ini
			if ($_SESSION['role'] == 'admin') {
			?>
			
<?php
if(isset($_POST['login'])){
include '../conn/config.php';
$user=addslashes($_POST['user']);
$pass=md5($_POST['pass']);
$cari= "select user from user_cms where user='$user' and pass='$pass'";
$query= mysql_query($cari);
$num=mysql_num_rows($query);

if($num>0){
 session_start(); 
 session_register('user');
 $row= mysql_fetch_array($query);
 $_SESSION['user']=$row['user'];
 echo "<meta http-equiv='refresh' content='0; url=admin/'>";
 } 
 }
?>

<html>
<head>
<title>Administrator CMS Rockz</title>
<script language="javascript">
function validasi(form){
  if (form.user.value == ""){
    alert("Anda belum mengisikan Username.");
    form.username.focus();
    return (false);
  }
     
  if (form.pass.value == ""){
    alert("Anda belum mengisikan Password.");
    form.pass.focus();
    return (false);
  }
  return (true);
}
</script>
<link href="layout/style.css" rel="stylesheet" type="text/css" />
</head>
<body OnLoad="document.login.username.focus();">
<div id="header">
  <div id="content">
		
    <img src="layout/images/superuser.png" width="97" height="105" hspace="10" align="left">

<form name="login" action="" method="POST" onSubmit="validasi(this)" background="#c466dd">
<table>
<tr><td><font color="red">Username</font></td><td> : <input type="text" name="user"></td></tr>
<tr><td><font color="red">Password</font></td><td> : <input type="password" name="pass"></td></tr>
<tr><td colspan="2"><input type="submit" name='login' value="login"></td></tr>
</table>
</form>



</div>
</body>
</html>

<?php } else { ?>
<?
echo "<script>window.alert('Terjadi kesalahan')</script>";
echo "<meta http-equiv='refresh' content='0; url=../'>";
}
?>