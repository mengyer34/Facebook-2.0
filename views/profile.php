<?php 
    session_start();
    if (isset($_SESSION['user_id']) and !empty($_SESSION['user_id'])):
    require_once(realpath(dirname(__FILE__) . '/../templates/header.php'));
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdn.tailwindcss.com"></script>

<?php 
    $user_info = getUserInfo($_SESSION['user_id']);
?>
<body class="bg-slate-300 mt-28">
    <div class="rounded-lg block m-auto w-3/5 bg-white ring-1 ring-slate-900/5 shadow-lg space-y-3">
        <div class="block justify-between relative">
            <div class="min-w-full min-h-[50vh] h-1/3 bg-center bg-no-repeat bg-fixed bg-cover" style="background-image: url('/images/cover/<?=$user_info['cover']?>')" alt="cover">

            </div>
            <div class="items-center rounded-lg p-10">
                <div class="block items-center absolute bottom-20 left-[44%]">
                    <label class="relative" for="img" onclick="showSave()">                
                        <img id="profilepic" class="h-20 w-20 object-cover rounded-full hover:cursor-pointer hover:border-4 hover:border-blue-500" src="/images/user/<?=$user_info['profile']?>" alt="Current profile photo" />
                        <label for="img"></label>
                    </label>
                </div>
                <div class="w-full text-center text-2xl font-bold text-slate-700">
                    <?= $user_info['first_name']. ' '. $user_info['last_name']?>
                </div>
            </div>
            <a href="/views/edit_user_info.php" class="absolute bottom-0 right-1 text-blue-400 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class=" h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
            </a>
        </div>


        <div class="flex py-4 pb-10">
        <div class="px-10 mx-auto container">
            <div class="grid grid-cols-2 gap-2">
                <div class="shadow bg-white w-full flex items-center border pl-2">
                    <div class="flex items-center space-x-4 text-blue-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="flex-grow p-3">
                        <div class="text-xs text-gray-500">
                            First Name
                        </div>
                        <div class="font-semibold text-gray-700">
                            <?= $user_info['first_name'] ?>
                        </div>
                    </div>
                </div>
                <div class="shadow bg-white w-full flex items-center border pl-2">
                    <div class="flex items-center space-x-4 text-blue-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="flex-grow p-3">
                        <div class="text-xs text-gray-500">
                            Last Name
                        </div>
                        <div class="font-semibold text-gray-700">
                            <?= $user_info['last_name'] ?>
                        </div>
                    </div>
                </div>
                <div class="shadow bg-white w-full flex items-center border pl-2">
                    <div class="text-[2.8rem] flex items-center space-x-4 text-blue-400">
                        <i class="w-10 h-10 fa fa-transgender"></i>
                    </div>
                    <div class="flex-grow p-3">
                        <div class="text-xs text-gray-500">
                            Gender
                        </div>
                        <div class="font-semibold text-gray-700">
                            <?= $user_info['gender']=="M"?"Male":"Female" ?>
                        </div>
                    </div>
                </div>
                <div class="shadow bg-white w-full flex items-center border pl-2">
                    <div class="flex items-center space-x-4 text-blue-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9" />
                        </svg>
                    </div>
                    <div class="flex-grow p-3">
                        <div class="text-xs text-gray-500">
                            Country
                        </div>
                        <div class="font-semibold text-gray-700">
                            <?= $user_info['country'] ?>                           
                        </div>
                    </div>
                </div>
                <div class="shadow bg-white w-full flex items-center border pl-2">
                    <div class="flex items-center space-x-4 text-blue-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 15.546c-.523 0-1.046.151-1.5.454a2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.701 2.701 0 00-1.5-.454M9 6v2m3-2v2m3-2v2M9 3h.01M12 3h.01M15 3h.01M21 21v-7a2 2 0 00-2-2H5a2 2 0 00-2 2v7h18zm-3-9v-2a2 2 0 00-2-2H8a2 2 0 00-2 2v2h12z" />
                        </svg>
                    </div>
                    <div class="flex-grow p-3">
                        <div class="text-xs text-gray-500">
                            Date of Birth
                        </div>
                        <div class="font-semibold text-gray-700">
                            <?= date("F jS, Y", strtotime($user_info['date_of_birth'])) ?>
                        </div>
                    </div>
                </div>
                <div class="shadow bg-white w-full flex items-center border pl-2">
                    <div class="flex items-center space-x-4 text-blue-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                    </div>
                    <div class="flex-grow p-3">
                        <div class="text-xs text-gray-500">
                            Phone
                        </div>
                        <div class="font-semibold text-gray-700">
                            <?= $user_info['phone'] ?>
                        </div>
                    </div>
                </div>
                <div class="shadow bg-white w-full flex items-center border pl-2">
                    <div class="flex items-center space-x-4 text-blue-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div class="flex-grow p-3">
                        <div class="text-xs text-gray-500">
                            Email
                        </div>
                        <div class="font-semibold text-gray-700">
                            <?= $user_info['email'] ?>
                        </div>
                    </div>
                </div>
                <div class="shadow bg-white w-full flex items-center border pl-2">
                    <div class="flex items-center space-x-4 text-blue-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div class="flex-grow p-3">
                        <div class="text-xs text-gray-500">
                            date created account
                        </div>
                        <div class="font-semibold text-gray-700">
                            <?= date("F jS, Y", strtotime($user_info['create_date'])) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="/js/main.js"></script>
    <script src="/js/like.js"></script>
    <?php 
        require_once(realpath(dirname(__FILE__) . '/../views/user_post.php'));
    else:
        header('location: /index.php');
    endif;
    ?>

</body>

