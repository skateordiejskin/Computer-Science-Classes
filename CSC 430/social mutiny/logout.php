<?php
session_start();
setcookie("email", "",time()-3600);
if(setcookie("email", "",time()-3600)){
	session_destroy();
	echo "<meta http-equiv='refresh' content='0; url=http://socialmutiny.com' />";
}

?>