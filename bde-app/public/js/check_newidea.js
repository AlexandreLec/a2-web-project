var nameChecked = placeChecked = priceChecked = false;

function checkname() {
    var elmt = document.getElementById('name');
    var filter = /^[a-zA-z0-9áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ\s\.\,\!\?\-]{3,35}$/;
    
    if(filter.test(elmt.value)){
        
        elmt.style.border = "solid 2px green";
        nameChecked = true;
    }
    else {
        elmt.style.border = "solid 2px red";
    }
}

function checkplace() {
    var elmt = document.getElementById('place');
    var filter = /^[\w\dáàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ.,-\s]{3,25}$/;
    
    if (filter.test(elmt.value)){
        
        elmt.style.border = "solid 2px green";
        placeChecked = true;
    }
    else {
        elmt.style.border = "solid 2px red";
    }
}

function checklink() {
    var elmt = document.getElementById('link');
    var filter = /^(https?:\/\/)?([\da-zA-Z\.-]+)\.([a-zA-Z\.]{2,6})([\/\w \.-]*)*\/?$/;
    
    if (elmt.value==''){
        elmt.style.border = "solid 1px gray";
        linkChecked = true;
    }
    else if (filter.test(elmt.value)){
        
        elmt.style.border = "solid 2px green";
        linkChecked = true;
    }
    

    else {
        elmt.style.border = "solid 2px red";
        linkChecked = false;
    }
}

function checkprice() {
    var elmt = document.getElementById('price');
    var chbx = document.getElementById('free');
    var label = document.getElementById('freelabel');
    var lbl = document.getElementById('pricelabel');
    var filtre = /^[^0]([0-9]{0,2})$/;
    
    if (filtre.test(elmt.value) && chbx.checked == false){
        
        elmt.style.border = "solid 2px green";
        label.style.color = "gray";
        chbx.disabled=true;
        priceChecked = true;
    }
    else if (chbx.checked == true){
        elmt.style.border = "solid 1px gray";
        elmt.value = '';
        elmt.disabled=true;
        lbl.style.color = "gray";
        
        priceChecked = true;
    }
    else {
        elmt.style.border = "solid 2px red";
        priceChecked = false;
        elmt.disabled=false;
        chbx.disabled=false;
        lbl.style.color = "black";
        label.style.color = "black";
    }
}

function globalCheck() {
    checkname();
    checkplace();
    checkprice();
    checklink();
}
    
//Check for changes in the fields
//When key released in field or checkbox looses focus
var Name = document.getElementById('name');
Name.addEventListener('keyup', checkname);

var Place = document.getElementById('place');
Place.addEventListener('keyup', checkplace);

var Link = document.getElementById('link');
Link.addEventListener('keyup', checklink);

var Price = document.getElementById('price');
var Free = document.getElementById('free');
Price.addEventListener('keyup', checkprice);
Price.addEventListener('blur', checkprice);
Price.addEventListener('click', checkprice);
Free.addEventListener('blur', checkprice);
Free.addEventListener('click', checkprice);


//blocks the submission when form not correctly completed
document.getElementById('submit').addEventListener('click', function (e) {
        globalCheck();
        
        if (nameChecked == false || placeChecked == false || priceChecked == false || linkChecked == false) {
            e.preventDefault();
        }
    }
);