<?php
// database 
require_once("database.php");

// Get all the comments
function getCommentsByPostId($post_id){
    global $db;
    $statement = $db->prepare("SELECT * FROM users_comments where post_id=:id order by comment_id DESC");
    $statement->execute([
        ':id' => $post_id
    ]);
    return $statement->fetchAll();
}

function getNumberOfComments($post_id){
    global $db;
    $statement = $db->prepare("SELECT count(comments.post_id) as numberOfComments from comments where post_id=:id");
    $statement -> execute([
        ':id'=>$post_id
    ]);
    return $statement->fetch();
}

function getCommentById($id){
    global $db;
    $statement = $db -> prepare("SELECT * FROM users_comments where comment_id=:id");
    $statement -> execute([
        ':id'=>$id
    ]);
    return $statement -> fetch();
}

function createCommentByPost($post_id, $comment, $user_id, $comment_date){
    global $db;
    $statement = $db -> prepare("INSERT INTO comments(comment, user_id, post_id, comment_date) VALUES (:comment, :user_id, :post_id, :comment_date)");
    $statement -> execute([
        ':comment' => $comment,
        ':user_id' => $user_id,
        ':post_id' => $post_id,
        ':comment_date' => $comment_date
    ]);
    return ($statement->rowCount() == 1);
}

function updateComment($comment, $comment_id)
{
    global $db;
    $statement = $db->prepare("UPDATE users_comments SET comment=:comment WHERE comment_id=:comment_id");
    $statement->execute([
        ':comment'=> $comment,
        ':comment_id'=>$comment_id
    ]);
    return ($statement->rowCount() == 1);
}

function deleteComment($id)
{
    global $db;
    $statement = $db->prepare("DELETE FROM comments WHERE comment_id = :id");
    $statement->execute([
        ':id' => $id
    ]);
    return ($statement->rowCount()==1);
}