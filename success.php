<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>商品登録</title>
<link href="css/commons.css" rel="stylesheet">
</head>
<body>

  <div class="header">
    <h1 class="site_logo"><a href="menu.php">商品管理システム</a></h1>
    <div class="user">
      <p class="user_name"><?php session_start(); echo $_SESSION['user_id']; ?>さん、こんにちは</p>
      <form class="logout_form" action="logout.php" method="get">
        <button class="logout_btn" type="submit">
          <img src="images/ドアアイコン.png">ログアウト</button>
      </form>
    </div>
  </div>
  
  <h2>成功しました。</h2>
  <input type="button" onclick="location.href='./menu.php'" value="メニュー画面に戻る" class="cancel_btn">

</body>
</html>
<script src="./js/commons.js"></script>