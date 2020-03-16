<main>
	<div class="container-form-goods">
		<form id="goods-select" action="" method="get">
			<label>
				<select class="styledselect" name="category">
					<option <?php if(@$_SESSION['category'] == 'All goods') {echo 'selected';}?>>All goods</option>
					<?php while($row=$select1->fetch_assoc()) { ?>
						<option <?php if(@$_SESSION['category'] == $row['category']) echo 'selected' ?>><?php echo $row['category']; ?></option>
					<?php } ?>
				</select>
			</label>

			<label>
				<select class="styledselect" name="brand">
					<option <?php if(@$_SESSION['brand'] == 'All brands') {echo 'selected';}?>>All brands</option>
					<?php while($row=$select2->fetch_assoc()) { ?>
						<option <?php if(@$_SESSION['brand'] == $row['brand']) echo 'selected' ?>><?php echo $row['brand']; ?></option>
					<?php } ?>
				</select>
			</label>
			<input type="submit" value="Выбрать">
		</form>

		<form id="goods-button" action="" method="get">
			<button class="add-button" type="submit"><a href="/admin/goods/add">Добавить</a></button>
			<button type="submit" form="mainform" name="button" value="edit">Редактировать</button>
			<input type="submit" form="mainform" name="delete" value="Удалить">
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
											<th class="table-header-repeat line-left minwidth-1"><a href="#">NAME</a></th>
											<th class="table-header-repeat line-left"><a href="#">ARTICLE</a></th>
											<th class="table-header-options line-left"><a href="#">AVAILABILITY</a></th>
											<th class="table-header-options line-left"><a href="#">DESCRIPTION</a></th>
											<th class="table-header-options line-left"><a href="#">PRICE</a></th>
											<th class="table-header-options line-left"><a href="#">IMAGE</a></th>
										</tr>


										<?php if(isset($_SESSION['category'], $_SESSION['brand'])) { for($i = 0;$row=$res->fetch_assoc();$i++) {

											if($i % 2) {
												$class = 'alternate-row';
											} else {
												$class = '';
											}
											?>
											<tr class="<?php echo $class ?>">
												<td class="options-width">
													<input type="checkbox" name="ids[]" value="<?php echo $row['id'] ?>">
													<a href="/admin/goods/edit/?id=<?php echo $row['id'] ?>" title="Edit" class="icon-1 info-tooltip"></a>
													<a href="/admin/?delete=<?php echo $row['id'] ?>" title="Delete" class="icon-2 info-tooltip"></a>
												</td>
												<td><?php echo hc($row['id']); ?></td>
												<td><?php echo hc($row['name']); ?></td>
												<td><?php echo hc($row['article']); ?></td>
												<td><?php echo hc($row['availability']); ?></td>
												<td><?php echo hc($row['description']); ?></td>
												<td><?php echo hc($row['price']); ?></td>
												<td><?php echo hc($row['image']); ?></td>
											</tr>
										<?php } } ?>

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
	<div class="clear">&nbsp;</div>
	<div class="admin-paginator"><?php include './skins/default/paginator/paginator.tpl' ?></div>
</main>












