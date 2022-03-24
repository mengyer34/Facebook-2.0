<?php
require_once("../models/comment.php");
$id = $_GET['id'];
deleteComment($id);

header('location: /index.php');