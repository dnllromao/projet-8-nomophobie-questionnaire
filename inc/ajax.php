<?php 

	include 'db.php';

	// https://stackoverflow.com/questions/23750661/send-json-object-from-javascript-to-php
	//header('Content-type: application/json');
	$json = file_get_contents('php://input');
	$params = json_decode($json, true);
	//var_dump($params));
	if (is_null($params)) {
		echo $S2THCount;
	} else {
		$data = get_zipcodes($params['from'], $params['to']);
		//var_dump($data);
		$json_encode = json_encode($data);
		echo $json_encode;
	}

	
