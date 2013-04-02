<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<?
include('koneksi/koneksi.php');
 session_start(); 
if(empty($_SESSION['user'])){
echo "<SCript>window.alert('anda belum login')</script>";
echo "<meta http-equiv='refresh' content='0; url=../'>"; }else {
?>
<html>
<head>

<title>ADMINISTRATOR</title>
<link rel="stylesheet" href="gaya.css" type="text/css">
<script type="text/javascript" src="jquery-1.4.3.min.js"></script>
<script type="text/javascript" src="notifikasi.js"></script>
<!-- TinyMCE -->
<script type="text/javascript" src="jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
 tinyMCE.init({
 // General options
 mode : "textareas",
 theme : "advanced",
 plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",

 // Theme options
 theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
 theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
 theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
 theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
 theme_advanced_toolbar_location : "top",
 theme_advanced_toolbar_align : "left",
 theme_advanced_statusbar_location : "bottom",
 theme_advanced_resizing : true,

 // Example content CSS (should be your site CSS)
 content_css : "css/content.css",

 // Drop lists for link/image/media/template dialogs
 template_external_list_url : "lists/template_list.js",
 external_link_list_url : "lists/link_list.js",
 external_image_list_url : "lists/image_list.js",
 media_external_list_url : "lists/media_list.js",

 // Style formats
 style_formats : [
 {title : 'Bold text', inline : 'b'},
 {title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
 {title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
 {title : 'Example 1', inline : 'span', classes : 'example1'},
 {title : 'Example 2', inline : 'span', classes : 'example2'},
 {title : 'Table styles'},
 {title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
 ],

 // Replace values for the template plugin
 template_replace_values : {
 username : "Some User",
 staffid : "991234"
 }
 });
</script>
<!-- /TinyMCE -->

<!--css download-->
<style type="text/css">
<!--
body {
	margin-top: 0px;
	margin-bottom: 0px;
	
}
#wrapper {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 13px;
	background-color: #000000;
	padding: 10px;
	color: #FFFFFF;
}
.form-wrap{
	background-color:#CCCCCC;
	padding: 5px;
	color: #000000;
}
#wrapper a {
	color: #FFFFFF;
}
#wrapper a:hover{
	color:#FF0000;
}

#wrapper h3 {
	font-size: 18px;
	color: #330000;
	text-decoration: underline;
}
#wrapper .content .heading {
	font-size: 16px;
	font-weight: bold;
}

-->
</style>
</head>

<body style="margin: 0px; padding: 0px; font-family: 'Trebuchet MS',verdana;">

<table width="100%" style="height: 100%;" cellpadding="10" cellspacing="0" border="0">
<tr>

<!-- ============ HEADER SECTION ============== -->
<td colspan="5" style="height: 100px;" bgcolor="#0000"><img src="../layout/images/logo.png" width="100" height="100"/></td></tr>
<tr><td colspan="5" valign="middle" height="1%" bgcolor="#808080"><marquee direction="right" bgcolor="#0000" style="color:#ddc466"><b>Rockz Management System</b></marquee></td></tr>

<!-- ============ LEFT COLUMN (MENU) ============== -->
<td width="20%" valign="top" bgcolor="#a1aedd">
<a href=".">Home</a><br>
<a href="index.php?hal=content">Content</a><br>
<a href="index.php?hal=kategori">Kategori</a><br>
<a href="index.php?hal=member">Member</a><br>
<a href="index.php?hal=home-inbox">Inbox</a><br>
<a href="index.php?hal=forum">Forum</a><br>
<a href="index.php?hal=headline">Headline</a><br>
<a href="index.php?hal=download">Download</a><br>
<a href="index.php?hal=upload-file">Upload-File</a><br>
<a href="index.php?hal=akun-cms">AccountCMS</a><br>
<a href="index.php?hal=logout">Logout</a>
</td>
<td valign="middle" width="1" bgcolor="#808080"></td>
<!-- ============ MIDDLE COLUMN (CONTENT) ============== -->
<td width="80%" valign="top" bgcolor="#fffffff">
<?
error_reporting(0);
//manajemen konten
if ($_GET['hal']=="content"){
include "modul/content/content.php";
}

else if($_GET['hal']=="tambah"){
include "modul/content/tambah.php";
}

else if($_GET['hal']=="edit"){
include "modul/content/edit.php";
}

else if($_GET['hal']=="hapus"){
include "modul/content/hapus.php";
}

else if($_GET['hal']=="submit"){
include "modul/content/submit.php";
}

//manajemen kategori
else if($_GET['hal']=="kategori"){
include "modul/kategori/kategori.php";
}

else if($_GET['hal']=="tambah-kategori"){
include "modul/kategori/tambah-kategori.php";
}

else if($_GET['hal']=="submit-kategori"){
include "modul/kategori/submit-kategori.php";
}

else if($_GET['hal']=="edit-kategori"){
include "modul/kategori/edit-kategori.php";
}

else if($_GET['hal']=="hapus-kategori"){
include "modul/kategori/hapus-kategori.php";
}

//manajemen akuncms/admin
else if($_GET['hal']=="akun-cms"){
include "modul/akuncms/akun.php";
}

else if($_GET['hal']=="tambah-akun"){
include "modul/akuncms/tambah.php";
}

else if($_GET['hal']=="insert-akun"){
include "modul/akuncms/insert.php";
}

else if($_GET['hal']=="hapus-akuncms"){
include "modul/akuncms/hapus.php";
}

else if($_GET['hal']=="gantipass-akuncms"){
include "modul/akuncms/gantipass.php";
}

//sekilas info headline
else if($_GET['hal']=="headline"){
include "modul/headline/headline.php";
}

else if($_GET['hal']=="edit-headline"){
include "modul/headline/edit-headline.php";
}

//manajemen member
else if($_GET['hal']=="member"){
include "modul/member/member.php";
}

else if($_GET['hal']=="hapus-member"){
include "modul/member/hapus.php";
}

else if($_GET['hal']=="tambah-member"){
include "modul/member/tambah.php";
}

else if($_GET['hal']=="edit-member"){
include "modul/member/edit.php";
}

else if($_GET['hal']=="insert-member"){
include "modul/member/insert.php";
}

//manajemen inbox
else if($_GET['hal']=="home-inbox"){
include "modul/inbox/home-inbox.php";
}

else if($_GET['hal']=="pesan"){
include "modul/inbox/pesan.php";
}

//manajemen download
else if($_GET['hal']=="download"){
include "modul/download/download.php";
}

else if($_GET['hal']=="uphap"){
include "modul/download/upload-hapus.php";
}

//manajemen forum
else if($_GET['hal']=="forum"){
include "modul/forum/forum.php";
}

else if($_GET['hal']=="forum-hapus"){
include "modul/forum/hapus.php";
}

else if($_GET['hal']=="logout"){
include "modul/logout.php";
}

//manajemen upload file
else if($_GET['hal']=="upload-file"){
include "modul/upload-file/upload-file.php";
}

else {
?>
<h2>Beranda RMC</h2>

Selamat datang di halaman Administrator CMS ROCKZ.
Silahkan klik menu pilihan yang berada di sebelah kiri untuk mengelola website. 

<?
}
?>
</td>


</tr>

<!-- ============ FOOTER SECTION ============== -->
<tr><td colspan="5" valign="middle" height="1%" bgcolor="#808080"></td></tr>
<tr><td colspan="5" align="center" height="20" bgcolor="#7592ff"><b>RMC Copyright <blink>©</blink> 2012</b></td></tr>
</table>
</body>

<html>

<?
}
 ?>
