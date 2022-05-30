<?php   #LoginService

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
$stmt = $pdo->query("select login_id,password from users ");
$result = $stmt->fetchAll();


class LoginService 
{
    public function loginCheck($loginId, $pass)
    {
        if($loginId === 'admin' && $pass === 'password') {
            return true;
        } else {
            return false;
        }
    }
}
