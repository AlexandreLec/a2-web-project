$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
});

var notif = [];  // array of notif


function getnotif() { // function for take the differents notifcation



    var url = '/notification'; // the road of my request AJAX

    function executerequete() {

        
        var xhr = new XMLHttpRequest(); //instance of Ajax request
        xhr.open('GET', url, true);


        xhr.addEventListener('readystatechange', function () { //asynchrone request with function of callback

            //if request completed gets the JSON file
            if (xhr.readyState === 4 && xhr.status === 200) {

                var response = JSON.parse(xhr.response); //Parse a character string JSON

                response = $.map(response, function (el) { //create a new array 
                    return el;
                })

                response.forEach(element => {
                    var div = document.createElement('div'); //create element div
                    div.id = 'divnotif';
                    var namenotif = document.createElement('p'); //create element p
                    namenotif.id = 'namenotif';
                    var descnotif = document.createElement('p');
                    descnotif.id = 'descnotif';
                    var autornotif = document.createElement('p');
                    autornotif.id = 'autornotif';


                    div.appendChild(namenotif); //location of the element
                    namenotif.innerHTML = element.name; 

                    div.appendChild(descnotif);
                    descnotif.innerHTML = element.description;

                    div.appendChild(autornotif);
                    autornotif.innerHTML = element.author.first_name;

                    $('form #nom').append(div);
                    
                });
                console.log(response);
                                 
                }

            });
        
        xhr.send(null); //send request
    }

    executerequete();
    
}
getnotif();

function confirmDelnotif () { //function for delete notif
                    
    $.ajax({ // AJAX request
        url: "/notification" ,
        type: 'DELETE', // type of 
        success: function (data, statut) { 
          console.log(data);
        }
    });
}

$('#del-notif').on('click', confirmDelnotif); //button delete