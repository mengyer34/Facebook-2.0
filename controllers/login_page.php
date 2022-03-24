
<?php 
session_start();

require_once('../models/login_acc.php');
$email = $_POST['email'];
$user_id = getIdUser($email)['user_id'];
echo $email . "<br>";
$input_password = $_POST['password'];
echo "user Input " . $input_password . " <br>";

$db_password = user_password($email)['password']; // From Database
echo "db_password . " . $db_password . "<br>";



if(password_verify($input_password, $db_password)) {
    $_SESSION['user_id'] = $user_id;
    echo "Password verified";
    header('location: /index.php');
    
} else {
    header('location: /index.php');
}
