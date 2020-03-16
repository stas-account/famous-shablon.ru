<?php

if (isset($_SESSION['user'])) {
	header("Location: /");
}

if(isset($_GET['hash'], $_GET['id'])) {
	$res = q("
	SELECT * FROM `users`
	WHERE `hash` = '".$_GET['hash']."'
	AND   `id`   = ".$_GET['id']."
	");
		if(mysqli_num_rows($res)){
			q("
				UPDATE `users` SET
				`active` = 1
				WHERE `hash` = '".es($_GET['hash'])."'
				AND `id` = ".(int)$_GET['id']."
				");
				unset ($_SESSION['registration']);
				$info = 'Вы зарегистрированы, введите логин и пароль в "My Account" в шапке сайта';
		} else {
			$info = 'Вы прошли по неверной ссылке';
		}
} else {
	$info = 'Вы прошли по неверной ссылке';
}

