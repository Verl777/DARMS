<?php 
// Initiating and assigning variables to an array db
$db['db_host']="localhost";
$db['db_user']="root";
$db['db_pass']="";
$db['db_name']="darms";

//for each statement to convert parameters to constants that connect the database
foreach($db as $key => $value){
    //use the inbuilt function define to change to constants
    define(strtoupper($key),$value);
}
//Call the connection using mysqliconnect
$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

// if($connection){
//     echo "Connected";
// }
define ('ROOT_PATH', realpath(dirname(__FILE__)));
	define('BASE_URL', 'http://localhost/HS/');
    ?>
