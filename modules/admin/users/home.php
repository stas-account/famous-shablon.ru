<?php

if(isset($_GET['search']) && !empty($_GET['search'])) {
	$res = q("
		SELECT * FROM `users`
		WHERE `login` LIKE '%".$_GET['search']."'
        OR `login` LIKE '%".$_GET['search']."%'
        OR `login` LIKE '".$_GET['search']."%'
	");
} else {
	$res = q("
	SELECT * FROM `users` ");
}

if(isset($_GET['delete'])) {

	$_GET['delete'] = (int)$_GET['delete'];

	if($_GET['delete']) {

		q("DELETE FROM `users`
				  WHERE `id` = ".$_GET['delete']." ");

		$_SESSION['info'] = 'Пользователь был удалён';
		header("Location: /admin/users/home");
		exit;
	}

	if(isset($_GET['ids'])) {

		IntAll($_GET['ids']);

		$ids = implode(',', $_GET['ids']);
		q("
		DELETE FROM `users`
		WHERE `id` IN (".$ids.")
		");

		$_SESSION['info'] = 'Товары были удалены';
		header("Location: /admin/users/home");
		exit;
	} else {
		$_SESSION['info'] = 'Не выбраны товары для удаления';
		header("Location: /admin/users/home");
		exit;
	}

}

if(isset($_GET['button'])) {
	if(!isset($_GET['ids']) || count($_GET['ids']) != 1) {
		$_SESSION['info'] = 'Для редактирования можно выбрать только одну позицию';
	} else {
		$_SESSION['id'] = $_GET['ids'][0];
		header("Location: /admin/users/edit");
		exit;
	}
}
