<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title><?php echo hc(Core::$META['title']); ?></title>
	<meta name="description" content="<?php echo hc(Core::$META['description']); ?>">
	<meta name="keywords" content="<?php echo hc(Core::$META['keywords']); ?>">
	<link href="/skins/default/css/normalize.css" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" integrity="sha384-KA6wR/X5RY4zFAHpv/CnoG2UW1uogYfdnP67Uv7eULvTveboZJg0qUpmJZb5VqzN" crossorigin="anonymous">
	<link href="/skins/default/css/style.css" rel="stylesheet">
	<?php if(count(Core::$CSS)) {echo implode("\n", Core::$CSS);} ?>
	<?php if(count(Core::$JS)) {echo implode("\n", Core::$JS);} ?>
</head>

<body>

<header>
	<div class="header clearfix">
		<div class="left">
			<ul>
				<li>Default welcome msg!</li>
				<li><a href="#">French</a></li>
				<li><a href="#">USD</a></li>
			</ul>
		</div>
		<div class="right">
			<ul>
				<li><a href="#">Help Center</a></li>
				<li><a href="#">Store Locator</a></li>
				<li><a href="#">Checkout</a></li>
				<li>
					<a href="#" id="drop-authorization" onclick="hideShow('default-registration-auth'); return false;">My Account<i class="fa fa-angle-down"></i></a>

				</li>
				<?php include_once './skins/default/registration/auth.tpl'?>
			</ul>
		</div>
	</div>
</header>

<div class="container-search">
	<a href="/"><img src="/img/logotype.jpg" alt="image"></a>
	<div class="search">
		<form>
			<div class="input-group">
				<select class="border-none" name="category_id">
					<option>All Categories</option>
					<option>women</option>
					<option>&nbsp;&nbsp;&nbsp;Chair </option>
					<option>&nbsp;&nbsp;&nbsp;Decoration</option>
					<option>&nbsp;&nbsp;&nbsp;Lamp</option>
					<option>&nbsp;&nbsp;&nbsp;Handbags </option>
					<option>&nbsp;&nbsp;&nbsp;Sofas </option>
					<option>&nbsp;&nbsp;&nbsp;Essential </option>
					<option>Men</option>
					<option>Electronics</option>
					<option>&nbsp;&nbsp;&nbsp;Mobiles </option>
					<option>&nbsp;&nbsp;&nbsp;Music &amp; Audio </option>
				</select>
				<input type="text" class="" placeholder="Enter your search..." name="search">
				<button type="button" class="" ><i class="fa fa-search"></i></button>
			</div>
		</form>
	</div>
	<div class="cart">
		<i class="far fa-heart"></i>
		<span class="heart">Wishlist</span>
		<i class="fas fa-shopping-cart"></i>
		<span class="basket">My Cart</span>
	</div>

</div>

<nav>
	<div class="navigation">
		<div class="brown">
			<span>All Categories<i class="fas fa-align-right"></i></span>
		</div>
		<a href="/goods/home">Goods</a>
		<a href="/books/home">Books</a>
		<a href="/users/home">Edit profile</a>
		<!-- <a href="/admin">Admin</a> -->
		<a href="/comments/comments">Comments</a>

		<!--
		<div class="container-drop-menu">
			<a href="#" class="about-us">Домашняя Работа</a>
			<div class="drop-menu">
				<a href="/battleofalcoholics/battleofalcoholics">Битва алкоголиков</a>
				<a href="/filemanager/filemanager">Файловый менеджер</a>

			</div>
		</div>
		-->

	</div>
</nav>

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
<script src="/skins/default/js/script-v1.js"></script>
</body>
</html>
