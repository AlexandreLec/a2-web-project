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
}

getnotif();