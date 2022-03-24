<?php 
require_once('database.php');

function user_login($email, $password)
{
    global $db;
    $statement = $db->prepare("SELECT * FROM users WHERE email = :email AND password = :password ;");
    $statement->execute([
        ':email'=>$email,
        ':password'=>$password
    ]);
    return ($statement->rowCount()==1);
}

function user_password($email)
{
    global $db;
    $statement = $db->prepare("SELECT * FROM users WHERE email = :email");
    $statement->execute([
        ':email'=>$email
    ]);
    $item = $statement->fetch();
    return $item;
}

function getIdUser($email){
    global $db;
    $statement = $db->prepare("SELECT * FROM users WHERE email = :email;");
    $statement->execute([
        ':email' => $email
    ]);
    $item = $statement->fetch();
    return $item;
}

function getUserInfo($userId){
    global $db;
    $statement = $db->prepare("SELECT * FROM users WHERE user_id = :user_id");
    $statement->execute([
        ':user_id'=>$userId
    ]);
    $item = $statement->fetch();
    return $item;
}
