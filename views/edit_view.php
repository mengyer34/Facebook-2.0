
<?php
session_start();
require_once("../models/post.php");
require_once("../models/login_acc.php");

if (isset($_SESSION['user_id']) and !empty($_SESSION['user_id'])):
?>

<script src="https://cdn.tailwindcss.com"></script>
<div class="fixed z-30 inset-0 backdrop-blur-sm bg-gray-200 bg-opacity-50 transition-opacity" aria-hidden="true"></div>
<div class="h-2/3 flex justify-center mt-14 w-2/5 m-auto rounded-lg bg-white ring-1 ring-slate-900/5 shadow-lg">
    <div class="p-3 z-50 fixed rounded shadow-2xl w-2/5 m-auto bg-white backdrop-blur-none">
        <?php
            // Get the id of the post needed to update
            $profile = getUserInfo($_SESSION['user_id'])['profile']; 
            $id=$_GET['id'];
            // Get data from the database of the post
            $item = getPostById($id);
            if($item != null){
        ?>
        <form action="/controllers/edit_post.php" method="post" class="space-y-3">
            <div class="w-full absolute flex justify-end pr-9">
                <a href="/index.php" class="hover:bg-gray-200 p-1 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="hover:text-red-600 h-6 w-6 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </a>
            </div>
            <?php
            $userInfo = getUserInfo($_SESSION['user_id']);
            $firstN = $userInfo['first_name'];
            $lastN =  $userInfo['last_name'];
            ?>
            <h2 class="text-2xl pb-4 font-bold text-blue-400 text-center border-b">Edit post</h2>
            <li class="flex py-2 first:pt-0 last:pb-0 items-center">
                <img class="object-cover h-12 w-12 rounded-full" src="/images/user/<?= $userInfo['profile']; ?>">
                <p class="ml-5 text-lg font-bold text-slate-900"><?= $firstN; ?> <?= $lastN; ?> </p>
            </li>
            <input type="hidden" value="<?php echo $id ?>" name="id">
            <div id="" class="object-cover w-full <?= $item['image']!=null?"h-72":"" ?> scrolling-auto overflow-auto">
                <div class="-mt-1">
                    <textarea placeholder="What's on your mind?" class="w-full h-14 outline-none resize-none" name="post_description" rows="4"><?php echo $item['post_description'] ?></textarea>
                </div>
                <?php
                // Check for null image
                if($item['image'] != null):
                ?>
                <div class="overscroll-contain w-full p-1">
                    <div class="relative flex justify-end">
                        <div class="bg-slate-200 p-3 absolute z-10">
                            <svg xmlns="http://www.w3.org/2000/svg" onclick="deleteImg(event)" class="delete h-6 w-6 hover:text-red-700 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                        </div>
                        <img src="../images/<?php echo $item['image']?>" alt="" class="w-full">
                        <input type="hidden" name="image" value = "<?php echo $item['image']?>">
                    </div>
                </div>
            </div>
            <?php
            endif;
            ?>
            <div >
                <button class="block w-full bg-blue-400 p-3 mt-3 rounded text-white font-bold text-lg" type="submit">Save</button>
            </div>
        </form>
        <?php
            } else {
                header('location: /index.php');
            }
        ?>
    </div>
    <script src="../js/main.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</div>
<?php 
else:
header('location: /index.php');
endif;

?>