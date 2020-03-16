<main>

	<div class="container-form-goods">

		<form id="goods-select" action="" method="get">
			<label>
				<input type="text" name="search" value="search" class="top-search-inp users-input-search">
			</label>
			<button class="users-button-search" type="submit"></button>
		</form>

		<form id="goods-button" action="" method="get">
			<button form="mainform" type="submit" name="button" value="edit">Редактировать</button>
			<input form="mainform" type="submit" name="delete" value="Удалить">
		</form>
	</div>


	<div id="content-outer">
		<div id="content">

			<div id="page-heading">
				<h1>Info</h1>
				<?php if(isset($_SESSION['info'])) {
					echo '<h1>'.$_SESSION['info'].'</h1>';
					unset($_SESSION['info']);
				} ?>
			</div>

			<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
				<tbody>
				<tr>
					<th rowspan="3" class="sized"><img src="/images/shared/side_shadowleft.jpg" width="20" height="300" alt=""></th>
					<th class="topleft"></th>
					<td id="tbl-border-top">&nbsp;</td>
					<th class="topright"></th>
					<th rowspan="3" class="sized"><img src="/images/shared/side_shadowright.jpg" width="20" height="300" alt=""></th>
				</tr>
				<tr>
					<td id="tbl-border-left"></td>
					<td>
						<div id="content-table-inner">

							<div id="table-content">

								<form id="mainform" action="">
									<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
										<tbody>
										<tr>
											<th class="table-header-check"><a id="toggle-all"></a></th>
											<th class="table-header-repeat line-left minwidth-1"><a href="#">ID</a></th>
											<th class="table-header-repeat line-left minwidth-1"><a href="#">LOGIN</a></th>
											<th class="table-header-repeat line-left"><a href="#">PASSWORD</a></th>
											<th class="table-header-options line-left"><a href="#">E-MAIL</a></th>
											<th class="table-header-options line-left"><a href="#">AGE</a></th>
											<th class="table-header-options line-left"><a href="#">ACTIVE</a></th>
											<th class="table-header-options line-left"><a href="#">ACCESS</a></th>
											<th class="table-header-options line-left"><a href="#">IP</a></th>
											<th class="table-header-options line-left"><a href="#">IMAGE</a></th>
										</tr>


										<?php for($i = 0;$row=$res->fetch_assoc();$i++) {

											if($i % 2) {
												$class = 'alternate-row';
											} else {
												$class = '';
											}
											?>
											<tr class="<?php echo $class ?>">
												<td class="options-width">
													<input type="checkbox" name="ids[]" value="<?php echo $row['id'] ?>">
													<a href="/admin/users/edit/?id=<?php echo $row['id'] ?>" title="Edit" class="icon-1 info-tooltip"></a>
													<a href="/admin/users/home/?delete=<?php echo $row['id'] ?>" title="Delete" class="icon-2 info-tooltip"></a>
												</td>
												<td><?php echo hc($row['id']); ?></td>
												<td><?php echo hc($row['login']); ?></td>
												<td><?php echo hc($row['password']); ?></td>
												<td><?php echo hc($row['email']); ?></td>
												<td><?php echo hc($row['age']); ?></td>
												<td><?php echo hc($row['active']); ?></td>
												<td><?php echo hc($row['access']); ?></td>
												<td><?php echo hc($row['ip']); ?></td>
												<td><?php echo hc($row['image']); ?></td>
											</tr>
										<?php }  ?>

										</tbody>
									</table>
								</form>
							</div>

							<div id="actions-box">

								<div id="actions-box-slider">
									<a href="" class="action-edit">Edit</a>
									<a href="" class="action-delete">Delete</a>
								</div>
								<div class="clear"></div>
							</div>
						</div>
					</td>
					<td id="tbl-border-right"></td>
				</tr>
				<tr>
					<th class="sized bottomleft"></th>
					<td id="tbl-border-bottom">&nbsp;</td>
					<th class="sized bottomright"></th>
				</tr>
				</tbody></table>
			<div class="clear">&nbsp;</div>
		</div>
		<div class="clear">&nbsp;</div>
	</div>

</main>

