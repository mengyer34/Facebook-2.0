<?php
session_start();
require_once('../models/friend.php');

$user_id = $_SESSION['user_id'];
$friend_id = $_POST['friend_id'];
unFriend($user_id, $friend_id);
header('location: /index.php');