<?php
require('dbconnect.php');

if(!isset($_SESSION['join'])) {
    header('Location: signup.php');
    exit();
}

if(!empty($_POST)){
    $statement = $db->prepare('INSERT INTO mem')
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <dl>
            <dt>ニックネーム</dt>
            <dd>
            </dd>
            <dt>メールアドレス</dt>
            <dd>
            </dd>
            <dt>パスワード</dt>
            <dd>
            【表示されません】
            </dd>
        </dl>
        <div><a href="">書き直す</a>｜ <input type="submit" value="登録する"></div>
    </form>
</body>
</html>