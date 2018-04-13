var User = function(id,name, surname, mail, group) {
  this.id = id;
  this.name = name;
  this.surname = surname;
  this.mail = mail;
  this.group = group;
};

var users=[];

var getUserById = function(id){

	return users.find(function(element){
		return element.id == id;
	});
};

var showEdit = function (){

	let boardEdit = document.querySelector('.board-edit form');
	let hidePanel = document.querySelector('#hide');

	boardEdit.style.visibility = 'visible';
	hidePanel.style.display = 'inline';

	user = getUserById(this.id);
	document.getElementById("name").value=user.name;
	document.getElementById("surname").value=user.surname;
	document.getElementById("mail").value=user.mail;
	document.getElementById("user-form").action="/users/update/"+user.id;

	document.getElementById(user.group.name).setAttribute("selected", "");
};

var hideEdit = function (){

	let boardEdit = document.querySelector('.board-edit form');
	let hidePanel = document.querySelector('#hide');

	boardEdit.style.visibility = 'hidden';
	hidePanel.style.display = 'none';

};

var actionsButton = function (user){
	let actions = document.createElement("td");
	let modify = document.createElement("i");
	modify.className="fas fa-edit";
	actions.setAttribute('id', user.id);
	actions.appendChild(modify);
	actions.addEventListener('click', showEdit);

	return actions;
}

$(document).ready( function () {
    
    $.get("/api/users", function(data, status){
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

        	$('tbody').append(row);
        	
        });
        $('#users').DataTable();
    });
});



let hidePanel = document.getElementById('hide');

hidePanel.addEventListener('click', hideEdit);