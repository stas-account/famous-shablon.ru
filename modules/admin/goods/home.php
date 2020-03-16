<?php

if(isset($_GET['category'], $_GET['brand'])) {
	$_SESSION['category'] = $_GET['category'];
	$_SESSION['brand'] = $_GET['brand'];
	unset($_GET['category'], $_GET['brand'], $_GET['key1']);
}
if(!isset($_GET['category'], $_GET['brand']) && !isset($_SESSION['category'],$_SESSION['brand'])) {
	$_SESSION['category'] = 'All goods';
	$_SESSION['brand'] = 'All brands';
}
$_GET['key1'] = $_GET['key1'] ?? 1;

$res = q(" SELECT * FROM `goods` ");
$numrows = ceil($res->num_rows / 10);
$res->close();

$res = q(" SELECT * FROM `goods`
   				  LIMIT 10 OFFSET ".(10 *abs($_GET['key1'] ? $_GET['key1'] - 1 : 0))." ");

if(isset($_SESSION['category'], $_SESSION['brand'])) {

	if($_SESSION['brand'] == 'All brands' && $_SESSION['category'] != 'All goods') {

		$res = q("SELECT * FROM `goods` WHERE `category` = 
				(SELECT `id` FROM `goods_category` 
				WHERE `category` = '".$_SESSION['category']."') ");
		$numrows = ceil($res->num_rows / 10);
		$res->close();


		$res = q("SELECT * FROM `goods` WHERE `category` = 
				(SELECT `id` FROM `goods_category` 
				WHERE `category` = '".$_SESSION['category']."')
			  LIMIT 10 OFFSET ".(10 *abs($_GET['key1'] ? $_GET['key1'] - 1 : 0))." ");

	} elseif($_SESSION['category'] == 'All goods' && $_SESSION['brand'] != 'All brands') {

		$res = q("SELECT * FROM `goods` WHERE `brand` = (
			  SELECT `id` FROM `goods_brand`
			  WHERE `brand` = '".$_SESSION['brand']."')");
		$numrows = ceil($res->num_rows / 10);
		$res->close();

		$res = q("SELECT * FROM `goods`WHERE `brand` = (
			  SELECT `id` FROM `goods_brand`
			  WHERE `brand` = '".$_SESSION['brand']."')
			  LIMIT 10 OFFSET ".(10 *abs($_GET['key1'] ? $_GET['key1'] - 1 : 0))." ");

	} elseif($_SESSION['category'] != 'All goods' && $_SESSION['brand'] != 'All brands') {

		$res = q("SELECT * FROM `goods` WHERE `category` = 
					      (SELECT `id` FROM `goods_category` 
						   WHERE `category` = '".$_SESSION['category']."') 
						   AND `brand` = (SELECT `id` FROM `goods_brand` 
						   WHERE `brand` = '".$_SESSION['brand']."')");
		$numrows = ceil($res->num_rows / 10);
		$res->close();

		$res = q("SELECT * FROM `goods` WHERE `category` = 
					      (SELECT `id` FROM `goods_category` 
						   WHERE `category` = '".$_SESSION['category']."') 
						   AND `brand` = (SELECT `id` FROM `goods_brand` 
						   WHERE `brand` = '".$_SESSION['brand']."')
			  LIMIT 10 OFFSET ".(10 *abs($_GET['key1'] ? $_GET['key1'] - 1 : 0))." ");
	}
} else {
	$_SESSION['info'] = 'Выберете категорию или бренд';
}


if(isset($_GET['delete'])) {

	$_GET['delete'] = (int)$_GET['delete'];

	if($_GET['delete']) {

		q("DELETE FROM `goods`
				  WHERE `id` = ".$_GET['delete']." ");

		$_SESSION['info'] = 'Товар был удалён';
		header("Location: /admin");
		exit;
	}

	if(isset($_GET['ids'])) {

		IntAll($_GET['ids']);

		$ids = implode(',', $_GET['ids']);
		q("DELETE FROM `goods`
				  WHERE `id` IN (".$ids.")");

		$_SESSION['info'] = 'Товары были удалены';
		header("Location: /admin");
		exit;
	} else {
		$_SESSION['info'] = 'Не выбраны товары для удаления';
		header("Location: /admin");
		exit;
	}

}

if(isset($_GET['button'])) {
	if(!isset($_GET['ids']) || count($_GET['ids']) != 1) {
		$_SESSION['info'] = 'Для редактирования можно выбрать только одну позицию';
	} else {
		$_SESSION['id'] = $_GET['ids'][0];
		header("Location: /admin/goods/edit");
		exit;
	}
}

$select1 = q(" SELECT * FROM `goods_category` ");
$select2 = q(" SELECT * FROM `goods_brand` ");



