<?php
session_start();

// 情報を配列にして呼び出す

function getreservation(){
    require('dbconnect.php');
    $posts = $db->query("SELECT * FROM member");
    $reservation_member = array();

}

$reservation_array = getreservation();
?>


<!-- if(!empty($_POST)){
    if($_POST['name'] == ''){
        $error['name'] == 'blank';
    }
    if($_POST['email'] == ''){
        $error['email'] == 'blank';
    }
    if(strlen($_POST['password']) < 4){
        $error['password'] == 'length';
    }
    if($_POST['password'] == ''){
        $error['password'] == 'blank';
    }
    if(empty($error)) {
        $_SESSION['join'] = $_POST;
        header('Location:check.php');
        exit();
    }
} -->

<!-- ?> -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新規登録</title>
</head>
<style>
    main{
        ont-family: 'Noto Sans', sans-serif;
		text-align: center;
		margin-top: 200px;
		background-color:#FFCC99;
		line-height:40px;
    }

</style>
<body>
    <main>
        <div>
            <div>
                <h1>新規登録</h1>
            </div>
            <p>次のフォームに必要事項をご記入ください。</p>
            <dl>
                <dt>ニックネーム<span class="required">必須</span></dt>
                <input type="text" name="name" size="35" maxlengs="255" />
                <!-- <?php if($error['name'] == 'blank'); ?> -->
                <p class ="error">*ニックネームを入力してください</p>
                <?php  //endif; // ?>
                <p class="error"></p>
                <dt>メールアドレス</dt>
                <input type="text" name="password">
                <dt>パスワード</dt>
                <input type="text" name="address">
                
            </dl>
            <div><input type="submit" value="ログインする" class="button"/></div>
        </div>
</main>
    </body>
</html>