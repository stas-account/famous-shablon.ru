<?php

setcookie('kyka', myHash(($_SESSION['user']['login']).$_SESSION['user']['password']), time()- 3600, '/');

session_unset();
session_destroy();

header('Location: /');
exit();