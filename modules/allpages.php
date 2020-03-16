<?php

if(isset($_SESSION['user'])) {
	$res = q("
		SELECT *
		FROM `users`
		WHERE `id` = ".$_SESSION['user']['id']."
		LIMIT 1
	");
	$_SESSION['user'] = mysqli_fetch_assoc($res);
	if($_SESSION['user']['active'] != 1) {
		header("Location: /registration/exit");
		exit();
	}
	?>
	<script>

		let image = '<?php if(isset($_SESSION['user'])) { echo $_SESSION['user']['image']; } ?>';

	</script>
	<?php
}
?>


