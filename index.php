<?php
	if (isset($_COOKIE['count']) && isset($_COOKIE['time'])){
		$count = $_COOKIE['count'] + 1;
		$time = unserialize($_COOKIE['time']);

		$time[] = date("H:i:s - d.m.Y");
		for ($i=0; $i < count($time); $i++) { 
			echo "$time[$i]<br>";
		}

		setcookie('count', $count, time() + 3600);
		setcookie('time', serialize($time), time() + 3600);
	}
	else {
		setcookie('count','1', time() + 3600);
		$count = 1;
		$time = [date("H:i:s - d.m.Y")];
		setcookie('time',serialize($time), time() +3600);
		echo "$time[0]<br>";
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Lab7</title>
</head>
<body>
	Привет! Вы посетили этот сайт <?=$count; ?> раз(а).
	<form action="script.php">
		<input type="hidden" name="clear_cookie" value="clear">
		<input type="submit" value="Clear cookie">
	</form>
</body>
</html>