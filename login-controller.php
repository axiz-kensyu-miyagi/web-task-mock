<?php   #login-controller

require_once('LoginService.php');
$loginService = new LoginService();

    // ユーザIDの入力チェック
    if (empty($_POST["loginId"])) {  // emptyは値が空のとき
        $errorMessage = 'ユーザーIDが未入力です。';
        include('index.php ');
        return $errorMessage;
    } else if (empty($_POST["pass"])) {
        $errorMessage = 'パスワードが未入力です。';
        include('index.php ');
        return $errorMessage;
    }else{
        //idとpassは入力OK、データベースと照合する手続きへ
        if($loginService->loginCheck($_POST['loginId'], $_POST['pass'])){
            session_start();
            $_SESSION['user_id'] = $_POST['loginId'];
            header('Location: menu.php');
        } else {
            header('Location:index.php');
        }
    } 
