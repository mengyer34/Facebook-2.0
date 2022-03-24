<?php
session_start();
require_once('../models/post.php');
require_once('../models/like.php');

$like_status = 1;
$post_id = $_POST['post_id'];
$user_id = $_SESSION['user_id'];
userLike($like_status,$post_id, $user_id);
getNumberLike($post_id);
header('location: /index.php');