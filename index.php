<?php
	echo "<table width='600px' style='text-align:center'>
	<tr bgcolor='#CCCCCC'>
		<th>№</th>
		<th>Enter</th>
		<th>Leave</th>
		<th>Time of staying</th>
	</tr>";
	if (isset($_COOKIE['count']) && isset($_COOKIE['time'])){
		$count = $_COOKIE['count'] + 1;
		$time = unserialize($_COOKIE['time']);
	  if(isset($_COOKIE['leavetime'])){
	  	$leavetime = unserialize($_COOKIE['leavetime']);
	  }
		$time[] = time();
		for ($i=0; $i < count($time); $i++) { 
			echo "<tr><td>$i</td><td>".date("H:i:s - d.m.Y", $time[$i])."</td>";
			if($i < count($leavetime)){ 
				echo "<td>".date("H:i:s - d.m.Y", $leavetime[$i])."</td><td>".($leavetime[$i]-$time[$i])."s</td></tr>";
			}
		}
		setcookie('count', $count, time() + 3600);
		setcookie('time', serialize($time), time() + 3600);
	}
	else {
		$count = 1;
		$time = [time()];
		setcookie('count',$count, time() + 3600);
		setcookie('time',serialize($time), time() +3600);
		echo "<tr><td>".date("H:i:s - d.m.Y", $time[0])."</td></tr>";
	}
	echo "</table>Привет! Вы посетили этот сайт $count раз(а)."
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Lab7</title>
</head>
<body>
	<form action="script.php">
		<input type="hidden" name="clear_cookie" value="clear">
		<input type="submit" value="Clear cookie">
	</form>
	<script language="JavaScript">
  window.onbeforeunload = confirmExit;
  function confirmExit(){
		var xhr = new XMLHttpRequest();
		xhr.open('GET', 'leave.php',false);
		xhr.send();
	}
</script>
</body>
</html>