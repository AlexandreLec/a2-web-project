$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
});

var User = function(id,name, surname, mail, group) {
  this.id = id;
  this.name = name;
  this.surname = surname;
  this.mail = mail;
  this.group = group;
};

var Idea = function(id,name, location, desc, price, poll, user, userID) {
  this.id = id;
  this.name = name;
  this.location = location;
  this.desc = desc;
  this.price = price;
  this.poll = poll;
  this.user = user; 
  this.userId = userID;
};

var Event = function(id,name, location, desc, price, date, time, recurrence, month=false, category, statut) {
  this.id = id;
  this.name = name;
  this.location = location;
  this.desc = desc;
  this.price = price;
  this.date = date;
  this.time = time; 
  this.recurrence = recurrence;
  this.eventMonth = month; 
  this.category = category;
  this.statut = statut;
};

var CatGoodie = function (id, name){
    this.id = id;
    this.name = name;
}

var Goodie = function (id, name,description, price, stock, units_sold,category){
    this.id = id;
    this.name = name;
    this.description = description;
    this.price = price;
    this.stock = stock;
    this.unitsSold = units_sold;
    this.category = category;
}

var users=[];
var ideas=[];
var events=[];
var catGoodies=[];
var goodies=[];


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

var getEventById = function(id){

    return events.find(function(element){
        return element.id == id;
    });
};

var getCatGoodieById = function(id) {
    return catGoodies.find(function(element){
        return element.id == id;
    });
}

var getGoodieById = function(id) {
    return goodies.find(function(element){
        return element.id == id;
    });
}

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

var newCategory = function (){

    let boardEdit = document.querySelector('.board-edit #cat-goodie-form');
    let hidePanel = document.querySelector('#hide');

    boardEdit.style.visibility = 'visible';
    hidePanel.style.display = 'inline';

    ScrollToTop();
    StopAnimation();
    $('body').css('overflow-y','hidden');

    document.getElementById("cat-goodie-form").action="/goodie/category/";
};

var newCatGoodie = function(){
    let boardEdit = document.querySelector('.board-edit #cat-goodie-form');
    let hidePanel = document.querySelector('#hide');

    boardEdit.style.visibility = 'visible';
    hidePanel.style.display = 'inline';

    ScrollToTop();
    StopAnimation();
    $('body').css('overflow-y','hidden');

    document.getElementById("cat-goodie-form").action="/goodie/category/";
}

