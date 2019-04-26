<?php 
if (isset($_COOKIE['leavetime']) && !empty($_COOKIE['leavetime'])){
	$leavetime = unserialize($_COOKIE['leavetime']);
	$leavetime[] = time();
	setcookie('leavetime', serialize($leavetime), time() + 3600);
}
else{
	$leavetime = [time()];
	setcookie('leavetime', serialize($leavetime), time() + 3600);
}