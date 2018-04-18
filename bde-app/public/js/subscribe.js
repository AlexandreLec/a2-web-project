$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
});

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
			console.log($('.button #'+elt.id));
		}
	});
}

console.log($('.button #1'));

buttonSubscribe = $('.subscribe');
buttonSubscribe.each(function (i, val){
	getSubscribes(val);
});
