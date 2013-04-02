<input type=button value='Back' onclick="window.location.href='index.php?hal=akun-cms'">
<h2>Created USER</h2>
<table>
	<form action="index.php?hal=insert-akun" method="post">
				<tr><td><label for="username">Username</label></td>
				<td><input id="username" name="user" class="wide" type="text" required="required" value="" /></td></tr>
				<tr><td><label for="password">Password</label></td>
				<td><input id="password" name="pass" class="wide" type="password" required="required" value="" /></td></tr>
				<tr><td><input class="right" type="submit" name="submit" value="Create" /></td></tr>
	</form>
</table>