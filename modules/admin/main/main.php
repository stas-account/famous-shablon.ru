<?php

if(!isset($_SESSION['user']) || $_SESSION['user']['access'] != 5) {
	include './modules/admin/registration/auth.php';
}

if(isset($_SESSION['user']) && $_SESSION['user']['access'] == 5) {
	include './modules/admin/goods/home.php';
}