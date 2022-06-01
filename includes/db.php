<?php 
// Initiating and assigning variables to an array db
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "darms";

//for each statement to convert parameters to constants that connect the database
//foreach($db as $key => $value){
    //use the inbuilt function define to change to constants
    //define(strtoupper($key),$value);
//}
//Call the connection using mysqliconnect
//$connection = mysqli_connect(db_host,DB_USER,DB_PASS,DB_NAME);
$connection = mysqli_connect($hostname, $username, $password, $dbname);
  if(!$connection){
    echo "Database connection error".mysqli_connect_error();
  }

// if($connection){
//     echo "Connected";
// }
define ('ROOT_PATH', realpath(dirname(__FILE__)));
	define('BASE_URL', 'http://localhost/HS/');
