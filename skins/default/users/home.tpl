<main>
	<?php if(isset($errors)) {
		echo '<div style="padding:100px 0;"><h2>'.$errors.'</h2></div>';
	} elseif(isset($_SESSION['info'])) {
		echo '<h1>'.$_SESSION['info'].'</h1>';
		unset($_SESSION['info']);
	}?>
	<?php
	if(isset($_SESSION['user']) && $_SESSION['user']['active'] == 1) { ?>

		<div class="container-edit-profile">

				<div class="login">
					<form action="" method="get">
					<h3>Login</h3>
					<p>Welcome back! Edit in your account</p>

					<label>Login<span>*</span>
						<input type="text" name="login" value="<?php echo hc($row['login'])?>">
					</label>

					<label>Password<span>*</span>
						<input type="text" name="password" value="<?php echo hc($row['password'])?>">
					</label>

					<label>Email address<span>*</span>
						<input type="text" name="email" value="<?php echo hc($row['email'])?>">
					</label>

					<label>Age<span>*</span>
						<input type="text" name="age" value="<?php echo hc($row['age'])?>">
					</label>

					<div class="container-button">
						<button class="button" type="submit" name="button" value="button">
							<i class="fas fa-lock"></i>
							<span>Редактировать</span>
						</button>
					</div>
					</form>
				</div>

				<div class="picture">
					<form action="" method="post" enctype="multipart/form-data">
						<h3>Picture</h3>
						<p>Edit in your picture</p>

						<input type="file" name="file" accept="image/jpeg,image/png,image/gif,image/bmp">

						<div class="container-picture">
							<img src="<?php echo hc($row['image'])?>" alt="">
						</div>

						<div class="container-button">
							<button class="button" type="submit" name="button" value="button">
								<i class="far fa-user"></i>
								<span>Загрузить изображение</span>
							</button>
						</div>
					</form>
				</div>
		</div>


<?php } ?>
</main>