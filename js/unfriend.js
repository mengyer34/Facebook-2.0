// Insert user add friend to db 
function unFriend(itemid) 
{
        $(document).ready(function() {
        $.ajax({
            url: '/controllers/unfriend.php',
            type: 'POST',
            data: {
                friend_id: itemid,
            },
            success: function(msg) {
                 let btn = document.getElementById("btn_addfriend"+itemid);
                 btn.textContent = "Unfriend";
                 let content_friend = document.getElementById("content"+itemid);
                 content_friend.style.display = "none";
            }               
        });
    });
}