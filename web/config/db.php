<?php 
try {
	$dsn = 'mysql:host=localhost;dbname=ajax';
	$username = 'root';
	$password = '';
	$options = array(
		PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
	);
	$dbh = new PDO($dsn, $username, $password, $options);

} catch (Exception $exc) {
	echo $exc->getMessage();
}