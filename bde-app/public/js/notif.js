var notif = [];
var name;
var desc;


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
                    var descnotif = document.createElement('p');
                   
                    div.appendChild(namenotif);
                    namenotif.innerHTML = element.name;
                   
                    div.appendChild(descnotif);
                    descnotif.innerHTML = element.description;

                    $('form #nom').append(div);
                    $('form #nom').append($('form #desc'));
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