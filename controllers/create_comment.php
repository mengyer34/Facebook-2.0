<?php
session_start();
require_once('../models/comment.php');

// SET TIME AS TIME IN BANGKOK
date_default_timezone_set("Asia/Bangkok");

// GET DATA FROM POST
$comment = $_POST['post_comment'];
$comment_date = date('Y-m-d H:i:s');
$user_id = $_SESSION['user_id'];
$post_id = $_POST['post_id'];
if($comment!=""){
    createCommentByPost($post_id, $comment, $user_id, $comment_date);
}

header('location: /index.php');