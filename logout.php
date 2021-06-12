<?php
//ログアウト処理
session_start();
$_SESSION = array();
?>

<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ログアウト</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="mx-auto" style="width: 400px;">
       <h1>ログアウトしました</h1>
       <a href="./login.php">ログインする</a>
    </div>
</div>

</body>
</html>



