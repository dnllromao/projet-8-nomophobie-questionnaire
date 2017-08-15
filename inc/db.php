<?php 

	include 'pdo.php';

	/* Script to create table from csv file
	https://stackoverflow.com/questions/32771556/create-mysql-table-dynamically-from-excel-csv-file */
	
	$ziptable = 'zipcodes';
	$file = 'zipcodes.csv';
	$datatable = 'data';


	// Read in only first row of CSV file
	$file = addslashes(realpath(dirname(__FILE__)).'\\files\\'.$file);
	$handle = fopen($file, "r");

	$row = 1; 
	$columns = [];

	while (($data = fgetcsv($handle, 1000, ",")) !== FALSE AND $row==1) {
	   $columns = $data;
	   $row++; 
	}

	//SQL string commands
	$createSQL = "CREATE TABLE IF NOT EXISTS $ziptable 
	              (id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,"
	              	.implode(" VARCHAR(255) NOT NULL, ", $columns). " 
	               	VARCHAR(255) NOT NULL)";

	$SQLCount = "SELECT COUNT(*) FROM $ziptable";

	//https://stackoverflow.com/questions/14083709/mysql-load-data-infile-auto-incremented-id-value
	$loadSQL = "LOAD DATA INFILE '$file' 
	            INTO TABLE $ziptable 
	            FIELDS TERMINATED BY ',' 
	            IGNORE 1 LINES
	            (".implode(", ", $columns).")
	            SET id = NULL";
	/* Had to disable 'secure_file_priv' in C:\wamp64\bin\mysql\mysql5.7.14/my.ini to avoid error 1290 as follow
	https://stackoverflow.com/questions/32737478/how-should-i-tackle-secure-file-priv-in-mysql/37837560#37837560 */

	$createStorage = "CREATE TABLE IF NOT EXISTS $datatable
					(id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
					score INT(10) NOT NULL,
					commune VARCHAR(255) NULL)";

	
	try {
		// Execute queries
		$S1TH = $db->query($createSQL);
		$S1TH->closeCursor();
		$S2TH = $db -> query($SQLCount);
		$S2THCount = $S2TH -> fetchColumn();
		$S2TH->closeCursor();
		if ($S2THCount == 0) {
			$S3TH = $db->query($loadSQL);
			$S3TH->closeCursor();
		}
		
		$S4TH = $db->query($createStorage);
		$S4TH->closeCursor();
	} catch (Exception $e){
		die('Error: '.$e->getMessage());
	}

/*	function get_zipcodes() {
		global $db, $ziptable;
		$data = [];

		$count = $db -> query("SELECT COUNT(*) FROM $ziptable");
		$totalNumberToFetch = $count -> fetchColumn();
		$count->closeCursor();
		var_dump($totalNumberToFetch);
		$portionSize = 10;

		// Having trouble with memory efficient ??? what should i do
		// this option doesn't separate data from template html , bof
		$db -> setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, false);
		// https://www.toptal.com/php/10-most-common-mistakes-php-programmers-make#commonMistake4
		for ($i=0; $i <= ceil($totalNumberToFetch / $portionSize) ; $i++) { 
			$limitFrom = $portionSize * $i;
			$limitTo = $portionSize * ($i + 1);

			$req = $db -> query("SELECT code_postal, localité from $ziptable LIMIT $limitFrom, $limitTo");
			if ($req) {
				while ($row = $req -> fetch(PDO::FETCH_ASSOC)) {
					array_push($data, $row);
				}
			}
			$req->closeCursor();
		}
		
		return $data;
	}*/

	function get_zipcodes($from, $to) {
		global $db, $ziptable;
		$req = $db -> query("SELECT id, code_postal, localité from $ziptable LIMIT $from, $to");
		return $req -> fetchAll(PDO::FETCH_ASSOC);
		$req->closeCursor();
	}


	function save_to_db($data) {
		global $db, $datatable;
		$req = $db -> prepare("INSERT INTO $datatable (score, commune) VALUES (?, ?)");
		$req -> execute($data);
		$req->closeCursor();
	}


	$req = $db -> query("SELECT commune, COUNT(*) from $datatable GROUP BY commune");
	$fg = $req -> fetchAll(PDO::FETCH_ASSOC);
	var_dump($fg);
	$req->closeCursor();