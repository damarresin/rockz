<?php 
session_start();
$logged_in = false;
//jika session username belum dibuat, atau session username kosong
if (isset($_SESSION['username']) || !empty($_SESSION['username'])) {
	$logged_in = true;
}
include_once('conn/config.php');
?>
<form class="rounded_3" action="index.php?hal=update" method="post" style="width:300px; margin:auto;">
		<fieldset class="rounded_3">
			<legend>Edit User</legend>
			<?php 
			$message = $_GET['msg'];
			
			if ($message == 'success') {
			?>
			<div class="info">Success</div>
			<?php } else if ($message == 'failed') {?>
			<div class="error">Error</div>
			<?php } ?>
			
			
			<?php 
			// terima id_user dari halaman users
			$username = $_SESSION['username'];
			
			$query = mysql_query("select * from users where username='$username'");
			
			$data = mysql_fetch_array($query);
			?>
			
			
			<div>
				<label for="username">Username</label> <input id="username" name="username" class="wide" type="text" required="required" value="<?php echo $data['username']; ?>" disabled="disabled" />
			</div>
			<!--<div>
			<label for="password">Password</label> <input id="password" name="password" class="wide" type="password" required="required" value="<?php echo $data['password']; ?>" <?php if ($data['username'] == 'admin') {?> disabled="disabled" <?php } ?> />
			</div>-->
			<div>
				<label for="email">Email</label> <input id="email" name="email" class="wide" type="email" required="required" value="<?php echo $data['email']; ?>" />
			</div>
			<div>
				<label for="fullname">Fullname</label> <input id="fullname" name="fullname" class="wide" type="text" value="<?php echo $data['fullname']; ?>" />
			</div>
			<?php
			// jika user yang login memiliki role sebagai admin, maka tampilkan opsi ini
			if ($_SESSION['role'] == 'admin') {
				if ($data['username'] != 'admin') {
			?>
			<div>
				<label for="role">Role</label>
				<select name="role">
					<option value="admin">Admin</option>
					<option value="member">Member</option>
				</select>
			</div>
			<?php 
				}
			} 
			?>
			<div>
				<input class="right" type="submit" name="submit" value="Save" />
			</div>
			<div>
			<a href="."><input class="right" type="button" value="Cancel" /></a>
			<a href="index.php?hal=cpass"><input class="right" type="button" value="Change Password" /></a>
			</div>
			<input type="hidden" name="user_id" value="<?php echo $data['id_user']; ?>" />
		</fieldset>
	</form>
