<?php
	if (!isset($_COOKIE['count']) || !isset($_COOKIE['time']))
	{
		$count = 1;
		$time = [time()];
		$strTime = 'time';
	}
	else
	{
		$count = $_COOKIE['count']+1;
		$time = unserialize($_COOKIE['time']);
		$time[] = time();
		if(isset($_COOKIE['leavetime']))
			$leavetime = unserialize($_COOKIE['leavetime']);
		$strTime = 'times';
	}
	setcookie('count', $count, time() + 3600);
	setcookie('time', serialize($time), time() + 3600);
	echoTable();
	for ($i=0; $i < $count; $i++) 
	{ 
		echo "<tr><td>".($i+1)."</td><td>".date("H:i:s - d.m.Y", $time[$i])."</td>";
		if(isset($leavetime) && $i < count($leavetime))
		{ 
			echo "<td>".date("H:i:s - d.m.Y", $leavetime[$i])."</td><td>".($leavetime[$i]-$time[$i])."s</td></tr>";
		}
	}
	function echoTable()
	{
		echo "<table width='600px' style='text-align:center'>
		<tr bgcolor='#CCCCCC'>
			<th>№</th>
			<th>Enter</th>
			<th>Leave</th>
			<th>Time of staying</th>
		</tr>";
	}
	echo "</table><h3>Hello! You visited this site $count $strTime.</h3>"
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sessions and Cookie PHP</title>
</head>
<body>
	<form action="delete.php">
		<input type="hidden" name="command" value="delete">
		<input type="submit" value="Delete cookies">
	</form>
	<script language="JavaScript">
		window.onbeforeunload = confirmExit;
		function confirmExit()
		{
			var xhr = new XMLHttpRequest();
			xhr.open('GET', 'leave.php',false);
			xhr.send();
		}
	</script>
</body>
</html>