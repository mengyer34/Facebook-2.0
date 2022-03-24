<?php
require_once('../models/post.php');

$id = $_POST['user_id'];
$new_name = "";
$image = $_FILES["image"]["tmp_name"]; 
$name = $_FILES["image"]["name"]; 
$type = pathinfo($name, PATHINFO_EXTENSION); 
$location = strtolower($type);
$new_name = uniqid("IMG-", true). "." .$location;

// INSERT FILES IMAGE INTO FOLDER IMAGES
move_uploaded_file($image,'../images/user/'. $new_name);


uploadProfile($new_name,$id);

header('location: /views/profile.php');
