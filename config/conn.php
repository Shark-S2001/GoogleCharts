<?php
	/**
	 * block attempts to directly run this script
	 */
	//Connection Parameters
	$server = "localhost";
	$db ="gsmt_reports";
	$uid ="root";
	$pwd ="Kiarithaini";

	try{
		$pdo = new PDO("mysql:host=$server;dbname=$db", $uid,$pwd);
		
		// set the PDO error mode to exception
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	}catch(PDOException $e){
		throw new Exception($e->getMessage());
		
	}
	function ServerConnection(){
			
	}
?>