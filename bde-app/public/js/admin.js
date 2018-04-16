var User = function(id,name, surname, mail, group) {
  this.id = id;
  this.name = name;
  this.surname = surname;
  this.mail = mail;
  this.group = group;
};

var Idea = function(id,name, location, desc, price, poll, user) {
  this.id = id;
  this.name = name;
  this.location = location;
  this.desc = desc;
  this.price = price;
  this.poll = poll;
  this.user = user; 
};

var users=[];
var ideas=[];


var ScrollToTop=function() {

    $("html, body").animate({ scrollTop: 0 }, 500);
}
 
var StopAnimation=function() {
  $("html, body").bind("scroll mousedown DOMMouseScroll mousewheel keyup", function(){
    $('html, body').stop();
  });
}

var getUserById = function(id){

	return users.find(function(element){
		return element.id == id;
	});
};

var getIdeaById = function(id){

    return ideas.find(function(element){
        return element.id == id;
    });
};

var showEdit = function (){

	let boardEdit = document.querySelector('.board-edit #user-form');
	let hidePanel = document.querySelector('#hide');

	boardEdit.style.visibility = 'visible';
	hidePanel.style.display = 'inline';

    ScrollToTop();
    StopAnimation();
    $('body').css('overflow-y','hidden');

	user = getUserById(this.id);
	document.getElementById("name").value=user.name;
	document.getElementById("surname").value=user.surname;
	document.getElementById("mail").value=user.mail;
	document.getElementById("user-form").action="/users/update/"+user.id;

	document.getElementById(user.group.name).setAttribute("selected", "");
};

var newEvent = function (){

    let boardEdit = document.querySelector('.board-edit #event-form');
    let hidePanel = document.querySelector('#hide');

    boardEdit.style.visibility = 'visible';
    hidePanel.style.display = 'inline';

    ScrollToTop();
    StopAnimation();
    $('body').css('overflow-y','hidden');

    idea = getIdeaById(this.id);

    if(idea !== undefined){
        document.querySelector('#event-name').value = idea.name;
        document.querySelector('#desc-event').value = idea.desc;
        document.querySelector('#event-price').value = idea.price;
        document.querySelector('#event-location').value = idea.location;
    }
    else {
        document.querySelector('#event-name').value = "";
        document.querySelector('#desc-event').value = "";
        document.querySelector('#event-price').value = "";
        document.querySelector('#event-location').value = "";
    }
    document.getElementById("event-form").action="/events/insert/";
};

var hideEdit = function (){

    let boardEditUser = document.querySelector('.board-edit #user-form');
    let boardEditEvent = document.querySelector('.board-edit #event-form');
	let hidePanel = document.querySelector('#hide');

	if(boardEditUser.style.visibility == 'visible'){
        boardEditUser.style.visibility = 'hidden';
    };
    if(boardEditEvent.style.visibility == 'visible'){
        boardEditEvent.style.visibility = 'hidden';
    };

	hidePanel.style.display = 'none';

    $('body').css('overflow-y','scroll');

};

var confirmDel = function () {
    element = this;
    user = getUserById(element.id);
    if (confirm("Vous allez supprimer l'utilisateur "+user.name+" "+user.surname+". Cette opération est irréversible, voulez-vous continuer ?")){
        console.log(element);
        $.get("/users/delete/"+element.id, function(data, status){
            getDataUsers();
        });
    };

}

var actionsButton = function (user){
	let actions = document.createElement("td");
	let edit = document.createElement("i");
    let del = document.createElement("i");
    let spanEdit = document.createElement("span");
    let spanDel = document.createElement("span");

	edit.className="fas fa-edit";
    del.className="fas fa-trash-alt";
	
    spanEdit.appendChild(edit);
    spanDel.appendChild(del);

    spanEdit.setAttribute('id', user.id);
    spanDel.setAttribute('id', user.id);
	actions.appendChild(spanEdit);
    actions.appendChild(spanDel);
    
    spanEdit.addEventListener('click', showEdit);
    spanDel.addEventListener('click', confirmDel);

	return actions;
}

var getDataUsers = function () {
    
    $.get("/api/users", function(data, status){

        if($('tbody').children().length !== 0){
            $('#users tbody').children().remove();
        }

        data.forEach(function (user){
        	let row = document.createElement("tr");
        	let firstname = document.createElement("td");
        	let surname = document.createElement("td");
        	let mail = document.createElement("td");
        	let group = document.createElement("td");

        	let actions = actionsButton(user);

        	firstname.innerHTML = user.first_name;
        	surname.innerHTML = user.surname;
        	mail.innerHTML = user.mail;
        	group.innerHTML = user.group.name;

        	users.push(new User(user.id, user.first_name, user.surname, user.mail, user.group));

        	row.appendChild(firstname);
        	row.appendChild(surname);
        	row.appendChild(mail);
        	row.appendChild(group);
        	row.appendChild(actions);

        	$('#users tbody').append(row);
        	
        });
        $('#users').DataTable();
    });
};

var actionsIdea = function (idea){
    let actions = document.createElement("td");
    let edit = document.createElement("i");
    let del = document.createElement("i");
    let spanEdit = document.createElement("span");
    let spanDel = document.createElement("span");

    edit.className="fas fa-edit";
    del.className="fas fa-trash-alt";

    spanEdit.setAttribute('id', idea.id);
    spanDel.setAttribute('id', idea.id);
    
    spanEdit.appendChild(edit);
    spanDel.appendChild(del);

    actions.appendChild(spanEdit);
    actions.appendChild(spanDel);
    
    spanEdit.addEventListener('click', newEvent);
    spanDel.addEventListener('click', confirmDel);

    return actions;
}

var getDataIdeas = function () {
    
    $.get("/api/ideas", function(data, status){

        if($('tbody').children().length !== 0){
            $('#ideas tbody').children().remove();
        }

        data.forEach(function (idea){
            let row = document.createElement("tr");
            let name = document.createElement("td");
            let location = document.createElement("td");
            let description = document.createElement("td");
            let price = document.createElement("td");
            let user = document.createElement("td");
            let poll = document.createElement("td");

            name.innerHTML = idea.name;
            location.innerHTML = idea.location;
            description.innerHTML = idea.descriptionShort;
            price.innerHTML = idea.price;
            user.innerHTML = idea.user.first_name+" "+idea.user.surname;
            poll.innerHTML = idea.poll;

            let newIdea = new Idea(idea.id, idea.name,idea.location, idea.description, idea.price, idea.poll, idea.user.first_name+" "+idea.user.surname);
            ideas.push(newIdea);

            let actions = actionsIdea(newIdea);

            row.appendChild(name);
            row.appendChild(location);
            row.appendChild(description);
            row.appendChild(price);
            row.appendChild(poll)
            row.appendChild(user);
            row.appendChild(actions);

            $('#ideas tbody').append(row);
            
        });
        $('#ideas').DataTable();
    });
};


$(document).ready( function () {
    getDataUsers();
    $('#ideas').DataTable();
    getDataIdeas();
});

let hidePanel = document.getElementById('hide');

hidePanel.addEventListener('click', hideEdit);