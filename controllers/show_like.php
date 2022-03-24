<?php
require_once('../models/post.php');
require_once('../models/like.php');

$post_id = $_POST['post_id'];
getNumberLike($post_id);