<input type=button value='Back' onclick="window.location.href='index.php?hal=member'">
<h2>Created USER</h2>
<table>
	<form name="tambah" action="modul/member/insert.php" method="post" onsubmit="validateForm();">
			<?php 
			$message = $_GET['msg'];
			
			if ($message == 'success') {
			?>
			<div class="info">Success</div>
			<?php } else if ($message == 'failed') {?>
			<div class="error">Error</div>
			<?php } ?>
				<tr><td><label for="username">Username</label></td>
				<td><input id="username" name="username" class="wide" type="text" required="required" value="" /></td></tr>
				<tr><td><label for="password">Password</label></td>
				<td><input id="password" name="password" class="wide" type="password" required="required" value="" /></td></tr>
				<tr><td><label for="email">Email</label></td>
				<td><input id="email" name="email" class="wide" type="email" required="required" value="" /></td></tr>
				<tr><td><label for="fullname">Fullname</label></td>
				<td><input id="fullname" name="fullname" class="wide" type="text" required="required" value="" /></td></tr>
				<tr><td><label for="role">Role</label></td>
				<td><select name="role">
					<option value="admin">Admin</option>
					<option value="member" selected>Member</option>
				</select></td></tr>
				<tr><td><input class="right" type="submit" name="submit" value="Create" /></td></tr>
	</form>
</table>
