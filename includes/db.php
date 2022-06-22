<?php
// Initiating and assigning variables to an array db
$hostname = "localhost";
$username = "Valerian";
$password = "#Valeriephyl254";
$dbname = "darms";


//Call the connection using mysqliconnect

$connection = mysqli_connect($hostname, $username, $password, $dbname);
if (!$connection) {
  echo "Database connection error" . mysqli_connect_error();
}


define('ROOT_PATH', realpath(dirname(__FILE__)));//function in php which returns the full directory path of a file
define('BASE_URL', 'http://localhost/HS/');//location of the index.php file
