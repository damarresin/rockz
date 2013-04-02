<?php 
session_start();
$logged_in = false;
//jika session username belum dibuat, atau session username kosong
if (isset($_SESSION['username']) || !empty($_SESSION['username'])) {
	$logged_in = true;
}
include_once('conn/config.php');
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Rockz With Me</title>
<link href='layout/images/with-icon.png' rel='SHORTCUT ICON'/> <!--icon address bar-->
<script src='layout/js/pelangi.js'></script> <!--script bikin link pelangi-->
<!--script userlog===============================================================-->
	<link rel="stylesheet" href="layout/userlog/css/reset.css" type="text/css" />
	<link rel="stylesheet" href="layout/userlog/css/normalize.css" type="text/css" />
	<link rel="stylesheet" href="layout/userlog/css/permata-ui-kit.css" type="text/css" />
	<link rel="stylesheet" href="layout/userlog/css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="layout/userlog/css/style.css" type="text/css" />
<!--script html===================================================================-->
	<link rel="stylesheet" href="layout/css/reset.css" type="text/css" media="screen">
	<link rel="stylesheet" href="layout/css/style.css" type="text/css" media="screen">
	<link rel="stylesheet" href="layout/css/layout.css" type="text/css" media="screen">   
	<script src="layout/js/jquery-1.6.3.min.js" type="text/javascript"></script>
	<script src="layout/js/cufon-yui.js" type="text/javascript"></script>
	<script src="layout/js/cufon-replace.js" type="text/javascript"></script>
	<script src="layout/js/NewsGoth_400.font.js" type="text/javascript"></script>
	<script src="layout/js/NewsGoth_700.font.js" type="text/javascript"></script>
	<script src="layout/js/Vegur_300.font.js" type="text/javascript"></script> 
	<script src="layout/js/FF-cash.js" type="text/javascript"></script>
	<script src="layout/js/jquery.easing.1.3.js" type="text/javascript"></script>
	<script src="layout/js/tms-0.3.js" type="text/javascript"></script>
	<script src="layout/js/tms_presets.js" type="text/javascript"></script>
	<script type="text/javascript">
			$(function() { 
				$('.close').bind('click', function(){
					$(this).parent().show().fadeOut(500);
				});
			}); 
	</script>

</head>

<body id="page1">
<!--==============================header=================================-->
<header>
	<div class="main">			
		<div class="wrapper">
			<h1>
				<a href=".">Withmeinfo</a>
				<strong>dot com</strong><br />				
			</h1>
			<nav>
				<ul class="menu">
					<li><a href=".">Home</a></li>
					<li><a href="index.php?hal=info">Info</a></li>
					<li><a href="index.php?hal=download">Download</a></li>
					<li><a href="index.php?hal=forum">Forum</a></li>
					<li><a href="index.php?hal=contact">Contacts</a></li>
<!--userlog.in.out===================================================================================-->
					<?php if ($logged_in) { ?>
						<span class="left"><a href="session/logout.php" class="right">Logout</a></span>
					<?php } else {?>
<?php
// jika user yang login memiliki role sebagai admin, maka tampilkan opsi ini
if ($_GET['hal'] == 'login-again') {}
else {?>					
						<form action="session/auth.php" method="post" >
						Username: <input type="text" name="username" />
						Password: <input type="password" name="password" /><br>
						<input class="right" type="submit" name="submit" value="Login" />
						</form>
<?}?>						
					<?php } ?>	
				</ul>				
			</nav>
		</div>
	</div>
	<div class="ic">More Website Templates @ TemplateMonster.com - October 31, 2011!</div>
</header>

<!--==============================content================================-->
<section id="content">


<?
error_reporting(0);
if ($_GET['hal']=="home"){
include "modul/home/home.php";
}

else if($_GET['hal']=="info"){
include "modul/info/info.php";
}

else if($_GET['hal']=="artikel-detail"){
include "modul/info/artikel_detail.php";
}

else if($_GET['hal']=="kategori-artikel"){
include "modul/info/kategori-artikel.php";
}

else if($_GET['hal']=="download"){
include "modul/download/download.php";
}

else if($_GET['hal']=="forum"){
include "modul/forum/forum.php";
}

