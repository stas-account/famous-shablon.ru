<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/config.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/libs/default.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/variables.php';


if(isset($_GET['name'], $_GET['email'], $_GET['comment'])) {

	$error = [];

	if(empty($_GET['name'])) {
		$error['name'] = 'Напишите имя';
	}
	if(empty($_GET['email']) || !filter_var($_GET['email'], FILTER_VALIDATE_EMAIL)) {
		$error['email'] = 'Напишите email';
	}
	if(empty($_GET['comment'])) {
		$error['comment'] = 'Напишите отзыв';
	}
	if(!count($error)) {
	q ( "
	INSERT INTO `comments` SET 
	`name` = '".es($_GET['name'])."',
	`email` = '".es($_GET['email'])."',
	`comment` = '".es($_GET['comment'])."',
	`image` = '".es($_GET['image'])."',
	`date` = NOW()
	");
	}

	if(isset($_GET['image']) && $_GET['image'] == false) {
		$_GET['image'] = '/uploaded/20200114-140623img78260.jpg';
	}

	$array = [
		'name' => hc($_GET['name']),
		'email' => hc($_GET['email']),
		'comment' => hc($_GET['comment']),
		'image' => hc($_GET['image'])
	];

	echo json_encode($array);
	unset($_GET['name'], $_GET['email'], $_GET['comment']);
	//echo __FILE__;
	//exit;

}/* else {
	echo 'Для отправки комментария необходимо заполнить все формы';
}
*/

$res = q("SELECT * FROM `comments` ORDER BY `id` DESC");


