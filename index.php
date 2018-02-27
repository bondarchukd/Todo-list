<?php
require_once('database.php');
session_start();

// SET TIME-ZONE GREETING
date_default_timezone_set('Europe/Moscow');
// G - 24-hour format of an hour without leading zeros (0 through 23)
$Hour = date('G');
if ( $Hour >= 5 && $Hour <= 11 ) {
    $Greeting = "Good Morning!";
} else if ($Hour >= 12 && $Hour <= 18 ) {
    $Greeting = "Good Afternoon!";
} else if ( $Hour >= 19 || $Hour <= 4 ) {
    $Greeting = "Good Evening!";
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home page</title>
</head>
<body>
<?php 
if($_GET) {
	if ($_GET["status"] == 1) {
		echo "Registed";
		echo "<br><br><h1>Welcome</h1><br>";
		if (isset($_SESSION["username"])) {
		echo "<h1>" .$_SESSION["username"]. " " .$Greeting."</h1>";
	}
		}
	else {		
			echo "Logined";
			echo "<br><br><h1>Welcome</h1><br>";
	}
}
else {
	Header ('Location: http://localhost:8888/PHP-learning/index.php');
	// Chech this code because of round linking
}	
echo "<a href ='database_page.php'><button>Admin page</button></a>";
echo "<a href = 'weather.html'><button>Get weather!</button></a><br><br>";
echo "<a href ='logout.php'>Logout</a><br>";
?>
</body>
</html>