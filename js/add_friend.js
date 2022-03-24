// Insert user add friend to db 
function addFriend(itemid) 
{
        $(document).ready(function() {
        $.ajax({
            url: '/controllers/add_friend.php',
            type: 'POST',
            data: {
                friend_id: itemid,
            },
            success: function(msg) {
                 let btn = document.getElementById("btn_addfriend"+itemid);
                 btn.textContent = "Added"
                 btn.setAttribute("class", "btn inline-block select-none no-underline align-middle cursor-pointer whitespace-nowrap px-4 py-1.5 rounded text-base font-medium leading-6 tracking-tight text-white text-center border-0 bg-slate-100 text-blue-400");
                 btn.disabled = true;
            }               
        });
    });
}