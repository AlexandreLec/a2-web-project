
var actionsButton = function (user){
	let actions = document.createElement("td");
	let actionModify = document.createElement("a");
	let modify = document.createElement("i");

	let path = "/admin/user/edit/"+user.id;
	actionModify.setAttribute("href", path);
	modify.className="fas fa-edit";

	actionModify.appendChild(modify);

	actions.appendChild(actionModify);

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

