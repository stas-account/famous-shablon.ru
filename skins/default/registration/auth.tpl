

	<div class="default-registration-auth" id="default-registration-auth">
		<?php if(!isset($_SESSION['user'])) { echo @$error;?>
		<form action="" method="post" id="default-registration-auth-form" onsubmit="return lengthLoginPass();">
			<label><span>Login: </span><input type="text" name="login" id="login"><br></label>
			<label><span>Pass:   </span><input type="text" name="pass" id="pass"><br></label>
			<label><input type="checkbox" name="autoauth" value="autoauth"><span>Remember me</span><br></label>
			<span><input type="submit" name="submit" value="Вход"><br></span>
			<a style="color: -webkit-link; cursor: pointer; text-decoration: underline;" href="/registration/registration">Create an account</a>
		</form>
		<?php } elseif(isset($_SESSION['user']) && $_SESSION['user']['access'] != 5 && isset($_GET['admin']) ) { ?>
			<h2>У вас нет доступа в админ панель</h2><a style="display:block; font-size: 21px;" href="/">На главную</a>
		<?php } else { ?>
			<?php if(isset($_SESSION['user'])) { echo '<h2 style="display:inline;">'.$_SESSION['user']['login'].'</h2>'; } ?>, Вы авторизованы <a style="color: -webkit-link; cursor: pointer; text-decoration: underline;" href="/registration/exit">Выйти</a>
		<?php } ?>
	</div>

	<script>
		let dropAuthorization = null;
		<?php if(isset($error)) {
			echo 'dropAuthorization = document.getElementById(\'drop-authorization\');';
		} ?>
	</script>



