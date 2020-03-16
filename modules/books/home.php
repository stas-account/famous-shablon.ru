<?php

if(isset($_GET['checkbox-author']) || isset($_GET['checkbox-genre']) && (isset($_GET['submit-ul']))) {

	@$_SESSION['checkbox-author'] = $_GET['checkbox-author'];
	@$_SESSION['checkbox-genre'] = $_GET['checkbox-genre'];
	unset($_GET['checkbox-author'], $_GET['checkbox-genre'], $_GET['key1']);

} elseif(!isset($_GET['checkbox-author']) && !isset($_GET['checkbox-author']) && (isset($_GET['submit-ul']))) {
	unset($_SESSION['checkbox-author'], $_SESSION['checkbox-genre'], $_GET['key1']);
}


Paginator::$limit = 8;
Paginator::setPagenumber($_GET['pagenumber'] = $_GET['pagenumber'] ?? 1);

$res = q(" SELECT SQL_CALC_FOUND_ROWS * FROM `books`
   				  LIMIT ".Paginator::$limit." OFFSET ".Paginator::getOffset()." ");

Paginator::setCountpage(q("SELECT FOUND_ROWS()"));



if(isset($_SESSION['checkbox-author']) && !isset($_SESSION['checkbox-genre'])) {

	$author = implode(',', $_SESSION['checkbox-author']);

	$res = q("
  		SELECT SQL_CALC_FOUND_ROWS * FROM `books` WHERE id IN 
  		(SELECT books_id FROM books2books_author WHERE books_author_id IN (".$author."))
  		LIMIT ".Paginator::$limit." OFFSET ".Paginator::getOffset()."
  	");

	Paginator::setCountpage(q("SELECT FOUND_ROWS()"));


} elseif(isset($_SESSION['checkbox-genre']) && !isset($_SESSION['checkbox-author'])) {

	$genre = implode(',', $_SESSION['checkbox-genre']);

	$res = q("
  		SELECT SQL_CALC_FOUND_ROWS * FROM `books` WHERE id IN 
  		(SELECT books_id FROM books2books_genre WHERE books_genre_id IN (".$genre."))
  		LIMIT ".Paginator::$limit." OFFSET ".Paginator::getOffset()."
  	");

	Paginator::setCountpage(q("SELECT FOUND_ROWS()"));

} elseif(isset($_SESSION['checkbox-author'], $_SESSION['checkbox-genre'])) {

	$author = implode(',', $_SESSION['checkbox-author']);
	$genre = implode(',', $_SESSION['checkbox-genre']);

	$res = q("
		SELECT SQL_CALC_FOUND_ROWS * FROM `books` WHERE id IN (
		SELECT books_id FROM books2books_author WHERE books_author_id IN (".$author.")
		UNION SELECT books_id FROM books2books_genre WHERE books_genre_id IN (".$genre."))
  		LIMIT ".Paginator::$limit." OFFSET ".Paginator::getOffset()."
  	");

	Paginator::setCountpage(q("SELECT FOUND_ROWS()"));
}

$ul1 = q(" SELECT * FROM `books_author` ");
$ul2 = q(" SELECT * FROM `books_genre` ");

