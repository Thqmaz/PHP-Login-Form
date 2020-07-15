<?php
/*
BE SURE TO CHANGE THE DATABASE HOST, USER, PASSWORD AND NAME BELOW!
*/
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "dbName";

$connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if(!$connection) {
	die ("Couldn't connect to the database. -> " . $connection->connect_error);
}
?>
