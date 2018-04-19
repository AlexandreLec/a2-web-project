var notif = [];
var name;
var desc;
var autor;

function getnotif() {

    

    var url = '/notification';

    function executerequete() {

        // if (notif.length === 0) {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', url, true);


        xhr.addEventListener('readystatechange', function () {

            //if request completed gets the JSON file
            if (xhr.readyState === 4 && xhr.status === 200) {

                var response = JSON.parse(xhr.response);

                response = $.map(response, function (el) {
                    return el;
                })

                response.forEach(element => {
                    var div = document.createElement('div');
                    var namenotif = document.createElement('p');
                    namenotif.id= 'namenotif';
                    var descnotif = document.createElement('p');
                    descnotif.id= 'descnotif';
                    var autornotif = document.createElement('p');
                    autornotif.id= 'autornotif';
                    

                    div.appendChild(namenotif);
                    namenotif.innerHTML = element.name;
                   
                    div.appendChild(descnotif);
                    descnotif.innerHTML = element.description;

                    div.appendChild(autornotif);
                    autornotif.innerHTML = element.id_user;

                    $('form #nom').append(div);
                    $('form #nom').append($('form #desc'));
                    $('form #desc').append(div);
                   
                   
                   



                });


                name = response[0].name;
                desc = response[0].description;
                autor = response[0].id_user;
                console.log(response);
                // callback();

            }

        });
        xhr.send(null);
    }
    // }

    executerequete();

    /*function affichernotif(jsonObj) {
        var name = jsonObj['name'];

        for (var i = 0; i < name.length; i++) {
           
            var div = document.createElement('div');
            var namenotif = document.createElement('p')
            div.appendChild(namenotif);*/


    /* var element = document.getElementById("right-bar");
     element.appendChild(namediv);*/
}


getnotif();