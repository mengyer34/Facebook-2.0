<?php
require_once('database.php');
?>

<?php 

function createPost($post_description,$image,$post_date,$user_id)
{
    global $db;
    $statement = $db->prepare("INSERT INTO posts (post_description,image,post_date,user_id) VALUES (:post_description,:image,:post_date,:user_id)");
    $statement->execute([
        'post_description' => $post_description,
        'image' => $image,
        'post_date' => $post_date,
        'user_id' => $user_id
    ]);

    return ($statement->rowCount() == 1);

}


?>