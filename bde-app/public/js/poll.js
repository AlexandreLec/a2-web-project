var addPoll = function() {
	element = this;
	$.get("/idea/poll/add/"+this.id).done([
    	function () { 
    		$.get("/idea/poll/"+element.id, function(data){
    			if(data){
    				element.childNodes[0].innerHTML = data;
    			}

    		});
    	}
    ]);
}

var pollButtons = document.querySelectorAll(".poll");

pollButtons.forEach(function(element) {
	element.addEventListener("click", addPoll);
});