<?php
require_once('database.php');
?>
<?php 
function getIdUser($email){
    global $db;
    $statement = $db->prepare("SELECT * FROM users WHERE email = :email;");
    $statement->execute([
        ':email' => $email
    ]);
    return ($statement->rowCount() == 1);
}
?>