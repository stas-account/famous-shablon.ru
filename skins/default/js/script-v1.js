
function hideShow(id) {

	let x = document.getElementById(id);

	if (x.style.display === 'none' || x.style.display === '') {
		$('#'+ id).slideDown(200);
		//x.style.display = 'block';
	} else {
		$('#'+ id).slideUp(200);
		//x.style.display = 'none';
	}
}

function lengthLoginPass() {

	let x = document.getElementById('login').value.length;

	if (x < 3) {
		alert('Поле "Login" должно содержать минимум 3 символа! Вы ввели ' + x + ' символов ');
		return false;
	}

	let y = document.getElementById('pass').value.length;

	if (y < 3) {
		alert('Поле "Pass" должно содержать минимум 3 символа! Вы ввели ' + y + ' символов ');
			return false;
		}
	}

function time() {
	time = new Date().getDate() + ':' + (new Date().getMonth() + 1)+ ':' +new Date().getFullYear();
	return time;
}



/* AJAX COMMENT */

function myAjaxComment () {

	let x = document.getElementById('default-comments-input-name').value;
	let y = document.getElementById('default-comments-input-email').value;
	let z = document.getElementById('default-comments-textarea-comment').value;


	if (x.length === 0 || y.length === 0 || z.length < 3) {
		alert('Заполните все формы')
	} else {
		$.ajax({
			//url: 'index.php',
			url: '/modules/comments/comments.php',
			type: "GET",
			cache: false,
			data: {name: x, email: y, comment: z, image: image},
			success: function (msg) {

				let response = JSON.parse(msg);
				let div = document.querySelector('.default-comments-container-div-3');
				let div2 = div.cloneNode(true);
				div2.querySelector('h3').innerHTML = response.name;
				div2.querySelector('.default-comments-container-div').innerHTML = response.comment;
				div2.querySelector('img').src = response.image;
				div2.style.display = 'none';
				div.before(div2);
				$('.default-comments-container-div-3:first-child').fadeIn(800);
				document.getElementById('default-comments-textarea-comment').value = null;

			}
		})
	}

}

let div  = document.querySelectorAll('.default-comments-container-div-3');

if (div.length !== 0) {

	function stopDefAction(event) {
		event.preventDefault();
	}

	document.getElementById('default-comments-form').addEventListener(
		'submit', stopDefAction
	);

	document.getElementById('default-comments-form').addEventListener(
		'submit', myAjaxComment
	);
}
/* end AJAX COMMENT */



/* DROP-MENU-2*/

let container = document.querySelector('.aside');
let currentElem = null;

if (container !== null) {

	container.onmouseover = function(event) {

		if (currentElem) return;
		let div = event.target.closest('.aside > div');
		if (!div) return;
		if (!container.contains(div)) return;

		currentElem = div;
		mouseOver(currentElem);

	};

	container.onmouseout = function(event) {

		if (!currentElem) return;
		let relatedTarget = event.relatedTarget;

		while (relatedTarget) {

			if (relatedTarget === currentElem) return;

			relatedTarget = relatedTarget.parentNode;
			//console.log(relatedTarget);
		}

		mouseOut(currentElem);
		currentElem = null;
	};
}

function mouseOver(div) {
	div.classList.add('container-drop-menu-2');
	$(div.lastElementChild ).fadeIn(200);
}

function mouseOut(div) {
	div.classList.remove('container-drop-menu-2');
	$(div.lastElementChild).fadeOut(100);
}

/* end drop-menu-2 */


/* IMAGE SLIDER*/

function fadeInn (img) {
	$(img).fadeIn(1200);
}
function fadeOutt(img) {
	$(img).fadeOut(1000);
}
function slideDownn (text) {
	$(text).slideDown(1000);
}
function slideUpp (text) {
	$(text).slideUp(1000);
}

function slideFade (number) {
	let img = document.querySelector(`.container-image .image-${number}`);
	let text = document.querySelector(`.container-image .image-${number} .text-${number}`);

	setTimeout(fadeInn, 200, img, text);
	setTimeout(slideDownn, 1000, text);

	setTimeout(fadeOutt, 7500, img, text);
	setTimeout(slideUpp, 7000, text);
}

//let delay = 100;
let number = 1;

let timerId = setTimeout(function tick() {
	slideFade(number);

	if (number >= 3) {
		number = 0;
	}

	number++;
	timerId = setTimeout(tick, 7000);
}, 0, number);

/* end image slider */



/* IMAGE CAROUSEL */

let containerUL = document.querySelector('.container-2 .container-ul');
let containerCarousel = document.querySelector('.container-2 .container-carousel');

let distance0,
	distance1,
	distance2,
	distance3;
let distanceArr = [distance0 = 0, distance1 = 0, distance2 = 0, distance3 = 0];

