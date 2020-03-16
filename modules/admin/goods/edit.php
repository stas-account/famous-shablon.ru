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
							UPDATE `goods` SET
							`image` = '".es($name)."'
							WHERE `id` = ".(int)$_SESSION['id']."
						");
					$_SESSION['info'] = 'Картинка изменена';
					header('Location: /admin/goods/edit');
				}
			} else {
				$errors = 'Данный файл не является картинкой. Принимаемые файлы: jpg, png, gif, bmp';
			}
		}
	}
}

if(isset($_GET['name'],
		$_GET['article'],
		$_GET['description'],
		$_GET['price'])
	&& !empty($_GET['article'])
	&& !empty($_GET['price'])
	&& !empty($_GET['name']))   {

	trimAll($_GET);

	$_GET['article'] = IntAll($_GET['article']);
	$_GET['price'] = IntAll($_GET['price']);

	if($_GET['article'] && $_GET['price']) {


		q("
		UPDATE `goods` SET
		`name` = '".es($_GET['name'])."',
		`article` = ".es($_GET['article']).",
		`availability` = '".es($_GET['availability'])."',
		`description` = '".es($_GET['description'])."',
		`price` = ".es($_GET['price']).",
		`image` = '".es($_GET['image'])."',
		`meta_title` = '',
		`meta_keywords` = '',
		`meta_description` = '',
		`date` = NOW()
		WHERE `id` = ".(int)$_SESSION['id']."
	");
		unset($_SESSION['id']);
		$_SESSION['info'] = 'Запись изменена';
		header("Location: /admin");
		exit;

	} else {
		$errors = 'Поля "article" и "price" должны быть целочисленными';
	}


} elseif (isset($_GET['submit'])) {
	$errors = 'Необходимо заполнить все поля';
}

$res = q("
	SELECT *
	FROM `goods`
	WHERE `id` = ".(int)$_SESSION['id']."
	LIMIT 1
	");
if(!$res->num_rows) { // данная проверка на случай если на странице товар есть а из БД товар удалён
	$_SESSION['info'] = 'Данного товара нет';
	header("Location: /admin");
	exit;
}

$row = mysqli_fetch_assoc($res);

/*
if(isset($_POST['ok'])) {
	$row['name'] = $_POST['name'];
	$row['article'] = $_POST['article'];
	$row['availability'] = $_POST['availability'];
	$row['description'] = $_POST['description'];
	$row['price'] = $_POST['price'];
}
*/