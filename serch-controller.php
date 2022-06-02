<?php   #serch-controller

        try{
            $pdo = new PDO(
                // DSN
                'mysql:dbname=axizdb;host=127.0.0.1', 
                // UserName
                'axizuser',
                // PASS
                'axiz'
                ,[
                  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                 ]
              );

            $stmt = $pdo->query("select * from products ");  
            $result = $stmt->fetchAll();

            /*foreach($result as $key => $value){
                foreach($value as $val = $va){
                    echo $va;
                }
            }*/

            if(!isset($_GET['keyword']) || is_null($_GET['keyword']) ){
                print_r($result);
                header('Location:menu.php');
            }else if(isset($_GET['keyword'])){
                foreach($result as $key => $value){
                    foreach($value as $val => $va){
                        echo $va;
                    }
                }
                include('menu.php');
            }
           
            
        } catch(PDOException $e){
            echo 'DB接続エラー' . $e->getMessage();
        }
       
?>