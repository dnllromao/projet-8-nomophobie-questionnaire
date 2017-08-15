<?php 
	
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$database = 'test';
	
	// Open database connection
	try {
		$db = new PDO('mysql:host=localhost;dbname=becode;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

	} catch (Exception $e){
		die('Error: '.$e->getMessage());
	}
