
<form action="" method="post" id="default-registration-auth-form" onsubmit="return lengthLoginPass();"></form>
	<div id="loginbox">

		<p style="padding-bottom: 12px; text-align: center; font-size: 15px;">
			<?php if(!isset($_SESSION['user'])) { echo @$error; ?>
		</p>

		<div id="login-inner">
			<table border="0" cellpadding="0" cellspacing="0">
				<tbody><tr>
					<th>Username</th>
					<td>
						<label>
							<input form="default-registration-auth-form" name="login" type="text" class="login-inp">
						</label>
					</td>
				</tr>
				<tr>
					<th>Password</th>
					<td>
						<label>
							<input form="default-registration-auth-form" name="pass" type="password" class="login-inp">
						</label>
					</td>
				</tr>
				<tr>
					<th></th>
					<td class="td-checkbox" valign="top">
						<input form="default-registration-auth-form" name="autoauth" value="autoauth" type="checkbox" class="checkbox-size" id="login-check">
						<label for="login-check">Remember me</label>
					</td>
				</tr>
				<tr>
					<th></th>
					<td class="td-submit"><input form="default-registration-auth-form" type="submit" class="submit-login"></td>
				</tr>
				</tbody></table>
		</div>
		<?php } elseif(isset($_SESSION['user']) && $_SESSION['user']['access'] != 5 && isset($_GET['admin']) ) { ?>
			<h2 style="text-align:center;">У вас нет доступа в админ панель</h2><a style="display:block; text-align:center; font-size: 21px;" href="/">На главную</a>
		<?php }  ?>
		<div class="clear"></div>
	</div>