var newEvent = function (){

    let boardEdit = document.querySelector('.board-edit #event-form');
    let hidePanel = document.querySelector('#hide');

    boardEdit.style.visibility = 'visible';
    hidePanel.style.display = 'inline';

    ScrollToTop();
    StopAnimation();
    $('body').css('overflow-y','hidden');

    idea = getIdeaById(this.id);

    var user = document.createElement("input");
    user.name = "iduser";
    user.value = idea.userId;
    user.setAttribute("hidden", "hidden");
    boardEdit.append(user);

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

var showEvent = function (){

    let boardEdit = document.querySelector('.board-edit #event-form');
    let hidePanel = document.querySelector('#hide');

    boardEdit.style.visibility = 'visible';
    hidePanel.style.display = 'inline';

    ScrollToTop();
    StopAnimation();
    $('body').css('overflow-y','hidden');

    event = getEventById(this.id);

    document.querySelector('#event-name').value = event.name;
    document.querySelector('#desc-event').value = event.desc;
    document.querySelector('#event-price').value = event.price;
    document.querySelector('#event-location').value = event.location;
    document.querySelector('#event-date').value = event.date;
    document.querySelector('#event-hour').value = event.time;

    idRec = event.recurrence;
    $('#event-cat').children().removeAttr('selected');
    $('#event-rec').children().removeAttr('selected');
    $("#"+idRec).attr('selected','selected');

    $('option[value='+event.category+']').attr('selected','selected');

    document.getElementById("event-form").action="/events/update/"+event.id;
};

var hideEdit = function (){

    let boardEditUser = document.querySelector('.board-edit #user-form');
    let boardEditEvent = document.querySelector('.board-edit #event-form');
    let boardEditCat = document.querySelector('.board-edit #cat-form');
    let boardEditCatGoodie = document.querySelector('.board-edit #cat-goodie-form');
	let hidePanel = document.querySelector('#hide');

	if(boardEditUser.style.visibility == 'visible'){
        boardEditUser.style.visibility = 'hidden';
    };
    if(boardEditEvent.style.visibility == 'visible'){
        boardEditEvent.style.visibility = 'hidden';
    };
    if(boardEditCat.style.visibility == 'visible'){
        boardEditCat.style.visibility = 'hidden';
    };
    if(boardEditCatGoodie.style.visibility == 'visible'){
        boardEditCatGoodie.style.visibility = 'hidden';
    };

	hidePanel.style.display = 'none';

    $('body').css('overflow-y','scroll');

};

var confirmDel = function (act) {
    element = act;
    user = getUserById(element.id);
    if (confirm("Vous allez supprimer l'utilisateur "+user.name+" "+user.surname+". Cette opération est irréversible, voulez-vous continuer ?")){
        $.ajax({
            url: "/users/"+element.id,
            type: 'DELETE',
            success: function(data, statut){
                getDataUsers();
            }
        });
    }
    else {
        return;
    }
}

var confirmDelIdea = function () {
    element = this;
    idea = getIdeaById(element.id);
    if (confirm("Vous allez supprimer l'idée "+idea.name+". Cette opération est irréversible, voulez-vous continuer ?")){
        $.ajax({
            url: "/events/ideas/"+element.id,
            type: 'DELETE',
            success: function(data, statut){
                getDataIdeas();
            }
        });
    };
}

var confirmDelEvent = function () {
    element = this;
    event = getEventById(element.id);
    if (confirm("Vous allez supprimer l'évènement "+event.name+". Cette opération est irréversible, voulez-vous continuer ?")){
        $.ajax({
            url: "/events/"+element.id,
            type: 'DELETE',
            success: function(data, statut){
                getDataEvents();
            }
        });
    };
}

var confirmDelCatGoodie = function () {
    element = this;
    catGoodie = getCatGoodieById(element.id);
    if (confirm("Vous allez supprimer la catégorie "+catGoodie.name+". Cette opération supprimera tous les goodies de cette catégorie, voulez-vous continuer ?")){
        $.ajax({
            url: "/goodie/category/"+element.id,
            type: 'DELETE',
            success: function(data, statut){
                getDataCatGoodie();
            }
        });
    };
}

var confirmDelGoodie = function () {
    element = this;
    goodie = getGoodieById(element.id);
    if (confirm("Vous allez supprimer le goodie "+goodie.name+". Cette opération est irréversible, voulez-vous continuer ?")){
        $.ajax({
            url: "/goodie/"+element.id,
            type: 'DELETE',
            success: function(data, statut){
                getDataGoodie();
            }
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

    spanEdit.className = "btn-edit-user";
    spanDel.className = "btn-del-user";
    
    

	return actions;
}

var actionsIdea = function (idea){
    let actions = document.createElement("td");
    let edit = document.createElement("i");
    let del = document.createElement("i");
    let spanEdit = document.createElement("span");
    let spanDel = document.createElement("span");

    edit.className="fas fa-plus";
    del.className="fas fa-trash-alt";

    spanEdit.setAttribute('id', idea.id);
    spanDel.setAttribute('id', idea.id);
    
    spanEdit.appendChild(edit);
    spanDel.appendChild(del);

    actions.appendChild(spanEdit);
    actions.appendChild(spanDel);

    spanEdit.className = "btn-edit-idea";
    spanDel.className = "btn-del-idea";

    return actions;
}

var actionsEvent = function (event) {
    let actions = document.createElement("td");
    let edit = document.createElement("i");
    let del = document.createElement("i");
    let pdf = document.createElement('i');
    let participants = document.createElement("i");
    let spanEdit = document.createElement("span");
    let spanDel = document.createElement("span");
    let spanPart = document.createElement("span");
    let csv = document.createElement("a");
    let spanPdf = document.createElement("span");

    edit.className="fas fa-edit";
    del.className="fas fa-trash-alt";
    participants.className="fas fa-users";
    pdf.className="fas fa-file-pdf";

    spanEdit.setAttribute('id', event.id);
    spanDel.setAttribute('id', event.id);
    spanPdf.setAttribute('id', event.id);
    csv.setAttribute('href', '/api/event/users/csv/'+event.id);
    csv.setAttribute('download', 'download');
    
    spanEdit.appendChild(edit);
    spanDel.appendChild(del);
    csv.appendChild(participants);
    spanPdf.appendChild(pdf);

    actions.appendChild(spanEdit);
    actions.appendChild(spanDel);
    actions.appendChild(csv);
    actions.appendChild(spanPdf);
    
    spanEdit.className = "btn-edit-event";
    spanDel.className = "btn-del-event";
    spanPdf.className = "btn-pdf";

    return actions;
}

var actionsCatGoodie = function (catGoodie) {
    let actions = document.createElement("td");
    let del = document.createElement("i");
    let spanDel = document.createElement("span");

    del.className="fas fa-trash-alt";

    spanDel.setAttribute('id', catGoodie.id);
    spanDel.appendChild(del);

    actions.appendChild(spanDel);
    
    spanDel.className = "btn-del-cat-goodie";

    return actions;
}

var actionsGoodie = function (goodie) {
    let actions = document.createElement("td");
    let del = document.createElement("i");
    let spanDel = document.createElement("span");

    del.className="fas fa-trash-alt";

    spanDel.setAttribute('id', goodie.id);
    spanDel.appendChild(del);

    actions.appendChild(spanDel);
    
    spanDel.className = "btn-del-goodie";

    return actions;
}

var getDataCatGoodie = function () {
    
    $.get("/api/goodie/category", function(data, statut){

        if($('tbody').children().length !== 0){
            $('#goodies tbody').children().remove();
        }

        data.forEach(function (catGoodie){
            let row = document.createElement("tr");
            let name = document.createElement("td");

            let actions = actionsCatGoodie(catGoodie);

            name.innerHTML = catGoodie.name;

            catGoodies.push(new CatGoodie(catGoodie.id, catGoodie.name));

            row.appendChild(name);
            row.appendChild(actions);

            $('#cat-goodie tbody').append(row);
            
        });
        $('#cat-goodie').on('click', '.btn-del-cat-goodie', confirmDelCatGoodie);
        $('#cat-goodie').DataTable({
            responsive: true
        });
    });
};

var getDataGoodie = function () {
    
    $.get("/api/shop/goodies/", function(data, statut){

        if($('tbody').children().length !== 0){
            $('#goodies tbody').children().remove();
        }

        data.forEach(function (goodie){
            let row = document.createElement("tr");
            let name = document.createElement("td");
            let description = document.createElement("td");
            let price = document.createElement("td");
            let stock = document.createElement("td");
            let unitsSold = document.createElement("td");
            let category = document.createElement("td");

            let actions = actionsGoodie(goodie);

            name.innerHTML = goodie.name;
            description.innerHTML = goodie.description;
            price.innerHTML = goodie.price;
            stock.innerHTML = goodie.stock;
            unitsSold.innerHTML = goodie.units_sold;
            category.innerHTML = goodie.category.name;

            goodies.push(new Goodie(goodie.id, goodie.name, goodie.description, goodie.price, goodie.stock, goodie.units_sold,goodie.category.name));

            row.appendChild(name);
            row.appendChild(description);
            row.appendChild(price);
            row.appendChild(stock);
            row.appendChild(unitsSold);
            row.appendChild(category);
            row.appendChild(actions);

            $('#goodies tbody').append(row);
            
        });
        $('#goodies').on('click', '.btn-del-goodie', confirmDelGoodie);
        $('#goodies').DataTable({
            responsive: true
        });
    });
};

var getDataUsers = function () {
    
    $.get("/api/users", function(data, statut){

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
        $('#users').on('click', '.btn-edit-user', showEdit);
        $('#users').on('click', '.btn-del-user', function (){
            confirmDel(this);
        });
        $('#users').DataTable({
            responsive: true
        });
    });
};

var getDataIdeas = function () {
    
    $.get("/api/ideas", function(data, statut){

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

            let newIdea = new Idea(idea.id, idea.name,idea.location, idea.description, idea.price, idea.poll, idea.user.first_name+" "+idea.user.surname, idea.user.id);
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
        $('#ideas').on('click', '.btn-edit-idea', newEvent);
        $('#ideas').on('click', '.btn-del-idea', confirmDelIdea);
        $('#ideas').DataTable({
            responsive: true
        });
    });
};

var getDataEvents = function () {
    
    $.get("/api/event", function(data, statut){

        if($('tbody').children().length !== 0){
            $('#events tbody').children().remove();
        }

        console.log(data);

        data.forEach(function (event){
            let row = document.createElement("tr");
            let name = document.createElement("td");
            let location = document.createElement("td");
            let description = document.createElement("td");
            let price = document.createElement("td");
            let date = document.createElement("td");
            let heure = document.createElement("td");
            let recurrence = document.createElement("td");
            let category = document.createElement("td");

            name.innerHTML = event.name;
            location.innerHTML = event.location;
            description.innerHTML = event.description.slice(0, 120)+"...";
            price.innerHTML = event.price;
            date.innerHTML = event.event_date;
            heure.innerHTML = event.event_time;
            recurrence.innerHTML = event.recurrence;
            category.innerHTML = event.category.name;

            if(event.month_event === 1){
                var newEvent = new Event(event.id,event.name, event.location, event.description, event.price, event.event_date, event.event_time, event.recurrence, true, event.category.name, event.statut);
            }
            else {
                var newEvent = new Event(event.id,event.name, event.location, event.description, event.price, event.event_date, event.event_time, event.recurrence, false, event.category.name, event.statut);
            }

            events.push(newEvent);

            let actions = actionsEvent(newEvent);

            row.appendChild(name);
            row.appendChild(description);
            row.appendChild(location);
            row.appendChild(date);
            row.appendChild(heure)
            row.appendChild(price);
            row.appendChild(recurrence);
            row.appendChild(category);
            row.appendChild(actions);

            if(event.statut == 'DONE'){
                $('#events-past tbody').append(row);
            }else {
                $('#events tbody').append(row);
            }
            
            
        });
        $('#events').on('click', '.btn-edit-event', showEvent);
        $('#events').on('click', '.btn-del-event', confirmDelEvent);
        $('#events').on('click', '.btn-pdf', participantsPDF);
        $('#events-past').on('click', '.btn-edit-event', showEvent);
        $('#events-past').on('click', '.btn-del-event', confirmDelEvent);
        $('#events-past').on('click', '.btn-pdf', participantsPDF);

        $('#events').DataTable({
            responsive: true
        });
        $('#events-past').DataTable({
            responsive: true
        });
    });
};

var participantsPDF = function (){
    console.log('hello');
    $.get("/api/event/users/"+this.id, function(data, statut){

        var pdf = new jsPDF();
        var y = 10;
        pdf.setFontStyle('bold');
        pdf.text(12, y, "Prénom");
        pdf.text(50, y, "Nom");
        pdf.setFontStyle('normal');

        data.forEach(function(participant){
            y=y+10;
            pdf.text(12, y, participant.first_name);
            pdf.text(50, y, participant.surname);
        });
        pdf.save('participants.pdf');
    });
}


$(document).ready( function () {
    getDataUsers();
    getDataIdeas();
    getDataEvents();
    getDataCatGoodie();
    getDataGoodie();
});

let hidePanel = document.getElementById('hide');
let addEvent = document.getElementById('add-event');
let addCat = document.getElementById('add-cat');
let addCatGoodie = document.getElementById('add-goodie-cat');

addEvent.addEventListener('click', newEvent);
hidePanel.addEventListener('click', hideEdit);
addCat.addEventListener('click', newCategory);
addCatGoodie.addEventListener('click', newCatGoodie);

window.onresize = resize;

function resize()
{
    //location.reload();
}