<?php

class Paginator {
	public static $limit = 10;
	public static $pagenumber;
	private static $offset;
	// Значение $numpage (number of page) получaем из БД
	private static $countpage;
	// Массив для ссылок
	public static $arrayLink = [];
	public static $arrayDelimiter = [];

	//Геттер для $pagenumber исключающий отрицательные значения
	public static function setPagenumber (int $pagenumber){
		self::$pagenumber = ($pagenumber >= 1 ? $pagenumber : 1 );
	}

	// Получаем значение для OFFSET
	public static function getOffset() {
		self::$offset = self::$limit * abs(self::$pagenumber - 1);
		return self::$offset;
	}
	// Сеттер и геттер для количества страниц
	public static function setCountpage (mysqli_result $countpage) {
		self::$countpage = ceil($countpage->fetch_array()['FOUND_ROWS()'] / self::$limit);
		self::$pagenumber <= self::$countpage ? self::$pagenumber : self::$pagenumber = self::$countpage;
	}
	public static function getCountpage () {
		return self::$countpage;
	}
	// Получим номера выводимых страниц
	public static function showPaginator () {

		$pagenumber = self::$pagenumber;
		$countpage = self::$countpage;
		$arrayLink = [];

		if($pagenumber <= 1) {

			for($x = 1; $countpage - $pagenumber > 1; $pagenumber++) {

				if($x > 3) {
					if($pagenumber + 2 <= $countpage) {
						Paginator::$arrayDelimiter['delimiter2'] = true;
					}
					break;
				}
				Paginator::$arrayLink['page'.$x] = $pagenumber + 1;
				$x++;
			}

		} elseif($pagenumber >= $countpage) {

			for($x = 1; $pagenumber > 2; $pagenumber--) {

				if($x > 3) {
					break;
				}
				if(!isset(Paginator::$arrayDelimiter['delimiter1']) && $pagenumber - 4 > 1) {
					Paginator::$arrayDelimiter['delimiter1'] = true;
				}
				$arrayLink['page'.$x] = $pagenumber - 1;
				$x++;
			}
			$array = $arrayLink;
			sort($array);
			$arrayLink = array_keys($arrayLink);
			Paginator::$arrayLink = array_combine($arrayLink, $array);

		} elseif($pagenumber > 1 && $pagenumber < $countpage) {

				$c = $countpage - 1;

				if($c <= 4 && $c > 1) {

					for ($x = 2; $x < $countpage ;$x++) {

						Paginator::$arrayLink['page'.($x - 1)] = $x;

					}

				} elseif($c > 4) {

					if(($pagenumber - 1) <= 2) {

						for ($x = 2; $x <= 4 ;$x++) {
							Paginator::$arrayLink['page'.($x - 1)] = $x;
							if($x == 4) {
								Paginator::$arrayDelimiter['delimiter2'] = true;
							}
						}
					} elseif(($pagenumber + 1) >= $c) {

						for ($x = 3, $i = 1; $x >= 1 ;$x--, $i++) {
							if($x == 3) {
								Paginator::$arrayDelimiter['delimiter1'] = true;
							}
							Paginator::$arrayLink['page'.$i] = $countpage - $x;
						}
					}  else {
						Paginator::$arrayDelimiter['delimiter1'] = true;
						Paginator::$arrayLink['page1'] = $pagenumber - 1;
						Paginator::$arrayLink['page2'] = $pagenumber;
						Paginator::$arrayLink['page3'] = $pagenumber + 1;
						Paginator::$arrayDelimiter['delimiter2'] = true;
					}

				}

			}

		}
}

/*

Передаём значения для БД количество выводимых товаров $limit и номер страницы в пагинаторе $page
Paginator::$limit = 10;
Paginator::$pagenumber = ($_GET['page'] = $_GET['page'] ?? 1);

Выполняем запрос для вывода товаров и отдельный запрос для количества строк num_rows, передаём в
класс для определения количества страниц

$res = q(" SELECT SQL_CALC_FOUND_ROWS * FROM `goods`
   				  LIMIT ".Paginator::$limit." OFFSET ".Paginator::getOffset()." ");

Paginator::setNumpage((q("SELECT FOUND_ROWS()")->fetch_array())['FOUND_ROWS()']);

*/