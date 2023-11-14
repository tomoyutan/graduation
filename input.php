<?php
// error_reporting(0);
session_start();
require('dbconnect.php');

if (isset($_SESSION['id']) && $_SESSION['time'] + 3600 > time()) {
	// ログインしている
	$_SESSION['time'] = time();

	$member = $db->prepare('SELECT * FROM member WHERE id=?');
	$member->execute(array($_SESSION['id'])); 
	$member = $member->fetch();
} else {
	// ログインしていない
	header('Location: login.php');
	exit();
}


if(!empty($_POST)) {
    if($_POST['schedule'] != '') {
        $shcedule = $db->prepare('INSERT INTO cl SET member_id=?,day=?, schedule=?');
        $shcedule->execute(array(
            $member['id'],
            $_POST['day'],
            $_POST['schedule']
        ));

        header('Location: clender.php'); exit();
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"/>
    <title>カレンダー</title>
</head>
<style>
.write{font-family: 'Noto Sans', sans-serif;
		text-align: center;
		margin-top: 80px;
		background-color:#FFCC99;
		line-height:20px;
		}
.botton{
	font-size:40px;
}
	
</style>

<body>
	<div class="write">
		<form action="input.php" method="post" enctype="multipart/form-data">
			<dl>
				<dt><?php echo htmlentities($member['name'], ENT_QUOTES); ?>さんの予定</dt>
				<br>
				<br>
				<dt>DAY</dt>
				<dt><input type="date" name="day"></dt>
				<br>
				<br>
				<dt>SCHEDULE</dt>
				<dt>
					<textarea name="schedule" clos="50" rows="5"></textarea>
				</dt>
			</dl>
			<div>
					<input action="clender.php" type="submit"  value="予定を入れる" class="botton">
			</div>
				
				
			</form>
			
			<br>
			<form action="clender.php">
				<input action="clender.php" type="submit"  value="戻る" class="botton">
			</form>
	</div>
</body>
</html>