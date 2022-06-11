<?php   #serch-controller

require_once('SerchService.php');
$SerchService = new SerchService();

//$SerchService = new serchSort();
    //var_dump($_POST);

    if($SerchService->SerchCheck($_POST['keyWord'])){
            header('Location: menu.php');
        } else {
            $errorMessage = '一致しません。';
            include('menu.php ');
            return $errorMessage;
    }

    if($SerchService->serchSort($_POST['sort'])){
            header('Location: menu.php');
    }else {
        include('menu.php');
    }
     
    
?>