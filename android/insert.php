<?php
	include_once("koneksi.php");

	$username = $_REQUEST['username'];
	$password = $_REQUEST['password'];
	
		if($username && $pasword){
			$string = "INSERT INTO users(username, password) VALUES ('$username', '$password')";
			mysql_query($string);
		}
		
		$string = "SELECT * FROM users";
		$my_string = mysql_query($string);
		

			while($object = mysql_fetch_assoc($my_string)){
				$output[] = $object;
			
			
			echo json_encode($output);
		}
	mysql_close();
?>