<?php

if(isset($_POST['login'], $_POST['pass'])) {
	$res = q("
		SELECT *
		FROM `users`
		WHERE `login` = '".es($_POST['login'])."'
		AND `password` = '".es(myHash($_POST['pass']))."'
		AND `active` = 1
		LIMIT 1
		");
	$id = DB::_()->insert_id;
	if (mysqli_num_rows($res)) {
		$_SESSION['user'] = mysqli_fetch_assoc($res);
	}
	else {
		$error = 'Нет пользователя с таким логином или паролем';
	}
	if(isset($_SESSION['user'], $_POST['autoauth']) && $_POST['autoauth'] == 'autoauth' ) {
		q("
			UPDATE `users` SET
				   `hash` = '".myHash($_SESSION['user']['login'].$_SESSION['user']['password'])."',
				   `ip` = '".$_SERVER['REMOTE_ADDR']."',
				   `http_user_agent` = '".es($_SERVER['HTTP_USER_AGENT'])."'
			WHERE  `id` = ".(int)$_SESSION['user']['id']."
			AND    `active` = 1
		");
		setcookie('kyka', myHash(($_SESSION['user']['login']).$_SESSION['user']['password']), time() + 3600, '/');
	}
} elseif(isset($_COOKIE['kyka'])) {
	$res = q("
		SELECT * FROM `users`
		WHERE `hash` = '".myHash($_SESSION['user']['login'].$_SESSION['user']['password'])."'
		AND `ip` = '".$_SERVER['REMOTE_ADDR']."'
		AND `http_user_agent` = '".$_SERVER['HTTP_USER_AGENT']."'	
		");
	if (mysqli_num_rows($res)) {
		$_SESSION['user'] = mysqli_fetch_assoc($res);
		$status = 'OK';
	}
}
?>

<script>

	if (typeof image === 'undefined') {
		image = '<?php if(isset($_SESSION['user'])) { echo $_SESSION['user']['image']; } ?>';
	}

</script>