if (containerUL !== null) {

	containerUL.onmousedown = function (event) {

		let a = event.target.closest('ul li a');
		let li = event.target.closest('ul li');
		let ul = event.target.closest('ul');

		if (!a) return;
		if (!containerUL.contains(a)) return;

		for (let node of containerCarousel.children) {
			node.classList.remove('active');
			if (node.className === 'carousel') {
				node.style.display = 'none';
				node.style.transition = '';
			}
		}
		for (let node of ul.children) {
			node.classList.remove('active');
		}

		let i;

		if (event.target === a) {

			switch (event.target.innerHTML) {
				case 'Computer':
					i = 3;
					break;
				case 'Smartphone':
					i = 4;
					break;
				case 'Watches':
					i = 5;
					break;
				case 'Photo and Camera':
					i = 6;
					break;
			}
			li.classList.add('active');

			let carouselChild = document.querySelector(`.container-2 .carousel:nth-child(${i})`);
			carouselChild.classList.add('active');
			$(carouselChild).fadeIn(500);
		}
	};
}


if (containerCarousel !== null) {

	containerCarousel.onmousedown = function (event) {

		let carouselEvent = event.target.closest('.carousel');
		if (!carouselEvent) return;
		if (!containerCarousel.contains(carouselEvent)) return;

		let i = -2;
		for (let node of containerCarousel.children) {

			if(node === carouselEvent) break;
			i++;
		}

		let mouseDown = event.clientX;
		let mouseMove;
		let x = 0;
		let width = -(carouselEvent.firstElementChild.offsetWidth);
		let validWidth = -(carouselEvent.firstElementChild.offsetWidth * (carouselEvent.childElementCount - 4));

		carouselEvent.style.transition = ``;

		function onMouseMove (event) {

			mouseMove = event.clientX;

			if (x > 0 || x < validWidth) {
				x = distanceArr[i] + (mouseMove - mouseDown)/2;
			} else {
				x = distanceArr[i] + (mouseMove - mouseDown)/2;
			}

			carouselEvent.style.transform = `translate(${x}px, 0px)`;
		}

		document.addEventListener ('mousemove', onMouseMove);

		document.onmouseup = function(event) {

			if (x > 0) {

				distanceArr[i] = 0;

			} else if (x < validWidth){

				distanceArr[i] = validWidth;

			} else {

				distanceArr[i] += (event.clientX - mouseDown)/2;
				let division = distanceArr[i] / width;
				division = Math.ceil(division);
				distanceArr[i] = width * division;
			}
			carouselEvent.style.transform = `translate(${distanceArr[i]}px, 0px)`;
			carouselEvent.style.transition = `all 500ms ease 0s`;

			document.removeEventListener('mousemove', onMouseMove);
			document.onmouseup = null;
		};

	};
	containerCarousel.ondragstart = function() {
		return false;
	};
}


let iLeft = document.querySelector('.container-2 .container-carousel i:nth-child(1)');
let iRight = document.querySelector('.container-2 .container-carousel i:nth-child(2)');

if (containerCarousel !== null) {
	containerCarousel.onclick = function (event) {

		let arrow = event.target.closest('i');

		if (!arrow) return;
		if (!containerCarousel.contains(arrow)) return;

		let width;
		let validWidth;
		let carousel;
		let i = -2;
		for (let node of containerCarousel.children) {

			if(node.className === 'carousel active') {

				width = -(node.firstElementChild.offsetWidth);
				validWidth = -(node.firstElementChild.offsetWidth * (node.childElementCount - 4));
				carousel = node;
				break;
			}
			i++
		}

		for (let node of containerCarousel.children) {

			if (node === arrow) {

				if (arrow === iLeft) {

					if (distanceArr[i] >= 0) {
						distanceArr[i] = 0;
					} else if (distanceArr[i] < validWidth) {
						distanceArr[i] = 0;
					} else {
						distanceArr[i] -=  width;
					}

				} else if (arrow === iRight) {

					if (distanceArr[i] > 0) {
						distanceArr[i] = 0;
					} else if (distanceArr[i] <= validWidth) {
						distanceArr[i] = 0;
						carousel.style.transform = `translate(${distanceArr[i]}px, 0px)`;
						carousel.style.transition = `all 1000ms ease 0s`;
						break;
					} else {
						distanceArr[i] +=  width;
					}
				}
				carousel.style.transform = `translate(${distanceArr[i]}px, 0px)`;
				carousel.style.transition = `all 500ms ease 0s`;
				break;
			}
		}
	};
}

/* end IMAGE CAROUSEL */


if (dropAuthorization !== null) {
	setTimeout( function () {
		let event = new Event("click");
		dropAuthorization.dispatchEvent(event);
	} );
}


/* NAVIGATION LIGHT LINK */

let navContainer;

navContainer = document.querySelector('nav .navigation');

function activeLinkNav() {
	let href = document.location.pathname;
	let link = document.querySelector(`nav .navigation a[href$="${href}"`);

	if (!link) return;
	link.closest('a').classList.add('navigation-active');
}

if (navContainer !== null) {
	activeLinkNav();
}

/* NAVIGATION LIGHT LINK */

window.onload = function () { };

window.onunload = function () { };

window.onfocus = function () { };

window.onblur = function () { };


/*

let delayText = 1000;
let numberText = 1;

let timerIdText = setTimeout(function tick() {
	slideText(numberText);
	timerIdText = setTimeout(tick, 6000);
}, delayText, numberText);

*/

















