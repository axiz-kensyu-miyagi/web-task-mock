<?php   #LoginService

class LoginService 
{
    public function loginCheck($loginId, $pass)
    {
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

            $stmt = $pdo->prepare("select * from users where login_id = :login_id and password = :password");  
            $stmt->bindValue(':login_id', $loginId, PDO::PARAM_INT);
            $stmt->bindValue(':password', $pass, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchAll();


            session_start();
            foreach($result as $key => $value){
                foreach( $value as $val){
                    $name[] = $val;
                }             
            }
            $_SESSION['user_name'] = $name[3];
            
            $_SESSION['user_role'] = $name[4];

            if($result){
                return true;
            }else{
                return false;
            }

        } catch(PDOException $e){
            echo 'DB接続エラー' . $e->getMessage();
        }
       
    }
}