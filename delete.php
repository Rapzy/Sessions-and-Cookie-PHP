<?php
if(isset($_COOKIE['count']))
{
	if((isset($_GET['command'])) && ($_GET['command'] == "delete"))
	{
		setcookie('count','',time()-1);
		setcookie('time','',time()-1);
		setcookie('leavetime','',time()-1);
		echo "<h2>Cookies are deleted!</h2>";
	}
}
else
{
	echo "<h2>Cookies aren't found!</h2>";
}
echo "<a href='index.php'><h3>Home</h3></a>";

