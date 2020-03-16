<?php
if(isset($_POST['login'], $_POST['email'], $_POST['age'], $_POST['password'])) {
	$errors = [];
	if(empty($_POST['login'])) {
		$errors['login'] = 'Вы не заполнили логин';
	} elseif (mb_strlen($_POST['login']) < 2) {
		$errors['login'] = 'Логин слишком короткий';
	} elseif (mb_strlen($_POST['login']) > 16) {
		$errors['login'] = 'Логин слишком длинный';
	}
	if(mb_strlen($_POST['password']) < 4) {
		$errors['password'] = 'Пароль должен быть длиннее 3-х символов';
	}
	if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$errors['email'] = 'Вы не заполнили email';
	}
	if(!count($errors)) {
		$res = q("
			SELECT `id` FROM `users`
			WHERE `login` = '".es($_POST['login'])."'
			LIMIT 1
		");
		if(mysqli_num_rows($res)) {
			$errors['login'] = 'Такой логин уже занят';
		}
		$res = q("
			SELECT `id` FROM `users`
			WHERE `email` = '".es($_POST['email'])."'
			LIMIT 1
		");
		if(mysqli_num_rows($res)) {
			$errors['email'] = 'Такой email уже занят';
		}
	}
	if(!count($errors)) {
		q("
			INSERT INTO `users` SET
			`login`    = '".es($_POST['login'])."',
			`email`    = '".es($_POST['email'])."',
			`password` = '".es(myHash($_POST['password']))."',
			`age`      = ".(int)$_POST['age'].",
			`hash`     = '".es(myHash($_POST['login'].$_POST['age']))."'
			") and $_SESSION['registration'] = 'OK';


		$id = DB::_()->insert_id;


		Mail::$to = $_POST['email'];
		Mail::$subject = 'Вы зарегистрировались на сайте';
		Mail::$text = 'Пройдете по ссылке для активации вашего аккаунта: '.Core::$DOMAIN.'registration/activate&hash='.myHash($_POST['login'].$_POST['age']).'&id='.$id.'';
		Mail::send();

		header("Location: /registration/registration");

	}
}












