<?php

if(isset($_GET['checkbox-category']) || isset($_GET['checkbox-brand']) && (isset($_GET['submit-ul']))) {

	@$_SESSION['checkbox-category'] = $_GET['checkbox-category'];
	@$_SESSION['checkbox-brand'] = $_GET['checkbox-brand'];
	unset($_GET['checkbox-category'], $_GET['checkbox-brand'], $_GET['key1']);

} elseif(!isset($_GET['checkbox-category']) && !isset($_GET['checkbox-brand']) && (isset($_GET['submit-ul']))) {
	unset($_SESSION['checkbox-category'], $_SESSION['checkbox-brand'], $_GET['key1']);
}


Paginator::$limit = 8;
Paginator::setPagenumber($_GET['pagenumber'] = $_GET['pagenumber'] ?? 1);

$res = q(" SELECT SQL_CALC_FOUND_ROWS * FROM `goods`
   				  LIMIT ".Paginator::$limit." OFFSET ".Paginator::getOffset()." ");

Paginator::setCountpage(q("SELECT FOUND_ROWS()"));



if(isset($_SESSION['checkbox-category']) && !isset($_SESSION['checkbox-brand'])) {

	$category = implode(',', $_SESSION['checkbox-category']);

	$res = q("
  		SELECT SQL_CALC_FOUND_ROWS * FROM `goods` 
  		WHERE `category` IN (".$category.") 
  		LIMIT ".Paginator::$limit." OFFSET ".Paginator::getOffset()."
  	");

	Paginator::setCountpage(q("SELECT FOUND_ROWS()"));


} elseif(isset($_SESSION['checkbox-brand']) && !isset($_SESSION['checkbox-category'])) {

	$brand = implode(',', $_SESSION['checkbox-brand']);

	$res = q("
  		SELECT SQL_CALC_FOUND_ROWS * FROM `goods`
  		WHERE `brand` IN (".$brand.")
  		LIMIT ".Paginator::$limit." OFFSET ".Paginator::getOffset()."
  	");

	Paginator::setCountpage(q("SELECT FOUND_ROWS()"));

} elseif(isset($_SESSION['checkbox-category'], $_SESSION['checkbox-brand'])) {

	$category = implode(',', $_SESSION['checkbox-category']);
	$brand = implode(',', $_SESSION['checkbox-brand']);

	$res = q("SELECT SQL_CALC_FOUND_ROWS * FROM `goods` 
  		WHERE `category` IN (".$category.")
  		AND `brand` IN (".$brand.")
  		LIMIT ".Paginator::$limit." OFFSET ".Paginator::getOffset()."
  	");

	Paginator::setCountpage(q("SELECT FOUND_ROWS()"));

}

$ul1 = q(" SELECT * FROM `goods_category` ");
$ul2 = q(" SELECT * FROM `goods_brand` ");

