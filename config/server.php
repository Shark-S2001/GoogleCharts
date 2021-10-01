<?php
    //Connection Parameters
    $server = "192.168.6.89";
    $db ="supplier_bi_portal";
    $uid ="root";
    $pwd ="";

    try{
        $pdo = new PDO("mysql:host=$server;dbname=$db", $uid,$pwd);

        // set the PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }catch(PDOException $e){
        throw new Exception($e->getMessage());
        
    }

?>