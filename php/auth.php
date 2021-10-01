<?php
require_once("../config/conn.php");

$user_name = $_POST["user_name"];
$pass_word = $_POST["pass_word"];
// $user_name = 'Shark_s2001';
// $pass_word= '1234';

UserLogin($pdo,$user_name,$pass_word);

function UserLogin($pdo,$user_name,$pass_word){
    $response =[];

    $stmt = $pdo->prepare("SELECT * From user WHERE username=? && password=?");
    $stmt->execute(array($user_name,$pass_word));
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    
    if($data){
        $response['status'] ="success";
        $response['message'] ="Logged In Successfully";
    }else{
        $response['status'] ="Error";
        $response['message'] ="Unable to Log In";
    }
    
    header("Content-type:application/json;charset=UTF-8");
    echo json_encode($response);

}



?>