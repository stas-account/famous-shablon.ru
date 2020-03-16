<?php

if(isset($_SESSION['user']) && $_SESSION['user']['active'] == 1) {

	if(isset($_POST['button'])) {
		$array = ['image/gif', 'image/jpeg', 'image/png'];
		$array2 = ['jpg', 'jpeg', 'gif', 'png'];

		if($_FILES['file']['error'] == 0) {
			if($_FILES['file']['size'] < 500 || $_FILES['file']['size'] > 50000000) {
				$errors = 'Размер изображения не подходит';
			} else {
				preg_match('#\.([a-z]+)$#iu', $_FILES['file']['name'], $matches);
				if(isset($matches[1])) {
					$matches[1] = mb_strtolower($matches[1]);

					$temp = getimagesize($_FILES['file']['tmp_name']);
					$name = '/uploaded/'.date('Ymd-His').'img'.rand(10000,99999).'.jpg';

					if(!in_array($matches[1], $array2)) {
						$errors = 'Не подходит расширение файла';
					} elseif(!in_array($temp['mime'], $array)) {
						$errors = 'Не подходит тип файла, можно загружать только изображения';
					} else {
						resizeImage($_FILES['file']['tmp_name'], 100, 100, '.'.$name);
						q("
							UPDATE `users` SET
							`image` = '".es($name)."'
							WHERE `id` = ".(int)$_SESSION['user']['id']."
						");
						$_SESSION['info'] = 'Картинка изменена';
						header('Location: /users/home');
					}
				} else {
					$errors = 'Данный файл не является картинкой. Принимаемые файлы: jpg, png, gif, bmp';
				}
			}
		}
	}


	if(isset($_GET['login'], $_GET['password'], $_GET['email'], $_GET['age']) && !empty($_GET['login']) && !empty($_GET['password']) && !empty($_GET['email']) && !empty($_GET['age']))   {

		trimAll($_GET);

		$res = q("
		UPDATE `users` SET
		`login` = '".es($_GET['login'])."',
		`password` = '".es($_GET['password'])."',
		`email` = '".es($_GET['email'])."',
		`age` = ".(int)($_GET['age'])."
		WHERE `id` = ".(int)$_SESSION['user']['id']."
	");

		$_SESSION['info'] = 'Данные профиля изменены';
		header("Location: /users/home");
		exit;
	} elseif (isset($_GET['button'])) {
		$errors = 'Необходимо заполнить все поля';
	}

	$res = q("
	SELECT *
	FROM `users`
	WHERE `id` = ".(int)$_SESSION['user']['id']."
	LIMIT 1
	");

	$row = mysqli_fetch_assoc($res);
} else {
	$errors = 'Для просмотра профиля нужно авторизоваться';
}