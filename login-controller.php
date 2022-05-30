<?php   #login-controller

require_once('LoginService.php');
$loginService = new LoginService();

if($loginService->loginCheck($_POST['loginId'], $_POST['pass'])) {
    $_SESSION['user_id'] = $_POST['loginId'];
    include('menu.php');
} else {
    include('index.php');
}
