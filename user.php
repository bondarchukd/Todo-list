<?php

session_start();

$connection = mysqli_connect("mysql.j820528.myjino.ru", "j820528", "dbondarchuk1", "j820528_test");

if (isset($connection)) {
	echo ' Status: connected <br>';
}

$result = mysqli_query($connection,"SELECT * from Users WHERE Email='".$_SESSION['login']."' and Password='".$_SESSION['pass']."'");

if(mysqli_num_rows($result)!=1){    //такого пользователя нет

    // Header("Location: http://localhost:8888/PHP-learning/login.html");/ /перенаправляем на login.php
    // Header("login.html");
    Header("Location: http://localhost/PHP-learning/login.html"); //перенаправляем на login.php
}
else {

date_default_timezone_set('Europe/Moscow');


// SET TIME-ZONE GREETING
// G - 24-hour format of an hour without leading zeros (0 through 23)
$Hour = date('G');

if ( $Hour >= 5 && $Hour <= 11 ) {
    $Greeting = "Good Morning!";
} else if ($Hour >= 12 && $Hour <= 18 ) {
    $Greeting = "Good Afternoon!";
} else if ( $Hour >= 19 || $Hour <= 4 ) {
    $Greeting = "Good Evening!";
}

echo "<h1>".$Greeting."</h1>";
echo "<h3>You have been registered successfuly</h3>";
echo "Welcome " . $_SESSION['login'] . "! <br>";
echo "<a href ='database_page.php'><button>Admin page</button></a>";
echo "<a href = 'weather.html'><button>Get weather!</button></a><br><br>";
echo "<a href ='logout.php'>Logout</a><br>";
}

?>

