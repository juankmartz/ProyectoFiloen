<?php 

function clean($str) {
	$var = strip_tags(addslashes(stripcslashes(htmlspecialchars($str))));
	return $var;
}

 ?>
