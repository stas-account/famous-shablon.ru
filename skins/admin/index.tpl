<!DOCTYPE html>
<html lang="ru">
<head><meta charset="UTF-8">
	<title><?php echo hc(Core::$META['title']); ?></title>
	<meta name="description" content="<?php echo hc(Core::$META['description']); ?>">
	<meta name="keywords" content="<?php echo hc(Core::$META['keywords']); ?>">
	<link href="/skins/admin/css/normalize.css" rel="stylesheet">
	<link href="/skins/admin/css/screen.css" rel="stylesheet">
	<link href="/skins/admin/css/style.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<?php if(count(Core::$CSS)) {echo implode("\n", Core::$CSS);} ?>
	<?php if(count(Core::$JS)) {echo implode("\n", Core::$JS);} ?>
</head>

<body>

<div id="page-top-outer">
	<div id="page-top">
		<div id="logo">
			<a href="/admin">
				<img src="/images/shared/logo.png" alt="">
			</a>
		</div>

		<div id="top-search">
			<table border="0" cellpadding="0" cellspacing="0">
				<tbody>
				<tr>
					<td><label><input type="text" value="Search" class="top-search-inp"></label></td>
					<td>
						<label>
						<select class="styledselect">
							<option value="">All</option>
							<option value="">Goods</option>
							<option value="">Books</option>
							<option value="">Users</option>
							<option value="">Link#</option>
						</select>
						</label>
					</td>
					<td>
						<label><input type="image" src="/images/shared/top_search_btn.gif" alt=""></label>
					</td>
				</tr>
				</tbody>
			</table>
		</div>
		<div class="clear"></div>

	</div>
</div>

<div class="clear">&nbsp;</div>

<div class="nav-outer-repeat">
	<div class="nav-outer">

		<div id="nav-right">
			<div class="nav-divider">&nbsp;</div>
			<div class="showhide-account">
				<img src="/images/shared/nav/nav_myaccount.gif" width="93" height="14" alt="">
			</div>
			<div class="nav-divider">&nbsp;</div>
			<a href="/registration/exit" id="logout">
				<img src="/images/shared/nav/nav_logout.gif" width="64" height="14" alt="">
			</a>
			<div class="clear">&nbsp;</div>
		</div>

		<div class="nav">

			<div class="table">

				<ul class="select">
					<li>
						<a href="/admin"><b>Goods</b></a>
					</li>
				</ul>

				<div class="nav-divider">&nbsp;</div>
				<ul class="select">
					<li>
						<a href="/admin/books/home"><b>Books</b></a>
					</li>
				</ul>

				<div class="nav-divider">&nbsp;</div>
				<ul class="select">
					<li>
						<a href="/admin/users/home"><b>Users</b></a>
					</li>
				</ul>

				<div class="nav-divider">&nbsp;</div>
				<ul class="select">
					<li>
						<a href="#nogo"><b>Link#</b></a>

					</li>
				</ul>

				<div class="nav-divider">&nbsp;</div>
				<ul class="select">
					<li>
						<a href="/"><b>На главную</b></a>
					</li>
				</ul>

			</div>
		</div>
		<div class="container-select"></div>
	</div>
</div>

<div class="clear"></div>

<?php echo $content; ?>

<div style="height:60px"></div>

<footer>
	<div class="container-footer">
		<div class="footer-col-1">
			<img src="/img/footer-logo.png" alt="">
			<p>
				Lorem Ipsum is simply dummy text of the print and typesetting industry. Ut pharetra augue nec augue. Nam elit agna, endrerit sit amet.
			</p>
			<div>
				<img src="/img/image-26.jpg" alt="">
				<img src="/img/image-27.jpg" alt="">
				<img src="/img/image-28.jpg" alt="">
				<img src="/img/image-29.jpg" alt="">
				<img src="/img/image-30.jpg" alt="">
			</div>
		</div>
		<div class="footer-col-2">
			<h4>
				INFORMATION
			</h4>
			<ul>
				<li><a href="#">Delivery Information</a></li>
				<li><a href="#">Discount</a></li>
				<li><a href="#">Site map</a></li>
				<li><a href="#">Privacy Policy</a></li>
				<li><a href="#">FAQs</a></li>
				<li><a href="#">Terms & Condition</a></li>
			</ul>
		</div>
		<div class="footer-col-3">
			<h4>
				INSIDER
			</h4>
			<ul>
				<li><a href="#">Sites Map</a></li>
				<li><a href="#">News</a></li>
				<li><a href="#">Trends</a></li>
				<li><a href="#">About us</a></li>
				<li><a href="#">Contact Us</a></li>
				<li><a href="#">My Orders</a></li>
			</ul>
		</div>
		<div class="footer-col-4">
			<h4>
				SERVICE
			</h4>
			<ul>
				<li><a href="#">Account</a></li>
				<li><a href="#">Wish list</a></li>
				<li><a href="#">Shopping Cart</a></li>
				<li><a href="#">Return Policy</a></li>
				<li><a href="#">Special</a></li>
				<li><a href="#">Look book</a></li>
			</ul>
		</div>
		<div class="footer-col-5">
			<h4>
				WORKING HOURS
			</h4>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.
				Monday-Friday: 8.30 a.m. - 5.30 p.m.
				Saturday: 9.00 a.m. - 2.00 p.m.
				Sunday: Closed
			</p>
			<img src="/img/visa.png" alt="">
			<img src="/img/paypal.png" alt="">
			<img src="/img/discover.png" alt="">
			<img src="/img/master-card.png" alt="">
		</div>
	</div>

</footer>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="/skins/admin/js/script-v1.js"></script>
</body>
</html>
