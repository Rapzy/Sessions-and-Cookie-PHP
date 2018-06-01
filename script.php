<?php
if(isset($_COOKIE['count'])){
	if((isset($_GET['clear_cookie'])) && ($_GET['clear_cookie'] == "clear")){
		echo "Куки удалены!<br>";
		setcookie('count','1',time() -1);
	}
}
else{
	echo "Куки не существует<br>";
}
echo "<a href='index.php'>Home</a>";

