<?php 
session_start();
$logged_in = false;
//jika session username belum dibuat, atau session username kosong
if (isset($_SESSION['username']) || !empty($_SESSION['username'])) {
	$logged_in = true;
}
include_once('../conn/config.php');
?>

<link rel="stylesheet" type="text/css" href="chatfiles/chatstyle.css" />

<div id="chatarea">
 <div id="chatrooms">
<?php
include('chatfiles/setchat.php');
echo $chatS->chatRooms();          // add the chat rooms
?>
 </div>
 <div id="chatwindow"><?php echo $chatS->chatroomcnt; ?></div>
<div id="playchatbeep"><img src="chatex/playbeep2.png" width="25" height="25" alt="chat beep" id="playbeep" onclick="setPlayBeep(this)" /><span id="chatbeep"></span>Mute Sound</div>
<?php echo $chatS->chatForm().jsTexts($lsite); ?>
<script type="text/javascript" src="chatfiles/chatfunctions.js"></script><noscript><a href="http://www.coursesweb.net/php-mysql/" title="PHP-MySQL Course">PHP-MySQL Course</a></noscript>
</div>