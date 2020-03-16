
<?php

Paginator::showPaginator();

//echo '$pagenumber = '.Paginator::$pagenumber;
//echo '$countpage = '.Paginator::getCountpage();
//print_r(Paginator::$arrayLink);
//print_r(Paginator::$arrayDelimiter);

$link = $_GET['route'].'?pagenumber=';

//echo $link;


if(Paginator::getCountpage() > 1) {

?>

	<a class="container-i down" href="/<?php echo $link.(Paginator::$pagenumber - 1); ?>"><i class="fas fa-angle-left"></i></a>
	<a class="first-link" href="/<?php echo $_GET['route']; ?>">1</a>

	<?php if(isset(Paginator::$arrayDelimiter['delimiter1'])) { ?>

		<div class="delimiter">...</div>

	<?php }

	foreach(Paginator::$arrayLink as $key => $value) {

		if($value == true) { ?>

			<a href="/<?php echo $link.$value; ?>"><?php echo $value; ?></a>

	<?php }

	}

	if(isset(Paginator::$arrayDelimiter['delimiter2'])) { ?>

		<div class="delimiter">...</div>

	<?php } ?>
	<a class="last-link" href="/<?php echo $link.Paginator::getCountpage(); ?>"><?php echo Paginator::getCountpage(); ?></a>
	<a class="container-i up" href="/<?php echo $link.(Paginator::$pagenumber + 1); ?>"><i class="fas fa-angle-right"></i></a>


<?php

}

// Передаём данные для JS


?>

<script>

	let firstLink;
	let lastLink;
	<?php

	if($_GET['pagenumber'] == 1) {
		echo 'firstLink = true';
	}  elseif($_GET['pagenumber'] == Paginator::getCountpage()) {
		echo 'lastLink = true';
	}

	?>

	/* PAGINATOR LIGHT SWITCH*/
	if ( firstLink !== undefined) {

		let activeLink = document.querySelector('.default-paginator-2 .first-link');
		activeLink.classList.add('paginator-active');

		let switchLink = document.querySelector('.default-paginator-2 .container-i.down');

		switchLink.style.color = 'gainsboro';
		switchLink.removeAttribute('href');

	} else if (lastLink !== undefined) {

		let switchLink = document.querySelector('.default-paginator-2 .container-i.up');

		switchLink.style.color = 'gainsboro';
		switchLink.removeAttribute('href');
	}
	/* PAGINATOR LIGHT SWITCH*/



	/* PAGINATOR LIGHT LINK*/

	let paginatorContainer;

	paginatorContainer = document.querySelector('.default-paginator-2');

	function activeLinkPaginator() {
		let href = document.location.search;
		let link = document.querySelector(`.default-paginator-2 a[href$="${href}"`);

		if (!link) return;
		link.closest('a').classList.add('paginator-active');
	}

	if (paginatorContainer !== null) {
		activeLinkPaginator();
	}

	/* end PAGINATOR LIGHT LINK*/

</script>



