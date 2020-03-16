<main>

	<div class="default-registration-registration">
		<?php

		if(isset($_SESSION['registration']) && $_SESSION['registration'] == 'OK') {
			echo '<h3>'.'Для завершения регистрации пройдите по ссылке отправленной на вашу электронную почту'.'</h3>';
		}

		if(isset($errors)) {
			foreach($errors as $value) {
				echo '<h3>'.$value.' '.'<br>'.'</h3>';
			}
		}
		?>

		<div class="container-edit-profile">
			<div class="login">
				<form action="" method="post">
					<h3>New Customer</h3>
					<p>Welcome! Create your account</p>

					<label>Login<span>*</span>
						<input type="text" name="login" value="<?php if(isset($_POST['login'])) { echo $_POST['login']; }; ?>">
					</label>

					<label>Email address<span>*</span>
						<input type="text" name="email" value="<?php if(isset($_POST['email'])) { echo $_POST['email']; }; ?>">
					</label>

					<label>Password<span>*</span>
						<input type="text" name="password" value="<?php if(isset($_POST['password'])) { echo $_POST['password']; }; ?>">
					</label>

					<label>Age<span>*</span>
						<input type="text" name="age" value="<?php if(isset($_POST['age'])) { echo $_POST['age']; }; ?>">
					</label>

					<label class="checkbox" ><input type="checkbox">
						Sign up for our newsletter!</label>

					<div class="container-button">
						<button class="button" type="submit" name="submit" value="submit">
							<i class="fas fa-lock"></i>
							<span>Отправить</span>
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>

</main>