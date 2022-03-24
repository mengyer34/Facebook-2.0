// Insert user add friend to db 
function addComment(itemid) 
{
        let comment_id = "#comment"+itemid;
        let comment =  $(comment_id).val();
        $(document).ready(function() {
        $.ajax({
            url: '/controllers/create_comment.php',
            type: 'POST',
            data: {
                post_id: itemid,
                post_comment: comment
            },
            success: function(msg) {
                $("body").load(location.href);
            }               
        });
    });
}

function bannedSubmit(event)
{
    let bool = true;
    if(event.keyCode==13){
        bool = false;
    }
    return bool;
}
