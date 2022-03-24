<?php
require_once('../models/post.php');

$id = $_POST['id'];
$post_description = $_POST['post_description'];
$post_image = $_POST['image'];
updatePost($id,$post_description, $post_image);
if (file_exists('/views/profile.php')) {
    header('location: /views/profile.php');
} else {
    header('location: /index.php');
}