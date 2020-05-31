<?php
$host = 'localhost';
$username ='root';
$password = '';
$database = 'phonebook';
$con = @mysqli_connect($host, $username, $password,$database);
if(!$con){
	die('could not connect'. mysqli_connect_error());
}

?>