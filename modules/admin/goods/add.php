<?php
if(isset($_GET['submit'])) {
	unset($_SESSION['image']);
}

if(isset($_GET['name'],
		$_GET['article'],
		$_GET['description'],
		$_GET['price'],
		$_GET['image'])
	&& !empty($_GET['article'])
	&& !empty($_GET['price'])
	&& !empty($_GET['name'])) {

	trimAll($_GET);

	$_GET['article'] = IntAll($_GET['article']);
	$_GET['price'] = IntAll($_GET['price']);

	if($_GET['article'] && $_GET['price']) {

		q( " INSERT INTO `goods` SET
					`date` = NOW(),
					`name` = '".es($_GET['name'])."',
					`article` = ".es($_GET['article']).",
					`availability` = '".es($_GET['availability'])."',
					`description` = '".es($_GET['description'])."',
					`price` = ".es($_GET['price']).",
					`image` = '".es($_GET['image'])."',
					`category` = ".$_GET['category'].",
					`brand` = ".$_GET['brand'].",
					`meta_title` = '',
					`meta_keywords` = '',
					`meta_description` = '' ");

		$_SESSION['info'] = 'Запись добавлена';
		header('Location: /admin');
		exit();

	} else {
		$errors = 'Поля "article" и "price" должны быть целочисленными';
	}

} elseif (isset($_GET['submit'])) {
	$errors = 'Необходимо заполнить все поля';
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
					$_SESSION['image'] = $name;
					$_SESSION['info'] = 'Картинка добавлена';
					header('Location: /admin/goods/add');
				}
			} else {
				$errors = 'Данный файл не является картинкой. Принимаемые файлы: jpg, png, gif, bmp';
			}
		}
	}
}

$select1 = q(" SELECT * FROM `goods_category` ");
$select2 = q(" SELECT * FROM `goods_brand` ");



















