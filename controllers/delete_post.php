<?php
require_once("../models/post.php");
$id = $_GET['id'];
echo $id;
$img_name = getPicName($id);
if (deleteItem($id)){
    deleteItem($id);
    deletePicFromFolder($img_name);
    header('location: /index.php');
}else{
    echo "Cannot delete item with id";
}

