<?php
session_start();
//セッション情報がないときはログイン画面にリダイレクトする
    if ( !isset($_SESSION['e']) ){
        $host = $_SERVER['HTTP_HOST'];
        $uri  = rtrim(dirname($SERVER['PHP_SELF']), '/\\');
        header("Location: //$host$uri/login.php");
        exit;
    }
?>

<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>メンバー専用画面</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <style>
        div.button{
            text-align: center;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="mx-auto" style="width: 400px;">
       <h1>メンバー専用画面</h1>
       <a href="./login.php">ログアウトする</a>
    </div>
</div>

</body>
</html>



