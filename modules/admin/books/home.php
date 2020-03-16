<?php

if(isset($_GET['author'], $_GET['genre'])) {
	$_SESSION['author'] = $_GET['author'];
	$_SESSION['genre'] = $_GET['genre'];
	unset($_GET['author'], $_GET['genre'], $_GET['key1']);
}
if(!isset($_GET['author'], $_GET['genre']) && !isset($_SESSION['author'],$_SESSION['genre'])) {
	$_SESSION['author'] = 'All authors';
	$_SESSION['genre'] = 'All genres';
}

$_GET['key1'] = $_GET['key1'] ?? 1;

$res = q(" SELECT * FROM `books` ");
$numrows = ceil($res->num_rows / 10);
$res->close();

$res = q(" SELECT * FROM `books` 
	LIMIT 10 OFFSET ".(10 *abs($_GET['key1'] ? $_GET['key1'] - 1 : 0))." ");

if(isset($_SESSION['author'], $_SESSION['genre'])) {

	if($_SESSION['genre'] == 'All genres' && $_SESSION['author'] != 'All authors') {

		$res = q("SELECT books.* FROM books, books2books_author 
						WHERE books.id = books2books_author.books_id 
						  AND books2books_author.books_author_id = ".$_SESSION['author']." ");
		$numrows = ceil($res->num_rows / 10);
		$res->close();

		$res = q("SELECT books.* FROM books, books2books_author 
						WHERE books.id = books2books_author.books_id 
						  AND books2books_author.books_author_id = ".$_SESSION['author']." 
				LIMIT 10 OFFSET ".(10 *abs($_GET['key1'] ? $_GET['key1'] - 1 : 0))." ");

	} elseif($_SESSION['author'] == 'All authors' && $_SESSION['genre'] != 'All genres') {

		$res = q("SELECT books.* FROM books, books2books_genre 
						WHERE books.id = books2books_genre.books_id 
						  AND books2books_genre.books_genre_id = ".$_SESSION['genre']." ");
		$numrows = ceil($res->num_rows / 10);
		$res->close();

		$res = q("SELECT books.* FROM books, books2books_genre 
						WHERE books.id = books2books_genre.books_id 
						  AND books2books_genre.books_genre_id = ".$_SESSION['genre']." 
				LIMIT 10 OFFSET ".(10 *abs($_GET['key1'] ? $_GET['key1'] - 1 : 0))." ");

	} elseif($_SESSION['author'] != 'All authors' && $_SESSION['genre'] != 'All genres') {

		$res = q("SELECT books.* FROM books, books2books_author, books2books_genre
						WHERE (books.id = books2books_author.books_id 
						          AND books2books_author.books_author_id = ".$_SESSION['author'].")
                        AND   (books.id = books2books_genre.books_id  
                        		  AND books2books_genre.books_genre_id = ".$_SESSION['genre'].")");
		$numrows = ceil($res->num_rows / 10);
		$res->close();

		$res = q("SELECT books.* FROM books, books2books_author, books2books_genre
						WHERE (books.id = books2books_author.books_id 
						          AND books2books_author.books_author_id = ".$_SESSION['author'].")
                        AND   (books.id = books2books_genre.books_id  
                        		  AND books2books_genre.books_genre_id = ".$_SESSION['genre'].")
                  LIMIT 10 OFFSET ".(10 *abs($_GET['key1'] ? $_GET['key1'] - 1 : 0))." ");
	}
} else {
	$_SESSION['info'] = 'Выберете категорию или бренд';
}

if(isset($_GET['delete'])) {

	$_GET['delete'] = (int)$_GET['delete'];

	if($_GET['delete']) {

		q("DELETE FROM `books`
				  WHERE `id` = ".$_GET['delete']." ");

		$_SESSION['info'] = 'Товар был удалён';
		header("Location: /admin/books/home");
		exit;
	}

	if(isset($_GET['ids'])) {

		IntAll($_GET['ids']);

		$ids = implode(',', $_GET['ids']);
		q("
		DELETE FROM `books`
		WHERE `id` IN (".$ids.")
		");

		$_SESSION['info'] = 'Товары были удалены';
		header("Location: /admin/books/home");
		exit;
	} else {
		$_SESSION['info'] = 'Не выбраны товары для удаления';
		header("Location: /admin/books/home");
		exit;
	}
}

if(isset($_GET['button'])) {
	if(!isset($_GET['ids']) || count($_GET['ids']) != 1) {
		$_SESSION['info'] = 'Для редактирования можно выбрать только одну позицию';
	} else {
		$_SESSION['id'] = $_GET['ids'][0];
		header("Location: /admin/books/edit");
		exit;
	}
}

$select1 = q(" SELECT * FROM `books_author` ");
$select2 = q(" SELECT * FROM `books_genre` ");



