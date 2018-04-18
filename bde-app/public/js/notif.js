var notif = [];
var name;
var desc;

function getnotif() {

    // function affichernotif() {

    //     document.getElementById('nom').innerHTML = name;
    //     document.getElementById('description').innerHTML = desc;

    // }

    var url = '/notification';

    function executerequete() {

        // if (notif.length === 0) {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', url, true);


        xhr.addEventListener('readystatechange', function () {

            //if request completed gets the JSON file
            if (xhr.readyState === 4 && xhr.status === 200) {

                var response = JSON.parse(xhr.responseText);

                response.forEach(element => {
                    var div = document.createElement('div');
                    var namenotif = document.createElement('p')
                    div.appendChild(namenotif);
                    namenotif.innerHTML = element.name;

                    $('form #nom').append(div);
                });

                response.forEach(element => {
                    var div = document.createElement('div');
                    var descnotif = document.createElement('p');
                    div.appendChild(descnotif);
                    descnotif.innerHTML = element.description;

                    $('form #desc').append(div);
                });

                name = response[0].name;
                desc = response[0].description;

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