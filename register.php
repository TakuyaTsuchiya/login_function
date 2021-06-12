<?php
$errmessage = array();
if( $_POST) { 
    /* 1 入力チェック*/
    if ( !$_POST['e'] ) {
       $errmessage[] = "Eメールを入力してください";
    }  else if (strlen($_POST['e']) > 200 ) {
       $errmessage[] = "Eメールアドレスは200文字以内にしてください";
    }  else if (!filter_var($_POST['e'], FILTER_VALIDATE_EMAIL) ){
       $errmessage[] = "Eメールアドレスが不正です";
    }

    if ( !$_POST['p'] ) {
        $errmessage[] = "パスワードを入力してください";
     }  else if ( strlen($_POST['p']) > 100 ) {
        $errmessage[] = "パスワードは100文字以内にしてください";
     }

    if( $_POST['p'] != $_POST['p2']) {
        $errmessage[] = "確認用パスワードが一致しません";
    }

/* 2.メールアドレスの重複がないかチェックする機能　*/
    $userfile = '/var/www/data/userinfo.txt';
    $users = array();
    if( file_exists($userfile) ) {
    $users = array();
        if( file_exists($userfile) ) {
          $users = file_get_contents( $userfile );
          $users = explode("\n", $users );
          foreach ( $users as $k => $v ) {
            $v_ary = str_getcsv( $v );
            // Eメールアドレスが一致しているかどうかチェック
            if ( $v_ary[0] == $_POST['e'] ) {
               $errmessage[] = "そのEメールはすでに登録されています";
               break;
        }
    }
}

    /* 新規ユーザー登録の処理*/
    if( !$errmessage ) {
     $ph   = password_hash( $_POST['p'], PASSWORD_DEFAULT );
     $line = '"' . $_POST['e'] . '","' . $ph . '"' . "\n";
     $ret  = file_put_contents( $userfile, $line, FILE_APPEND );
     }

     }
    } else {
    /* GETのとき*/
    $_POST  = array();
    $_POST['e'] = "";
    }
?>

<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>新規登録フォーム</title>
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
    <h1>ユーザー新規登録</h1>
      <?php
        if( $errmessage ) {
            echo '<div class="alert alert-danger" role="alert">';
            echo implode('<br>', $errmessage );
            echo '</div>';
        }
      ?>
        <form action="./register.php" method="post">
            Eメール<input type="email" name="e" value="<?php echo htmlspecialchars($_POST['e']) ?>" class="form-control"><br>
            パスワード <input type="password" name="p" value="" class="form-control"><br>
            パスワード（確認） <input type="password" name="p2" value="" class="form-control"><br>
            <div class="button">
                <input type="submit" name="register" value="登録" class="btn btn-primary btn-lg">
            </div>
        </form>
    </div>
</div>
</body>
</html>

　
