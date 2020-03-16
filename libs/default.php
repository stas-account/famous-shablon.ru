<?php

/*
ALIAS:
q(); Запрос
es(); mysqli_real_escape_string

РАБОТА С ОБЪЕКТОМ ВЫБОРКИ
$res = q(); // Запрос с возвратом результата
$res->num_rows; // Количество возвращенных строк - mysqli_num_rows();
$res->fetch_assoc(); // достаём запись - mysqli_fetch_assoc();
$res->close(); // Очищаем результат выборки

РАБОТА С ПОДКЛЮЧЕННОЙ MYSQL
DB::_()->affected_rows; // Количество изменённых записей
DB::_()->insert_id; // Последний ID вставки
DB::_()->real_escape_string(); // аналог es();
DB::_()->query(); // аналог q
DB::_()->multi_ query(); // Множественные запросы

DB::close(); // Закрываем соединение с БД
*/

class DB {
	static public $mysqli = [];
	static public $connect = [];

	 static public function _($key = 0) {
		if(!isset(self::$mysqli[$key])) {
			if(!isset(self::$connect['server']))
				self::$connect['server'] = Core::$DB_LOCAL;
			if(!isset(self::$connect['user']))
				self::$connect['user'] = Core::$DB_LOGIN;
			if(!isset(self::$connect['pass']))
				self::$connect['pass'] = Core::$DB_PASS;
			if(!isset(self::$connect['db']))
				self::$connect['db'] = Core::$DB_NAME;

			self::$mysqli[$key] = @new mysqli(self::$connect['server'],self::$connect['user'],self::$connect['pass'],self::$connect['db']); // WARNING
			if (mysqli_connect_errno()) {
				echo 'Не удалось подключиться к Базе Данных';
				exit;
			}
			if(!self::$mysqli[$key]->set_charset("utf8")) {
				echo 'Ошибка при загрузке набора символов utf8:'.self::$mysqli[$key]->error;
				exit;
			}
		}
		return self::$mysqli[$key];
	}
	static public function close($key = 0) {
		self::$mysqli[$key]->close();
		unset(self::$mysqli[$key]);
	}
}

function q($query) { // mysqli_query
	$resource = DB::_()->query($query);
	if($resource === false) {
		$info = debug_backtrace();
		// wtf($info);
		$error = "<pre>QUERY: ".htmlspecialchars($query)."<br>\r\n".
			'ERROR: '.DB::_()->error."<br>\r\n".
			'LINE: '.$info['0']['line']."<br>\r\n".
			'FILE: '.$info['0']['file']."<br>\r\n".
			'DATE: '.date('Y-m-d H:i:s').'</pre>';
		// Отправка уведомления на почту
		file_put_contents('./logs/mysql.txt', (htmlspecialchars_decode(strip_tags($error)))."\r\n\r\n", FILE_APPEND);
		exit ($error);
	} else {
		return $resource;
	}
}

function wtf($array, $stop = false) {
	echo '<pre>'.print_r($array,1).'</pre>';
	if(!$stop) {
		exit();
	}
}

function trimAll($el) {
	if(!is_array($el)) {
		$el = trim($el);
	} else {
		$el = array_map('trimAll', $el);
	}
	return $el;
}

function IntAll($el) {
	if(!is_array($el)) {
		$el = (int)$el;
	} else {
		$el = array_map('IntAll', $el);
	}
	return $el;
}

function FloatAll($el) {
	if(!is_array($el)) {
		$el = (float)$el;
	} else {
		$el = array_map('FloatAll', $el);
	}
	return $el;
}

function es ($el, $key = 0) { // MysqliRealEscapeStringAll
	if(!is_array($el)) {
		$el = DB::_()->real_escape_string($el);
	} else {
		$el = array_map('es', $el);
	}
	return $el;
}

function hc ($el) { // HtmlSpecialCharsAll
	if(!is_array($el)) {
		$el = htmlspecialchars($el);
	} else {
		$el = array_map('hc', $el);
	}
	return $el;
}

function myHash($var) {
	$salt = 'ABC';
	$salt2 = 'CBA';
	$var = crypt(md5($var.$salt), $salt2);
	return $var;
}

spl_autoload_register (function ($class) {
	include './libs/class'.$class.'.php';
});

function resizeImage ($file, $w, $h, $path, $crop = FALSE) {
	list($width, $height) = getimagesize($file);
	$r = $width / $height;
	if ($crop) {
		if ($width > $height) {
			$width = ceil($width-($width*abs($r-$w/$h)));
		} else {
			$height = ceil($height-($height*abs($r-$w/$h)));
		}
		$newwidth = $w;
		$newheight = $h;
	} else {
		if ($w/$h > $r) {
			$newwidth = $h*$r;
			$newheight = $h;
		} else {
			$newheight = $w/$r;
			$newwidth = $w;
		}
	}
	switch($_FILES['file']['type']) {
		case 'image/jpeg':
			$src = imagecreatefromjpeg($file);
			break;
		case 'image/png':
			$src = imagecreatefrompng($file);
			break;
		case 'image/gif':
			$src = imagecreatefromgif($file);
			break;
		case 'image/bmp':
			$src = imagecreatefrombmp($file);
			break;
	}

	$dst = imagecreatetruecolor($newwidth, $newheight);
	imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
	imagejpeg($dst, $path, 100);
	imagedestroy($dst);
}