else if($_GET['hal']=="new"){
include "modul/forum/new.php";
}

else if ($_GET['hal']=="view"){
include "modul/forum/view.php";
}

else if ($_GET['hal']=="reply"){
include "modul/forum/reply.php";
}

else if($_GET['hal']=="contact"){
include "modul/contact/contact.php";
}

else if($_GET['hal']=="create"){
include "modul/home/create.php";
}

else if($_GET['hal']=="update"){
include "modul/home/update.php";
}

else if($_GET['hal']=="login-again"){
include "modul/home/login-again.php";
}

else if($_GET['hal']=="komentar"){
include "modul/info/komentar.php";
}
else {
?>
<?
include "modul/home/home.php";
}
?>


</section>
	<!--==============================footer=================================-->
		<footer>
			<div class="main">
				<div class="wrapper border-bot2 margin-bot">
					<article class="fcol-1">
						<div class="indent-left">
							<h3 class="color-1">developer withme ROCKZ</h3>
							<ul class="list-services">
								<li><a href="https://www.facebook.com/damarpyschosis" target="_blank">facebook.com/damarpsychosis</a></li>
								<li><a class="it-2" href="https://twitter.com/#!/damarpahpoh" target="_blank">@damarpahpoh</a></li>
								<li><a class="it-3" href="index.php?hal=contact" target="_blank">withmeinfo official</a></li>
								<li class="last-item"><a class="it-4" href="http://damar-web.co.cc" target="_blank">withmeROCKZ blog</a></li>
							</ul>
						</div>
					</article>
					<article class="fcol-2"><center>
						<h3 class="color-1" align="center" border="1">Jelajahi withmeinfoRockz</h3>						
					
					<img src="gambar/21cineplex-logo1.png" />
					</center>
					</article>
<?php if ($logged_in) { ?>					
					<article class="fcol-3">
						<h3 class="color-1">My Account can i get</h3>
						<ul class="list-3">
					<h4>
					<li><a href="index.php?hal=editprofile">Profile</a> <span>Edit My Profile</span></li>
					<li><a href="index.php?hal=forum">Forum</a> <span> Join Forum</span></li>
<script>
function buka(){
open('chat/chat.php','form','menubar=no,width=650,height=500');
}
</script>
<li><a href="#" onclick="buka()">Chatting</a> <span> with My Friend</span></li>
					<li class="last-item"><a href="index.php?hal=download">E-Book Free</a> <span> Gratis Tenan</span></li>
					</h4>
						</ul>
					</article>
<?php } else {?>
<article class="fcol-3" align="center">
<img src="gambar/smiley-icon-gifs-858.gif" height="200" width="200"/>
</article>
<?}?>					
				</div>
				<div class="aligncenter">
					WithmeINFO &copy; 2012 <a rel="nofollow" class="color-1" href="http://rockz.withmeinfo.com/" target="_blank">Copyright</a> by withmeinfo.com
				</div>
			</div>
		</footer>
		<script type="text/javascript"> Cufon.now(); </script>
		<script type="text/javascript">
			$(window).load(function() {
				$('.slider')._TMS({
					duration:800,
					easing:'easeOutQuart',
					preset:'diagonalExpand',
					slideshow:7000,
					pagNums:false,
					pagination:'.pagination',
					banners:'fade',
					pauseOnHover:true,
					waitBannerAnimation:true
				});
			});
		</script>
		
<!-- footer dinamis -->
<?php if ($logged_in) { ?>
<DIV id='footer2'>
<MARQUEE onmouseout='this.start()' onmouseover='this.stop()' scrollamount='4'>
Sekilas Info ||
				<?php
					$dataPerPage = 50;
					error_reporting(0);
					if(isset($_GET['page']))
					{
					$noPage = $_GET['page'];
					}
					else $noPage = 1;
					$offset = ($noPage - 1) * $dataPerPage;
					$query = "SELECT * FROM artikel order by id desc LIMIT $dataPerPage";
					$result = mysql_query($query) or die('Error');

					while($data = mysql_fetch_array($result))
					{
					echo "<a href='index.php?hal=artikel-detail&id=$data[0]'>".$data['judul']."</a> | ";
					}
					?>

</MARQUEE>
</DIV>
<?php } else {}?>		


</body>

</html>