<main>
	<div style="padding:100px 0;">
		<h2><?php if(isset($info)) { echo @$info; } ?></h2>
		<!--
		<h2><a style="color: -webkit-link; cursor: pointer; text-decoration: underline;" href="/registration/auth">Логин и пароль</a></h2> -->
	</div>
	<script>

		if (dropAuthorization === null) {
			setTimeout(function () {
					let elem = document.getElementById('drop-authorization');
					let event = new Event("click");
					elem.dispatchEvent(event);
				}
				, 4000);
		}

	</script>
</main>
