<main style="text-align:left; padding: 40px 0;">


	<div class="container-comments-form">

		<?php if(isset($_SESSION['user'])) { ?>

	<div class="container-edit-profile">
		<h3>Оставьте отзыв о сайте:</h3>
		<p>Welcome! Leave your feedback</p>

		<div class="login">

		<form action="" method="get" id="default-comments-form">

			<label>Login<span>*</span>
				<input id="default-comments-input-name" type="text" name="name" value="<?php echo $_SESSION['user']['login']; ?>">
			</label>
			<?php echo @htmlspecialchars($error['name']) ?>

			<label>Email address<span>*</span>
				<input id="default-comments-input-email" type="email"  name="email" value="<?php echo $_SESSION['user']['email']; ?>">
			</label>
			<?php echo @htmlspecialchars($error['email']) ?>

			<label>Введите комментарий<span>*</span>:
			<textarea id="default-comments-textarea-comment" placeholder="Ваш комментарий..." cols="60" rows="10" name="comment"></textarea>
			</label>
			<?php echo @htmlspecialchars($error['comment']) ?>

			<div class="container-button">
				<button class="button" type="submit" name="submit" value="Отправить отзыв">
					<i class="fas fa-lock"></i>
					<span>Отправить отзыв</span>
				</button>
			</div>

			<span>*</span> - обязательные поля для заполнения
		</form>
		</div>
	</div>

		<?php } else {
			echo '<div style="padding:100px 0"><h2 style="text-align:center;">'.'Чтобы оставить комментарий вам необходимо авторизоваться'.'</h2></div>';
		} ?>

	</div>

	<div class="default-comments-container-div-2">
		<?php if(isset($_SESSION['review']) || $_GET['module'] == 'comments') {
			while($row = $res->fetch_assoc()){ ?>

			<div class="default-comments-container-div-3 clearfix" style="display: ;">

				<div>
					<img src="<?php

					if($row['image'] == false) {
						$row['image'] = '/uploaded/20200114-140623img78260.jpg';
						echo $row['image'];
					} else {
						echo hc($row['image']);
					}

					?>" alt="">
				</div>

				<h3><?php echo @hc($row['name']) ?></h3>
				<span><?php echo @hc($row['date']) ?></span>
				<div class="default-comments-container-div">

					<?php echo nl2br(@hc($row['comment']));
					unset($_SESSION['review']); ?>

				</div>

			</div>
		<?php  }

		} else {
			echo '';
		}?>

	</div>

	<div>
</main>
