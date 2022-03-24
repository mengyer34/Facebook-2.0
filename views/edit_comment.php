<?php
session_start();
require_once("../models/comment.php");
if (isset($_SESSION['user_id']) and !empty($_SESSION['user_id'])):


?>
<script src="https://cdn.tailwindcss.com"></script>
<div class="fixed z-30 inset-0 backdrop-blur-sm bg-gray-200 bg-opacity-50 transition-opacity" aria-hidden="true"></div>
<div class="h-2/3 flex justify-center mt-14 w-2/5 m-auto rounded-lg bg-white ring-1 ring-slate-900/5 shadow-lg">
    <div class="p-3 z-50 fixed rounded shadow-2xl w-2/5 m-auto bg-white backdrop-blur-none">
        <?php
        $id=$_GET['id'];
        // Get data from the database of the comment
        $comment_item = getCommentById($id);
        ?>
        <form action="/controllers/edit_comment.php" method="post">
            <div class="w-full absolute flex justify-end pr-9">
                    <a href="/index.php" class="hover:bg-gray-200 p-1 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="hover:text-red-600 h-6 w-6 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </a>
            </div>
            <h2 class="text-2xl pb-4 font-bold text-blue-400 text-center border-b">Edit Comment</h2>
            <input type="hidden" value="<?=$comment_item['comment_id']?>" name="comment_id">
            <li class="flex py-2 first:pt-0 last:pb-0 items-center">
                <img class="object-cover h-12 w-12 rounded-full" src="../images/<?=$comment_item['profile']?>"/>
                <p class="ml-5 text-lg font-bold text-slate-900"><?=$comment_item['username']?></p>
            </li>
            <div class="-mt-1">
                <textarea placeholder="What's on your mind?" class="w-full h-14 outline-none resize-none mt-2" name="comment" rows="4"><?php echo $comment_item['comment'] ?></textarea>
            </div>
            <button type="submit" class="rounded w-full p-2 bg-blue-400 m-auto text-lg font-extrabold">Change</button>
        </form>
    </div>
</div>
</div>

<?php 
    else:
        header('location: /index.php');
    endif;
?>