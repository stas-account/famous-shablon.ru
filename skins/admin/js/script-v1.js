let nav = document.querySelector('.nav-outer-repeat .table');

nav.onclick = function (event) {

	let ul = event.target.closest('ul');

	if (!ul) return;
	if (!nav.contains(ul)) return;

	ul.classList.add('current');
};

function activeLink() {
	let href = document.location.pathname;
	let link = document.querySelector(`.nav-outer-repeat .table a[href="${href}"`);

	if (!link) return;
	link.closest('ul').classList.add('current');
}


window.onload = function () {
	activeLink();
};

window.onunload = function () { };

window.onfocus = function () { };

window.onblur = function () { };