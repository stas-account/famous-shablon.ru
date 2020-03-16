<?php

if(!isset($_SESSION['user']) || $_SESSION['user']['access'] != 5) {
	if($_GET['module'] != 'main') {
		header('Location: /admin/main');
		exit;
	}
}
