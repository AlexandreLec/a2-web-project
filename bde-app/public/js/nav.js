var showNav = function (){

	let menu_nav = document.querySelector('nav');
	let boutton_connexion = document.querySelector('#connexion');
	let mask = document.querySelector('#mask');

	menu_nav.style.display = 'inline';
	boutton_connexion.style.visibility = 'hidden';
	menu_nav.style.zIndex = 1001;
	mask.style.display = 'inline';
};

var showSign = function (){

	let signTab = document.getElementById('sign-tab');

	if (signTab.style.display == 'inline'){
		signTab.style.display = 'none';
	}
	else {
		signTab.style.display = 'inline';
	}
};

var hideNav = function (){

	let menu_nav = document.querySelector('nav');
	let boutton_connexion = document.querySelector('#connexion');
	let mask = document.querySelector('#mask');

	menu_nav.style.display = 'none';
	boutton_connexion.style.visibility = 'visible';
	mask.style.display = 'none';

};

let menu_nav = document.getElementById('menu');
let mask = document.querySelector('#mask');

menu_nav.addEventListener('click', showNav);
mask.addEventListener('click', hideNav);

let signBtn = document.getElementById('connexion');
signBtn.addEventListener('click', showSign)