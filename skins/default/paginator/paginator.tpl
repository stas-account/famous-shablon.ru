<?php

if (isset ($_GET['key1'])) {

	if($numrows <= 5) {

		if($_GET['key1'] != 1) {
			?> <a href="/<?php echo $_GET['route']; ?>/<?php echo $_GET['key1']-1 ?>">Назад</a> <?php
		}
		for($number = 1; $number <= $numrows; $number++) {

			?> <a style="<?php if($number == $_GET['key1']) {echo 'color:red;';};?>" href="/<?php echo $_GET['route']; ?>/<?php echo $number ?>"><?php echo $number ?></a> <?php
			continue;

		}
		if($_GET['key1'] != $numrows) {
			?> <a href="/<?php echo $_GET['route']; ?>/<?php echo $_GET['key1']+1 ?>">Вперёд</a> <?php
		}
	}

	if($numrows > 5) {

		if($_GET['key1'] != 1) {
			?> <a href="/<?php echo $_GET['route']; ?>/<?php echo $_GET['key1']-1 ?>">Назад</a> <?php
		}
		?> <a style="<?php if($_GET['key1'] == 1) {echo 'color:red;';};?>" href="/<?php echo $_GET['route']; ?>/1">1</a> <?php

		if($_GET['key1'] - 2 > 1 && $_GET['key1'] + 2 < $numrows) { ?>
			<a href="#">...</a>
			<a href="/<?php echo $_GET['route']; ?>/<?php echo $_GET['key1'] - 1 ?>"><?php echo $_GET['key1'] - 1 ?></a>
			<a style="color:red;" href="/<?php echo $_GET['route']; ?>/<?php echo $_GET['key1'] ?>"><?php echo $_GET['key1'] ?></a>
			<a href="/<?php echo $_GET['route']; ?>/<?php echo $_GET['key1'] + 1 ?>"><?php echo $_GET['key1'] + 1 ?></a>
			<a href="#">...</a>
		<?php } elseif($_GET['key1'] == 2 || $_GET['key1'] == 1) { ?>

			<a style="<?php if($_GET['key1'] == 2) {echo 'color:red;';};?>" href="/<?php echo $_GET['route']; ?>/2">2</a>
			<a style="<?php if($_GET['key1'] == 3) {echo 'color:red;';};?>" href="/<?php echo $_GET['route']; ?>/3">3</a>
			<a href="#">...</a>

		<?php } elseif($_GET['key1'] == 3) { ?>

			<a href="/<?php echo $_GET['route']; ?>/<?php echo $_GET['key1'] - 1 ?>"><?php echo $_GET['key1'] - 1 ?></a>
			<a style="color:red;" href="/<?php echo $_GET['route']; ?>/<?php echo $_GET['key1'] ?>"><?php echo $_GET['key1'] ?></a>
			<a href="/<?php echo $_GET['route']; ?>/<?php echo $_GET['key1'] + 1 ?>"><?php echo $_GET['key1'] + 1 ?></a>
			<a href="#">...</a>

		<?php } elseif($_GET['key1'] + 1 == $numrows || $_GET['key1'] == $numrows) { ?>

			<a href="#">...</a>
			<a style="<?php if($_GET['key1'] == $numrows - 2) {echo 'color:red;';};?>" href="/<?php echo $_GET['route']; ?>/<?php echo $numrows - 2 ?>"><?php echo $numrows - 2 ?></a>
			<a style="<?php if($_GET['key1'] == $numrows - 1) {echo 'color:red;';};?>" href="/<?php echo $_GET['route']; ?>/<?php echo $numrows - 1 ?>"><?php echo $numrows - 1 ?></a>

		<?php } elseif($_GET['key1'] + 2 == $numrows) { ?>

			<a href="#">...</a>
			<a href="/<?php echo $_GET['route']; ?>/<?php echo $_GET['key1'] - 1 ?>"><?php echo $_GET['key1'] - 1 ?></a>
			<a style="color:red" href="/<?php echo $_GET['route']; ?>/<?php echo $_GET['key1'] ?>"><?php echo $_GET['key1'] ?></a>
			<a href="/<?php echo $_GET['route']; ?>/<?php echo $_GET['key1'] + 1 ?>"><?php echo $_GET['key1'] + 1 ?></a>

		<?php } ?>

		<a style="<?php if($_GET['key1'] == $numrows) {echo 'color:red;';};?>" href="/<?php echo $_GET['route']; ?>/<?php echo $numrows; ?>"><?php echo $numrows; ?></a>

		<?php if($_GET['key1'] != $numrows) { ?>

			<a href="/<?php echo $_GET['route']; ?>/<?php echo $_GET['key1']+1 ?>">Вперёд</a> <?php
		}
	}
}





























