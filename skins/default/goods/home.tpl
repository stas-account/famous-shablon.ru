<main class="clearfix">

	<?php if(isset($_SESSION['info'])) {
			echo '<h1>'.$_SESSION['info'].'</h1>';
			unset($_SESSION['info']);
	}
	?>
		<div class="default-paginator-2"><?php include './skins/default/paginator/paginator2.tpl' ?></div>

		<div class="clearfix default-goods-home-container_ul">

			<form action="" method="get">

				<ul>

					<li><h2>All goods</h2></li><br>
					<?php while($row=$ul1->fetch_assoc()) { ?>
					<li><input <?php if(isset($_SESSION['checkbox-category']) && in_array($row['id'], $_SESSION['checkbox-category'])) { echo 'checked'; }?> type="checkbox" name="checkbox-category[]" value="<?php echo $row['id']; ?>"><?php echo $row['category']; ?></li>
					<?php } ?>

				</ul><br><br>

				<ul>

					<li><h2>All brands</h2></li><br>
					<?php while($row=$ul2->fetch_assoc()) { ?>
						<li><input <?php if(isset($_SESSION['checkbox-brand']) && in_array($row['id'], $_SESSION['checkbox-brand'])) { echo 'checked'; }?> type="checkbox" name="checkbox-brand[]" value="<?php echo $row['id']; ?>"><?php echo $row['brand']; ?></li>
					<?php } ?>

				</ul><br><br>
				<input type="submit" name="submit-ul" value="Выбрать">

			</form>

		</div>

		<?php while($row=$res->fetch_assoc()) { ?>

			<div class="default-goods-home-container_goods">

					<img src="<?php if ($row['image'] == '') { echo '/uploaded/20191010-175953img50686.jpg'; } else { echo $row['image']; } ?>" alt="">
					<div>
						<p ><span style="border-bottom:1px solid black;">Name: <?php echo @htmlspecialchars($row['name'])?></span></p>
						<p>Article: <?php echo @htmlspecialchars($row['article'])?></p>
						<p>Availability: <?php echo @htmlspecialchars($row['availability'])?></p>
						<p>Price: <?php echo @htmlspecialchars($row['price'])?></p>
					</div>

			</div>

		<?php } ?>

</main>