<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', '185.214.124.7');
define('DB_USERNAME', 'u136509650_hms');
define('DB_PASSWORD', 'Admin123');
define('DB_NAME', 'u136509650_hms');


/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($link === false){  
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
