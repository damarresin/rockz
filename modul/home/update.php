<?php
include('conn/config.php');

//tangkap data dari form
$id = $_POST['user_id'];
//$password =md5($_POST['password']);
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$role = $_POST['role'];

//update data di database sesuai user_id
$query = mysql_query("update users set fullname='$fullname', email='$email', role='$role' where id_user='$id'") or die(mysql_error());

if ($query) {
	header('location:index.php?hal=home&msg=success');
} else {
	header('location:index.php?hal=home&msg=failed');
}
?>