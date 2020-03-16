<?php

if(isset($_GET['id'])) {
	$_SESSION['id'] = $_GET['id'];
}


if(isset($_POST['submit'])) {
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
							WHERE `id` = ".(int)$_SESSION['id']."
						");
					$_SESSION['info'] = 'Картинка изменена';
					header('Location: /admin/users/edit');
				}
			} else {
				$errors = 'Данный файл не является картинкой. Принимаемые файлы: jpg, png, gif, bmp';
			}
		}
	}
}



if(isset($_GET['login'],
		$_GET['email'],
		$_GET['age'])
	&& !empty($_GET['login'])
	&& !empty($_GET['email'])
	&& !empty($_GET['age'])) {

		trimAll($_GET);

	if(!filter_var($_GET['email'], FILTER_VALIDATE_EMAIL)){
		$_SESSION['info'] = 'Неверный формат E-mail';
		header("Location: /admin/users/edit");
		exit;
	};
	if(!($_GET['age'] >= 1 && $_GET['age'] <= 127)){
		$_SESSION['info'] = 'Возраст принимает значение от 1 до 127';
		header("Location: /admin/users/edit");
		exit;
	};
	if(!($_GET['active'] == 0 || $_GET['active'] == 1)){
		$_SESSION['info'] = 'Некорректное значение поля "Account is activated"';
		header("Location: /admin/users/edit");
		exit;
	};
	if(!($_GET['access'] == 0 || $_GET['access'] == 5)){
		$_SESSION['info'] = 'Некорректное значение поля "Access to CMS"';
		header("Location: /admin/users/edit");
		exit;
	};

	$res = q(" UPDATE `users` SET
						`login` = '".es($_GET['login'])."',
						`email` = '".es($_GET['email'])."',
						`age` = ".(int)($_GET['age']).",
						`active` = ".es($_GET['active']).",
						`access` = ".es($_GET['access']).",
						`image` = '".es($_GET['image'])."'
						WHERE `id` = ".(int)$_SESSION['id']." ");

	unset($_SESSION['id']);
	$_SESSION['info'] = 'Данные пользователя изменены';
	header("Location: /admin/users/home");
	exit;

} elseif(isset($_GET['submit'])) {
	$errors = 'Необходимо заполнить все поля';
}

	$res = q("
	SELECT *
	FROM `users`
	WHERE `id` = ".(int)$_SESSION['id']."
	LIMIT 1
	");
	if(!mysqli_num_rows($res)) { // данная проверка на случай если на странице товар есть а из БД товар удалён
		$_SESSION['info'] = 'Данного пользователя нет';
		header("Location: /admin");
		exit;
	}

	$row = mysqli_fetch_assoc($res);

