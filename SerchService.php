<?php   #SerchService

class SerchService 
{
        
    public function SerchCheck($keyword)
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

              $sort = $_POST['sort'];

              var_dump($sort);


              $sql =" SELECT";
              $sql .="  pro.product_id";
              $sql .=" , pro.name";
              $sql .=" , pro.price";
              $sql .=" , pro.category_id ";
              $sql .=" FROM products AS pro"; 
              $sql .=" LEFT JOIN  categories AS cate"; 
              $sql .=" on pro.category_id = cate.id";
              $sql .=" WHERE (pro.name like '%" . $keyword . "%'";
              $sql .=" OR cate.name LIKE '%" . $keyword . "%')";

              switch($sort){
                case "sort":
                    break;

                case "productid":
                    $sql .=" ORDER BY pro.product_id";
                break;

                case "category":
                    $sql .=" ORDER BY pro.category_id;";
                break;

                case "lowpraice":
                    $sql .=" ORDER BY pro.price ASC;";
                    break;

                case "highprice":
                    $sql .=" ORDER BY pro.price DESC;";
                    break;

                case "oldday":
                    $sql .=" ORDER BY pro.created_at;";
                    break;

                case "newday":
                    $sql .=" ORDER BY pro.created_at DESC;";
                    break;
                
                default:
                
                }

              $stmt = $pdo->query($sql);  
              $result = $stmt->fetchAll();
              
              session_start();
              $_SESSION['result'] = $result;  

        } catch(PDOException $e){
            echo 'DB接続エラー' . $e->getMessage();
        }
    }

    public function serchSort($sort)
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

              $sort = $_POST['sort'];

              var_dump($sort);

              $sql =" SELECT";
              $sql .="  pro.product_id";
              $sql .=" , pro.name";
              $sql .=" , pro.price";
              $sql .=" , pro.category_id ";
              $sql .=" FROM products AS pro"; 
              $sql .=" LEFT JOIN  categories AS cate"; 
              $sql .=" on pro.category_id = cate.id";
              $sql .=" WHERE (pro.name like '%" . $keyword . "%'";
              $sql .=" OR cate.name LIKE '%" . $keyword . "%')";

              switch($sort){
                case "sort":
                    break;

                case "productid":
                    $sql .=" ORDER BY pro.product_id";
                break;

                case "category":
                    $sql .=" ORDER BY pro.category_id;";
                break;

                case "lowpraice":
                    $sql .=" ORDER BY pro.price ASC;";
                    break;

                case "highprice":
                    $sql .=" ORDER BY pro.price DESC;";
                    break;

                case "oldday":
                    $sql .=" ORDER BY pro.created_at;";
                    break;

                case "newday":
                    $sql .=" ORDER BY pro.created_at DESC;";
                    break;
                
                default:
                
                }

              $stmt = $pdo->query($sql);  
              $result = $stmt->fetchAll();
              
              session_start();
              $_SESSION['result'] = $result;  

        } catch(PDOException $e){
            echo 'DB接続エラー' . $e->getMessage();
        }
    }
}
        
?>