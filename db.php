<?php
$host = 'localhost';
$port = '3306';
$username = 'test';
$password = 'test';
$database = 'testowa';
try{

	$pdo = new PDO('mysql:host='.$host.';dbname='.$database.';port='.$port, $username, $password );

}catch(PDOException $e){

	echo 'Połączenie nie mogło zostać utworzone.<br />';

}

?>