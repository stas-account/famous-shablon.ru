<main>

<?php

if(!isset($_SESSION['user']) || $_SESSION['user']['access'] != 5) {
	include './skins/admin/registration/auth.tpl';
} else {
	include './skins/admin/goods/home.tpl';
}

?>

</main>