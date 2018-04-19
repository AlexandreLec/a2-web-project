$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
});

var load = function() {
	buttonSubscribe = $('.subscribe');
	buttonSubscribe.each(function (i, val){
		getSubscribes(val);
	});
}

var addSub = function(){
	$.get("/event/subscribe/"+this.id, function(data){
		load();
	});
}

var removeSub = function(){
	$.get("/event/unscribe/"+this.id, function(data){
		load();
	});
}

var getSubscribes = function(elt) {
	$.get("/api/event/users/"+elt.id, function(data){
		idUser = document.getElementById("id-user");

		let check = false;

		data.forEach(element => {
			if(element.id == idUser.innerHTML){
				check = true;
			}
		});
		
		if(check){
			$('.button #'+elt.id).removeClass("button-red").addClass("button-sub").text('Se désinscrire');
		}
		else {
			$('.button #'+elt.id).removeClass("button-sub").addClass("button-red").text("S'inscrire");
		}

		$('.button-red').click(addSub);

		$('.button-sub').click(removeSub);
	});
}


load();


