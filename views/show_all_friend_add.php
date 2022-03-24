<?php 
    $page = "friends";
    session_start();
    require_once(realpath(dirname(__FILE__) . '/../models/friend.php'));
    require_once(realpath(dirname(__FILE__) . '/../templates/header.php'));
    if (isset($_SESSION['user_id']) and !empty($_SESSION['user_id'])):

?>
<script
src="https://code.jquery.com/jquery-3.6.0.min.js"
integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
crossorigin="anonymous"></script>
<script src="https://cdn.tailwindcss.com"></script>
<div class='flex flex-col items-center min-h-screen p-4 bg-slate-200'>
    <div class="flex mt-20 items-center justify-center space-x-3">   
        <button class="bg-blue-500 shadow-xl px-4 py-2 font-semibold text-white inline-flex items-center space-x-2 rounded">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
            <span>All Friends</span>
        </button>
        <a href="/views/list_friend.php" class="hover:bg-blue-500 hover:shadow-xl bg-blue-300 px-4 py-2 font-semibold text-white inline-flex items-center space-x-2 rounded">
            <i class="fa fa-user-plus"></i>
            <span>Add Friends</span>
        </a>
    </div>
    <div class='user-list w-full mt-6 max-w-lg mx-auto bg-white rounded shadow-xl flex flex-col py-4'>
        <?php 
            $users_id = seeOwnFriend($_SESSION['user_id']);
            foreach($users_id as $user_id):
                $friend =  $user_id['friend_id'];
                $friendInfo = show_user($friend);
                ?>  
        <!--User row -->
        <div id="content<?=$friendInfo['user_id']?>" class="user-row flex flex-col items-center justify-between cursor-pointer p-4 duration-300 sm:flex-row sm:py-4 sm:px-8 hover:bg-[#f6f8f9]">
            <div class="user flex items-center text-center flex-col sm:flex-row sm:text-left">
                <div class="avatar-content mb-2.5 sm:mb-0 sm:mr-2.5">
                    <img class="avatar w-20 h-20 rounded-full" src="/images/user/<?=$friendInfo['profile']?>">
                </div>
                <div class="user-body flex flex-col mb-4 sm:mb-0 sm:mr-4">
                    <a href="#" class="title font-medium no-underline"><?=$friendInfo['first_name'] ?> <?=$friendInfo['last_name'] ?></a>
                    <div class="skills flex flex-col">
                        <span class="subtitle text-slate-500"><?=$friendInfo['email'] ?></span>
                    </div>
                </div>
            </div>
            <!--Button content -->
            <div class="user-option mx-auto sm:ml-auto sm:mr-0">
                <form method="post">
                    <input type="hidden" name="friend_id" value="<?=$friendInfo['user_id']?>">
                    <button id="btn_addfriend<?=$friendInfo['user_id']?>" onclick="unFriend(<?=$friendInfo['user_id']?>)" class="btn inline-block select-none no-underline align-middle cursor-pointer whitespace-nowrap px-4 py-1.5 rounded text-base font-medium leading-6 tracking-tight text-white text-center border-0 bg-[#11aae7] hover:bg-[#0a9ecb] duration-300 " type="button">Unfriend</button>
                </form>
            </div>
            <!--Close Button content -->
        </div>
        <!--User row -->
        <?php 
        endforeach;
        ?>
        <a class="show-more block w-10/12 mx-auto py-2.5 px-4 text-center no-underline rounded hover:bg-[#f6f8f9] font-medium duration-300" href="#/">Show more friends</a>
    </div>
</div>
<script src="/js/add_friend.js"></script>
<script src="/js/unfriend.js"></script>
<?php 
else:
    header('location: /index.php');
endif;
?>