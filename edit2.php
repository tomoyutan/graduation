<?php require('dbconnect.php'); ?>
<!doctype html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<title>確認画面</title>
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
<header>

</header>

<main>
<h2>確認画面</h2>
<?php
$statement = $db->prepare('UPDATE cl SET schedule=? WHERE id=?');
$statement->execute(array($_POST['schedule'], $_POST['id']));
?>
<p>メモの内容を変更しました</p>
<p><a href="clender.php">戻る</a></p>
</main>
</body>
</html>