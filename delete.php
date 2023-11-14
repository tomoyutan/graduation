<?php
require('dbconnect.php');
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width= initial-scale=1.0">
    <title>削除画面</title>
</head>
<style>
    div{font-family: 'Noto Sans', sans-serif;
		text-align: center;
		margin-top: 200px;
		background-color:#FFCC99;
		line-height:40px;
		}
</style>
<body>
    <div>
    <h2>削除</h2>
        <?php
    if (isset($_REQUEST['id']) && is_numeric($_REQUEST['id'])){
        $id =$_REQUEST['id'];
        $statement = $db->prepare('DELETE FROM cl WHERE id=?');
        $statement->execute(array($id));
    }
    ?>
    <p>メモの内容を削除しました</p>
    <p><a href="clender.php">戻る</a></p>
    </div>
</body>
</html>