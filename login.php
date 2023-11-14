<?php
error_reporting(0);
require('dbconnect.php');

session_start();

// if ($_COOKIE['name'] != '') {
// $_POST['name'] = $_COOKIE['name'];
// $_POST['save'] = 'on';
// }


if (!empty($_POST)) {
	// ログインの処理
	if ($_POST['name'] != '' && $_POST['password'] != '') {
		$login = $db->prepare('SELECT * FROM member WHERE name=? AND
			password=?');
			$login->execute(array(
				$_POST['name'],
				($_POST['password'])
			));
			$member = $login->fetch();
			if ($member) {
				// ログイン成功
				$_SESSION['id'] = $member['id'];
				$_SESSION['time'] = time();

				// ログイン情報を記録する
				// if ($_POST['save'] == 'on') {
				// setcookie('name', $_POST['name'], time()+60*60*24*14);
				// setcookie('password', $_POST['password'], time()+60*60*24*14);
				// }

				header('Location: clender.php'); exit();
			} else {
				$error['login'] = 'failed';
			}
		} else {
			$error['login'] = 'blank';
		}
	}
	?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>ログイン</title>
	<style>
		#wrap{font-family: 'Noto Sans', sans-serif;
		text-align: center;
		margin-top: 200px;
		background-color:#FFCC99;
		line-height:40px;
		}
		.button{
			font-size:40px;
		}

	</style>
	

	<!-- <link rel="stylesheet" href="style.css" /> -->
</head>

<body>
	<div id="wrap">
		<div id="head">
			<h1>ログイン</h1>
		</div>
			<form action="" method="post">
				<dl>
					<dt>名前</dt>
					<dd>
						<input type="text" name="name" size="35" maxlength="255" value="<?php echo htmlspecialchars($_POST['name'], ENT_QUOTES); ?>"/>
						<?php if ($error['login'] == 'blank'): ?>
							<p class="error">* 名前とパスワードをご記入ください</p>
						<?php endif; ?>
						<?php if ($error['login'] == 'failed'): ?>
							<p class="error">* ログインに失敗しました。正しくご記入ください。</p>
						<?php endif; ?>
					</dd>
					<dt>パスワード</dt>
					<dd>
						<input type="password" name="password" size="35" maxlength="255" value="<?php echo htmlspecialchars($_POST['password'], ENT_QUOTES); ?>" />
					</dd>
					<dt>ログイン情報の記録</dt>
					<dd>
						<input id="save" type="checkbox" name="save" value="on"><label
						for="save">次回からは自動的にログインする</label>
					</dd>
				</dl>
				<div><input type="submit" value="ログインする" class="button"/></div>
			</form>
		</div>

	</div>
</body>
</html>
