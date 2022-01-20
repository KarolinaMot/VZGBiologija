<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$servername = "sql210.epizy.com";
$username = "epiz_30806071";
$password = "eNYVy0DSp1hV4kq";
$database = "epiz_30806071_vzgBiologija";

$conn = new mysqli($servername, $username, $password, $database);

if($conn->connect_error){
	die("Connection failed ".$conn->$connect_error);
}

?>