/*
if (!isset ($_GET['key1'])) {

	if($numrows <= 5) {

		for($number = 1; $number <= $numrows; $number++) { ?>
			<a href="/goods/home/<?php echo $number; ?>"><?php echo $number; ?></a>
		<?php } ?>
			<a href="/goods/home/<?php echo $_GET['key1']+1 ?>">Вперёд</a>
		<?php

	} elseif($numrows > 5) {

		for($number = 1; ; $number++) {
			if($number == 4) { ?>
				<a href="#">...</a>
			<?php continue; } elseif($number == 5) { ?>
				<a href="/goods/home/<?php echo $numrows; ?>"><?php echo $numrows; ?></a>
				<a href="/goods/home/<?php echo $_GET['key1']+1 ?>">Вперёд</a>
			<?php break; } ?>
			<a href="/goods/home/<?php echo $number; ?>"><?php echo $number; ?></a>
		<?php }

	}
}

if (isset ($_GET['key1'])) {

		for($number = $_GET['key1']; $number <= $numrows; $number++) { ?>

			<a href="/goods/home/<?php echo $number; ?>"><?php echo $number; ?></a>

			<?php if($numrows <= 5) { ?>
				<a href="/goods/home/<?php echo $_GET['key1'] + 1 ?>">Вперёд</a>
				<?php

			}
			elseif($_GET['key1'] == $numrows) { ?>
				<a href="/goods/home/<?php echo $_GET['key1'] - 1 ?>">Назад</a>
				<?php for($number = 1; $number <= $numrows; $number++) { ?>
					<a href="/goods/home/<?php echo $number; ?>"><?php echo $number; ?></a>

				<?php }
			}
			else { ?>
				<a href="/goods/home/<?php echo $_GET['key1'] - 1 ?>">Назад</a>
				<?php for($number = 1; $number <= $numrows; $number++) { ?>
					<a href="/goods/home/<?php echo $number; ?>"><?php echo $number; ?></a>

				<?php } ?>
			<a href="/goods/home/<?php echo $_GET['key1'] + 1 ?>">Вперёд</a><?php
			}
			if($numrows > 5) { ?>

				<a href="/goods/home/1">1</a>


				<?php for($_GET['key1']; ;)
					if($_GET['key1'] - 2 > 1 && $_GET['key1'] + 2 < $numrows) { ?>
						<a href="#">...</a>
						<a href="/goods/home/<?php echo $_GET['key1'] - 1 ?>"><?php echo $_GET['key1'] - 1 ?></a>
						<a href="/goods/home/<?php echo $_GET['key1'] ?>"><?php echo $_GET['key1'] ?></a>
						<a href="/goods/home/<?php echo $_GET['key1'] + 1 ?>"><?php echo $_GET['key1'] + 1 ?></a>
						<a href="#">...</a>
					<?php } elseif($_GET['key1'] - 1 == 2) { ?>

						<a href="/goods/home/<?php echo $_GET['key1'] ?>"><?php echo $_GET['key1'] - 1 ?></a>
						<a href="/goods/home/<?php echo $_GET['key1'] + 1 ?>"><?php echo $_GET['key1'] + 1 ?></a>
						<a href="#">...</a>

					<?php } elseif($_GET['key1'] - 1 == 3) { ?>


					<?php } elseif($_GET['key1'] + 1 == $numrows) { ?>


					<?php } elseif($_GET['key1'] + 2 == $numrows) { ?>


					<?php }

				?>

				<a href="/goods/home/<?php echo $numrows ?>"><?php echo $numrows ?></a>

				<?php

			}
		}
}
*/


