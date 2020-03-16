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

					<li><h2>All authors</h2></li><br>
					<?php while($row=$ul1->fetch_assoc()) { ?>
					<li><input <?php if(isset($_SESSION['checkbox-author']) && in_array($row['id'], $_SESSION['checkbox-author'])) { echo 'checked'; }?> type="checkbox" name="checkbox-author[]" value="<?php echo $row['id']; ?>"><?php echo $row['author']; ?></li>
					<?php } ?>

				</ul><br><br>

				<ul>

					<li><h2>All genre</h2></li><br>
					<?php while($row=$ul2->fetch_assoc()) { ?>
						<li><input <?php if(isset($_SESSION['checkbox-genre']) && in_array($row['id'], $_SESSION['checkbox-genre'])) { echo 'checked'; }?> type="checkbox" name="checkbox-genre[]" value="<?php echo $row['id']; ?>"><?php echo $row['genre']; ?></li>
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