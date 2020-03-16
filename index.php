<?php
error_reporting(-1);
ini_set('display_errors','on');
header('Content-Type: text/html; charset=utf-8');
session_start();

include_once './config.php';
include_once './libs/default.php';
include_once './variables.php';

ob_start();

	include './'.Core::$MODULES.'/allpages.php';

	if(!file_exists('./'.Core::$MODULES.'/'.$_GET['module'].'/'.$_GET['page'].'.php') || !file_exists('./skins/'.Core::$SKIN.'/'.$_GET['module'].'/'.$_GET['page'].'.tpl')) {
		header("Location: /error/404error");
		exit;
	}

	include './modules/registration/auth.php';

	include './'.Core::$MODULES.'/'.$_GET['module'].'/'.$_GET['page'].'.php';
	include './skins/'.Core::$SKIN.'/'.$_GET['module'].'/'.$_GET['page'].'.tpl';
	$content = ob_get_contents();

ob_end_clean();


include './skins/'.Core::$SKIN.'/index.tpl';





/*

echo 'POST';
wtf($_POST,1);
echo 'GET';
wtf($_GET,1);
echo 'SESSION';
wtf($_SESSION, 1);
echo 'COOKIE';
wtf($_COOKIE, 1);
echo 'FILES';
wtf($_FILES,1);

$resource = mysqli_connect(Core::$DB_LOCAL, Core::$DB_LOGIN, Core::$DB_PASS, Core::$DB_NAME); // resource потому что это тип переменной
mysqli_set_charset($resource, 'utf-8');

*/
