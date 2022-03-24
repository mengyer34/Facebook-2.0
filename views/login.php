<?php
// session_start();
$pathUrl = parse_url($_SERVER['REQUEST_URI']);
$pathUrl['path'] === "/views/login.php" ? session_start() : null;
isset($_SESSION['user_id']) ? header('Location: ../index.php') : null ;

?>

<script src="https://cdn.tailwindcss.com"></script>
<body class="bg-gray-300">
<div class="flex p-20 mt-10">
    <div class=" w-full pl-10">
        <h1 class="text-blue-700 font-bold text-7xl mt-12">facebook</h1>
        <p class="text-2xl mt-3">Fackbook helps you connect and share with the people in your life.</p>
    </div>
    <div class=" w-full">
        <form action="../controllers/login_page.php" method="post" class="bg-gray-200 p-10 max-w-md text-center m-auto rounded-md">
            <input type="email" name="email" placeholder="Email address" class="w-full p-2 mb-4 outline-none border-[1px] border-gray-300"><br>
            <input type="password" name="password" id="password" placeholder="Password" class="w-full p-2 mb-4 outline-none border-[1px] border-gray-300"><br>
            <div class="flex justify-end">
                <input type="checkbox" id="show-password-login" onclick="showPassword()" hidden>
                <label for="show-password-login" class="cursor-pointer  text-blue-700 -mt-[74px] p-2 mb-4"><svg class="h-5 w-5 fill-slate-300" viewBox="0 0 18 18"><img src="../images/show.svg" alt=""></svg></label>
            </div>
            <button type="submit" name="submit" class="bg-blue-600 text-white p-2 rounded-md w-full">Login</button>
            <br>
            <br>
            <hr class="border-gray-400">
            <br>
            <a href="/views/register.php" class="bg-green-600 text-white p-2 rounded-md w-full">Create New Account</a>
        </form>
    </div>
</div>
<script src="../js/main.js"></script>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email_address = 
        $pass = "123";
        $email = $_POST['email'];
        $password = $_POST['password'];
        if (!empty($username) and !empty($password) and $username == $user and $password == $pass) {
            $_SESSION['user_id'] = $username;
            header('Location: ../index.php');
        } else {
            echo "Error login";
        }
    }
?>
