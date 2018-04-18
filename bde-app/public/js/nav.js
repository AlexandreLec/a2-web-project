var showNav = function (){

	let menu_nav = document.querySelector('nav');
	let boutton_connexion = document.querySelector('#connexion');
	let mask = document.querySelector('#mask');

	menu_nav.style.display = 'inline';
	if(boutton_connexion !== null){
		boutton_connexion.style.visibility = 'hidden';
	}
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
var showNotif = function (){

	let signNotif = document.getElementById('sign-notif');

	if (signNotif.style.display == 'inline'){
		signNotif.style.display = 'none';
	}
	else {
		signNotif.style.display = 'inline';
	}
};


var hideNav = function (){

	let menu_nav = document.querySelector('nav');
	let boutton_connexion = document.querySelector('#connexion');
	let mask = document.querySelector('#mask');

	menu_nav.style.display = 'none';
	if(boutton_connexion !== null){
		boutton_connexion.style.visibility = 'visible';
	}
	mask.style.display = 'none';

};

let menu_nav = document.getElementById('menu');
let mask = document.querySelector('#mask');

menu_nav.addEventListener('click', showNav);
mask.addEventListener('click', hideNav);

let signBtn = document.getElementById('connexion');
if (signBtn !== null){
	signBtn.addEventListener('click', showSign);
}


if(document.querySelector(".carousel") !== null){
	var flkty = new Flickity('.carousel');
}

let signbtn = document.getElementById('notif');
if (signbtn !== null){
	signbtn.addEventListener('click', showNotif);

}
