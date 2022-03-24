<?php 
    require_once(realpath(dirname(__FILE__) . '/../models/login_acc.php'));
?>

<script
src="https://code.jquery.com/jquery-3.6.0.min.js"
integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
crossorigin="anonymous"></script>
    
<?php 
     $name =  getUserInfo($_SESSION['user_id']);
     $firstN = $name['first_name'];
     $lastN =  $name['last_name'];
?>

<?php
    if (isset($_SESSION['user_id']) and !empty($_SESSION['user_id'])):
?>

<!-- Get all data from database and display it -->
<div id="create_page" class="mt-28 block m-auto w-3/6 rounded-lg bg-white ring-1 ring-slate-900/5 shadow-lg space-y-3">
   <div class="header p-4 pb-0">
        <ul role="list" class="p-0 divide-y divide-slate-200">
            <li class="flex py-4 first:pt-0 last:pb-0">
                <img class="object-cover h-12 w-12 rounded-full" src="images/user/<?=$name['profile'] ?>" alt="" width=""/>
                <div class="open-create ml-6 p-3 bg-slate-100 rounded-full w-4/5 cursor-pointer">What on your mind?</div>
            </li>
            <li class="flex first:pt-0 last:pb-0 justify-around">
                <button class="open-create py-2 w-1/2 flex justify-center items-center"><svg class="w-8 h-8 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    Photo
                </button>
                <button class="py-2 w-1/2 flex justify-center border-l items-center"><svg class="w-8 h-8 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Feeling/activity
                </button>
            </li>
        </ul>
    </div>
</div>

<div id="my-modal" class="hidden fixed z-50 inset-0 mt-10">
  <div class="flex items-end justify-center min-h-screen px-4 pb-20 text-center sm:block sm:p-0">
    <div class="m-auto fixed inset-0 backdrop-blur-sm bg-gray-200 bg-opacity-50 transition-opacity" aria-hidden="true"></div>
    <div class="w-2/5 h-2/3 m-auto p-6 backdrop-blur-none mt-3 block max-w-xl rounded-lg bg-white ring-1 ring-slate-900/5 shadow-lg space-y-3">
        <h2 class="text-2xl pb-4 font-bold text-blue-400 text-center border-b">Create post</h2>
        <div class="w-full text-right flex justify-between">
            <li class="flex first:pt-0 last:pb-0 items-center">
                 <img class="object-cover h-12 w-12 rounded-full" src="/images/user/<?=$name['profile'] ?>" alt="" width=""/>
                 <p class="ml-5 text-lg font-bold text-slate-900"><?= $firstN ." ". $lastN; ?></p>
             </li>
             <div class="p-1 absolute top-6 right-4 cursor-pointer rounded-full hover:bg-slate-300 hover:text-red-500">
                 <svg onclick="close_create()" xmlns="http://www.w3.org/2000/svg" class=" h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                     <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                 </svg>
             </div>
        </div>
        <form action="../controllers/create_post.php" method="post" enctype="multipart/form-data">
            <div class="object-cover w-full h-72 scrolling-auto overflow-auto overscroll-contain p-1">
                <textarea class="w-full resize-none outline-none p-2" name="post_description" id="post_content" rows="2" placeholder="Descrition..."></textarea>
                <div id="content_show_img" class="flex justify-center mt-4 mb-4 relative">
                    <img class="flex w-full" src="" id="output" alt="">
                    <div class="bg-slate-200 p-3 absolute right-0 z-20" id="remove_photo" style="display: none;" onclick="clear_img()">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:text-red-700 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                    </div>
                </div>
                <div class="flex justify-center border-dashed border-2 border-blue-400 p-1 mt-10 rounded-md">
                    <input id="upload-image" type="file" name="filename" accept="image/gif, image/jpeg, image/png" onchange="loadFile(event)" hidden>
                    <label for="upload-image" class="w-full text-blue-400 p-10 rounded-md cursor-pointer flex justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd" />
                        </svg>
                    </label>
        
                </div>
            <br>
            </div>
            <button id="ok-btn"  class="w-full bg-blue-500 p-3 text-white font-bold rounded-md" type="submit" name="submit">Post</button>
        </form>
    </div>
    </div>
    <script src="../js/main.js"></script>
</div>
<?php 
else:
header('location: /index.php');
endif;
?>
</body>