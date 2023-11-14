<?php require('dbconnect.php'); ?>
<!doctype html>
<html lang="ja">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


<title>編集</title>
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
<h2>編集画面</h2>

<?php
if (isset($_REQUEST['id']) && is_numeric($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    
    $memos = $db->prepare('SELECT * FROM cl WHERE id=?');
    $memos->execute(array($id));
    $memo = $memos->fetch();
}
?>
<div>
<form action="edit2.php" method="post">
    <input type="hidden" name="id" value="<?php print($id); ?>">
    <textarea name="schedule" cols="50" rows="10"><?php print($memo['schedule']); ?></textarea><br>
    <button type="submit">登録する</button>
</form>
<br>
<form action="delete.php" method="post">
    <input type="hidden" name="id" value="<?php print($id); ?>">
    <input type="hidden" name="schedule" value="<?php print($memo['schedule']); ?>">
    <button type="submit">削除する</button>
</form>
</main>
</body>
</html>
