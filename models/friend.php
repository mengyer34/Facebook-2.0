<?php 
require_once('database.php');


function allUser($user_id)
{
    global $db;
    $statement = $db->prepare("SELECT * FROM users WHERE user_id != :user_id;");
    $statement->execute([
        ':user_id'=> $user_id
    ]);
    $items = $statement->fetchAll();
    return $items;
}
function show_user($user_id)
{
    global $db;
    $statement = $db->prepare("SELECT * FROM users WHERE user_id = :user_id;");
    $statement->execute([
        ':user_id'=> $user_id
    ]);
    $item = $statement->fetch();
    return $item;
}

function addFriend($user_id, $friend_id)
{
    global $db;
    addFriend៌៌៌៌_Nrow($user_id, $friend_id);
    $statement = $db->prepare("INSERT INTO friends (user_id, friend_id) SELECT * FROM (SELECT :user_id, :friend_id) AS tmp WHERE NOT EXISTS (SELECT user_id FROM friends WHERE user_id = :user_id AND friend_id = :friend_id) LIMIT 1;");
    $statement->execute([
        ':user_id' => $user_id,
        ':friend_id' => $friend_id
    ]);
    return ($statement->rowCount() == 1);
}

function addFriend៌៌៌៌_Nrow($user_id, $friend_id)
{
    global $db;
    $statement = $db->prepare("INSERT INTO friends (user_id, friend_id) SELECT * FROM (SELECT :friend_id, :user_id) AS tmp WHERE NOT EXISTS (SELECT user_id FROM friends WHERE user_id = :friend_id  AND friend_id =:user_id) LIMIT 1;");
    $statement->execute([
        ':user_id' => $user_id,
        ':friend_id' => $friend_id
    ]);
    return ($statement->rowCount() == 1);
}



function seeOwnFriend($user_id){
    global $db;
    $statement = $db->prepare("SELECT friend_id FROM friends where user_id=:user_id order by friend_id desc;");
    $statement->execute([
        ':user_id'=> $user_id
    ]);
    $items = $statement->fetchAll();
    return $items;
}

function notFriends($user_id){
    global $db;
    $statement = $db->prepare("SELECT users.user_id FROM users where users.user_id!=:user_id and users.user_id not in (SELECT friends.friend_id from friends where friends.user_id=:user_id) order by users.user_id desc;");
    $statement->execute([
        'user_id'=> $user_id
    ]);
    $items = $statement->fetchAll();
    return $items;
}

function unFriend($user_id, $friend_id)
{
    global $db;
    $statement = $db->prepare("DELETE FROM friends WHERE (user_id = :user_id AND friend_id=:friend_id) OR (user_id = :friend_id AND friend_id=:user_id);");
    $statement->execute([
        ':user_id' => $user_id,
        ':friend_id' => $friend_id
    ]);
    return ($statement->rowCount() == 2);
}

?>