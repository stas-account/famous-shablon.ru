<?php

if(isset($_GET['route'])) {

	$temp = explode('/', $_GET['route']);

	unset($_GET['route']);

	if($temp[0] == 'admin') {
		Core::$MODULES = Core::$MODULES.'/admin';
		Core::$SKIN = 'admin';
		$_GET['route'] = true;
		$_GET['admin'] = true;
		unset($temp[0]);
	}
	$i = 0;
	foreach($temp as $k=>$v) {
		if($i == 0) {
			if(!empty($v)) {
				$_GET['module'] = $v;
			}
		} elseif($i == 1) {
			if(!empty($v)) {
				$_GET['page'] = $v;
			}
		} else {
			if(!empty($k) && !isset($_GET['route'])){
				$_GET['key'.($k-1)] = $v;
			} elseif(!empty($k) && $_GET['route'] == true) {
				$_GET['key'.($k-2)] = $v;
			}
		}
		++$i;
	}
}

if(!isset($_GET['module'])) {
	$_GET['module'] = 'main';
} else {
	$res = q("
		SELECT *
		FROM `pages`
		WHERE `module` = '".es($_GET['module'])."'
		LIMIT 1
	");

	if(!$res->num_rows) {
		header("Location: /error/404error");
		exit;
	} else {
		$staticpage = $res->fetch_assoc();
		$res->close();
		if($staticpage['static'] == 1) {
			$_GET['module'] = 'staticpage';
			$_GET['page'] = 'main';
		}
	}
}

if(!isset($_GET['page'])) {
	$_GET['page'] = 'main';
}

if(!preg_match('#^[a-z0-9_-]*$#iu', $_GET['page'])) {
	header("Location: /error/404error");
	exit;
}


if(isset($_GET['route'])) {
	$_GET['route'] = 'admin'.'/'.$_GET['module'].'/'.$_GET['page'];
} else {
	$_GET['route'] = $_GET['module'].'/'.$_GET['page'];
}





/*
$allowed = ['adminpanel','registration','battleofalcoholics','battleofalcoholics2', 'bestseller','blog','goods','copyright', 'filemanager', 'home', 'books', 'main', 'newarrivals', 'domashka16lesson', 'comments', 'error', '404error', 'edit', 'add', 'activate', 'auth', 'registration', 'users'];
if(!isset($_GET['module']) && !isset($_GET['page'])) {
	$_GET['module'] = 'main';
	$_GET['page'] = 'main';
} elseif(!in_array($_GET['module'],$allowed) && Core::$SKIN != 'admin') {
	header("Location: /error/404error");
	exit;
}
*/

