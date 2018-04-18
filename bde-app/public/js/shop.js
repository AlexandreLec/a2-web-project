$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
});

var goodies = [];

var basket = [];

var newBasket = [];

var results = goodies;

var getGoodieById = function(id){

    return goodies.find(function(element){
        return element.id == id;
    });
};

var addToBasket = function (a,elementAdd=null) {

    if(elementAdd == null){
        id = this.id;
    }else {
        id = elementAdd.id;
        console.log(elementAdd.quantity)
    }

    console.log(id);

    element = getGoodieById(id);
    if(element.hasOwnProperty('quantity')){
        element.quantity++;
    }
    else {
        if(elementAdd != null){
            value = elementAdd.quantity;
        }
        else {
            value = 1;
        }
        Object.defineProperty(element, 'quantity', {
            value: value,
            writable: true,
            enumerable: true
        });
    }
    check = basket.find(function(element){
        return element.id == id;
    });
    if(check === undefined){
        basket.push(element);
    }
    buildView(goodies);
}

var removeToBasket = function () {

    id=this.id;

    element = basket.find(function(element){
        return element.id == id;
    });

    index = basket.indexOf(element);
    
    element.quantity = 0;
    basket.splice(index, 1);


    showBasket(basket);
}

var showBasket = function (){

    $('.command-list #list').empty();

    totalPrice = document.getElementById("total");
    totalPrice.innerHTML = "0";

    basket.forEach(function (element){
        title = document.createElement("span");
        quantity = document.createElement("span");
        price = document.createElement("span");
        actions = document.createElement("span");
        del = document.createElement("i");
        container  = document.createElement("li");

        actions.appendChild(del);

        del.className = "far fa-trash-alt";
        title.innerHTML = element.name;
        price.innerHTML = element.price*element.quantity;
        totalPrice.innerHTML = parseFloat(totalPrice.innerHTML)+parseFloat(element.price*element.quantity);
        quantity.innerHTML = element.quantity;

        actions.className = "others";
        title.className = "title";
        price.className = "others";
        quantity.className = "others";

        container.appendChild(title);
        container.appendChild(quantity);
        container.appendChild(price);
        container.appendChild(actions);

        actions.setAttribute("id", element.id);
        actions.addEventListener('click', removeToBasket);

        $('.command-list #list').append(container);
    });
}

var buildView = function (datas){
	const reducer = (accumulator, currentValue) => accumulator + currentValue.units_sold;
    var totalSold = datas.reduce(reducer,0);

    $('.goodies-container').empty();

    datas.forEach(function (goodie){
    	container = document.createElement("div");
    	footer = document.createElement("div");
    	rate = document.createElement("span");
    	price = document.createElement("span");
    	title = document.createElement("h3");
    	img = document.createElement("img");
    	desc = document.createElement("p");
        addButton = document.createElement("span");
    	add = document.createElement("i");

    	container.className = "card-goodie";
    	footer.className = "goodie-foot";
    	rate.className = "rate";
    	add.className = "fas fa-cart-plus fa-2x buy";
        addButton.setAttribute('id', goodie.id);
        

    	footer.appendChild(rate);
    	footer.appendChild(price);
    	

        isInBasket=basket.filter(element => element.id == goodie.id);   
        
        if(isInBasket.length === 0){
            addButton.appendChild(add);
        }
        else {
            addButton.innerHTML = goodie.quantity+" ";
            plus = document.createElement("i");
            plus.className = "fas fa-plus";
            addButton.appendChild(plus);
        }

        addButton.addEventListener("click", addToBasket);

    	if(!goodie.hasOwnProperty('popularity')){
    		popularity = Math.round((goodie.units_sold/totalSold)*10);
    		Object.defineProperty(goodie, 'popularity', {
		  		value: popularity
			});
			
    	}

    	for (var i=0; i <= goodie.popularity; i++){
	    	star = document.createElement("i");
	    	star.className="fas fa-star";

	    	rate.appendChild(star);
    	}

    	footer.appendChild(addButton);
    	title.innerHTML = goodie.name;
    	price.innerHTML = goodie.price+' €';
    	img.setAttribute("src", goodie.url_img);
    	desc.innerHTML = goodie.description;

    	container.appendChild(title);
    	container.appendChild(img);
    	container.appendChild(desc);
    	container.appendChild(footer);

    	$('.goodies-container').append(container);
    });
}

var getDataGoodies = function () {
    
    $.get("/api/shop/goodies", function(data, statut){
    		goodies = data;
    		buildView(data); 
    });
};

var getBasket = function () {
    
    $.get("/shop/basket", function(data, statut){
            data.forEach(element => {
                addToBasket(this, element);
            });
    });
};


var sortByCategory = function (){

	if(this.id == 'all'){
		buildView(goodies);
	}
	else {
		results = goodies.filter(goodie => goodie.id_category == this.id);
		buildView(results);
	}
}

var sort = function() {
	switch(this.value){
		case 'ASC':
			result = results.sort(function (a, b) {
  				return a.price - b.price;
			});
			buildView(result);
			break;
		case 'DESC':
			result = results.sort(function (a, b) {
  				return b.price - a.price;
			});
			buildView(result);
			break;
		case 'POP':
			result = results.sort(function (a, b) {
  				return b.popularity - a.popularity;
			});
			buildView(result);
			break;
	}
}

function filterByName(obj) {
  
	bar = document.getElementById("search_bar");

  if (obj.name.indexOf(bar.value) === 0 || obj.name.toLowerCase().indexOf(bar.value.toLowerCase()) === 0) {
    return true;
  } else {
    return false;
  }
}

var showCommand = function (){

    let commandTab = document.getElementById('command-tab');

    if (commandTab.style.display == 'inline'){
        commandTab.style.display = 'none';
        buildView(goodies); 
    }
    else {
        commandTab.style.display = 'inline';
        showBasket();
    }
};

var sendBasket = function() {

    datas = JSON.stringify({ basket });

    $.ajax({
      url:"/shop/basket",
      type:"POST",
      data:datas,
      contentType:"application/json; charset=utf-8",
      dataType:"json",
      success: function(data){
        console.log(data);
      }
    })
}

let search_bar = document.querySelector('#search_bar');

search_bar.addEventListener('keyup', function() {
    
    let datalist=document.querySelector('#suggestion')
    while (datalist.firstChild) {
        datalist.removeChild(datalist.firstChild);
    }

    if(this.value.length != 0){
        let result = goodies.filter(filterByName);    
    
        result.forEach(element => {
            let option=document.createElement('option');
            option.value=element.name;
            document.querySelector('#suggestion').appendChild(option);
        });
    }

    $("#search_bar").bind('keyup', function () {

    	value = $('#search_bar').val();
    	let result = goodies.filter(filterByName);    

    	buildView(result);
	});
    
});


getDataGoodies();
getBasket();


$('li input[name="cat"]').click(sortByCategory);
$('li input[name="sort"]').click(sort);
$('.fa-cart-plus').click(addToBasket);

console.log(document.querySelectorAll('.fa-cart-plus'));
setInterval(sendBasket, 10000);
document.getElementById('command').addEventListener('click', showCommand);
