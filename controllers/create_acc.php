
<?php
require_once('../models/post.php');

date_default_timezone_set("Asia/Bangkok");

$first_name = $_POST['first-name'];
$last_name = $_POST['last-name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$country = $_POST['country'];
$date_of_birth = $_POST['birthday'];
$gender = $_POST['gender'];
$pwd = $_POST['password'];
$password = password_hash($pwd,PASSWORD_DEFAULT);
$create_date = date('Y-m-d');
$profile = "female.png";

if($gender=="Male"){
    $profile = "male.png";
}
if(createAcc($first_name,$last_name,$phone,$email,$country,$date_of_birth,$gender,$password,$create_date,$profile)) {

    header('location: /index.php');
}else {
    echo "<script>alert('You cannot create account! Your email already have an account!! Please Try with other email address!!')</script> ";
    header('location: /views/register.php');

}

