<main>


	<form id="goods-edit-input" action=""  method="get">

	</form>

	<form id="goods-edit-image" action=""  method="post" enctype="multipart/form-data">

	</form>



	<div id="content-outer">

		<div id="content">

			<div id="page-heading">
				<h1>Edit product</h1>
				<?php if(isset($errors)) {
					echo '<h1>'.$errors.'</h1>';
				} elseif(isset($_SESSION['info'])) {
					echo '<h1>'.$_SESSION['info'].'</h1>';
					unset($_SESSION['info']);
				}?>
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
						<!--  start content-table-inner -->
						<div id="content-table-inner">

							<table border="0" width="100%" cellpadding="0" cellspacing="0">
								<tbody><tr valign="top">
									<td>

										<!--  start step-holder -->
										<div id="step-holder">

											<div class="step-dark-left"><a href="">Add product details</a></div>

											<div class="clear"></div>
										</div>

										<table border="0" cellpadding="0" cellspacing="0" id="id-form">
											<tbody>
											<tr>
												<th valign="top">Name:</th>
												<td><input class="inp-form" type="text" form="goods-edit-input" name="name" value="<?php echo hc($row['name'])?>"></td>
												<td></td>
											</tr>

											<tr>
												<th valign="top">Article:</th>
												<td>
													<input class="inp-form" form="goods-edit-input" type="number" name="article" value="<?php echo hc($row['article'])?>">
												</td>
												<td></td>
											</tr>

											<tr>
												<th valign="top">Availability:</th>
												<td>
													<label>
														<select class="inp-form-select" form="goods-edit-input" type="text" name="availability">
														<option>Товар в наличии</option>
														<option>Товара в наличии нет</option>
														</select>
													</label>
												</td>
												<td></td>
											</tr>

											<tr>
												<th valign="top">Price:</th>
												<td>
													<input class="inp-form" form="goods-edit-input" type="number" name="price" value="<?php echo hc($row['price'])?>">
												</td>
												<td></td>
											</tr>

											<tr>

												<th valign="top">Description:</th>
												<td>
													<label>
														<textarea class="form-textarea" type="text" form="goods-edit-input" name="description"><?php echo hc($row['description'])?></textarea>
													</label>
												</td>

												<td></td>
											</tr>

											<tr>
												<th class="th-select-image">Select an image:</th>
												<td class="td-select-image">
													<input type="file" form="goods-edit-image" name="file" accept="image/jpeg,image/png,image/gif,image/bmp">
													<button class="file_2" type="submit" form="goods-edit-image" name="submit">
													</button>
												</td>
												<td class="container-bubble">
													<div class="bubble-left"></div>
													<div class="bubble-inner">JPEG, GIF 5MB max per image</div>
													<div class="bubble-right"></div>
												</td>
											</tr>

											<tr>
												<th>Upload image:</th>
												<td>
													<label><input class="file file_1" type="text" form="goods-edit-input" name="image" value="<?php echo hc($row['image']) ?>"></label>
												</td>

											</tr>

											<tr>
												<th>&nbsp;</th>
												<td valign="top">
													<input type="submit" form="goods-edit-input" name="submit" class="form-submit">
												</td>
												<td></td>
											</tr>
											</tbody>
										</table>
									</td>
								</tr>

								<tr>
									<td><img src="/images/shared/blank.gif" width="695" height="1" alt="blank"></td>
									<td></td>
								</tr>
								</tbody>
							</table>
							<div class="clear"></div>
						</div>

					</td>
					<td id="tbl-border-right"></td>
				</tr>
				<tr>
					<th class="sized bottomleft"></th>
					<td id="tbl-border-bottom">&nbsp;</td>
					<th class="sized bottomright"></th>
				</tr>
				</tbody>
			</table>

			<div class="clear">&nbsp;</div>

		</div>

		<div class="clear">&nbsp;</div>
	</div>
</main>