<?php 
session_start();
$show = 'views/login.php'; 
if (isset($_SESSION['user_id']) and !empty($_SESSION['user_id']))
{
    $show = 'views/post_view.php';
}
require_once $show;
?>

