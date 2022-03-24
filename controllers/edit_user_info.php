<?php
require_once('../models/post.php');

$first_name = $_POST['first-name'];
$last_name = $_POST['last-name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$country = $_POST['country'];
$date_of_birth = $_POST['birthday'];
$gender = $_POST['gender'];
$user_id = $_POST['id'];



//COVER IMAGE
if (!empty($_FILES['coverimg']['tmp_name'])) {

    $new_cover_name = "";
    $image_cover = $_FILES["coverimg"]["tmp_name"]; 
    $name_cover = $_FILES["coverimg"]["name"]; 
    $type_cover_img = pathinfo($name_cover, PATHINFO_EXTENSION); 
    $location_cover_img = strtolower($type_cover_img);
    $new_cover_name = uniqid("IMG-", true). "." .$location_cover_img;
    
    move_uploaded_file($image_cover,'../images/cover/'. $new_cover_name);
    
    uploadCover($new_cover_name,$user_id);
}

// PROFILE IMAGE
$new_profile_name = "";
if(!empty($_FILES['imgprofile']['tmp_name'])) {

    $image = $_FILES["imgprofile"]["tmp_name"]; 
    $name = $_FILES["imgprofile"]["name"]; 
    $type = pathinfo($name, PATHINFO_EXTENSION); 
    $location = strtolower($type);
    $new_profile_name = uniqid("IMG-", true). "." .$location;
    
    // INSERT FILES IMAGE INTO FOLDER IMAGES
    move_uploaded_file($image,'../images/user/'. $new_profile_name);
    uploadProfile($new_profile_name,$user_id);
}

updateUserInfo($first_name,$last_name,$phone,$email,$country,$date_of_birth,$gender,$user_id);
header('location: /views/profile.php');



