<?php
require_once('../models/comment.php');

$comment_id = $_POST['comment_id'];
$comment = $_POST['comment'];
updateComment($comment,$comment_id);
header('location: /index.php');