$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
});

var notif = [];
//var name;
//var desc;
//var autor;

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
                    div.id = 'divnotif';

                    var namenotif = document.createElement('p');
                    namenotif.id = 'namenotif';
                    var descnotif = document.createElement('p');
                    descnotif.id = 'descnotif';
                    var autornotif = document.createElement('p');
                    autornotif.id = 'autornotif';


                    div.appendChild(namenotif);
                    namenotif.innerHTML = element.name;

                    div.appendChild(descnotif);
                    descnotif.innerHTML = element.description;

                    div.appendChild(autornotif);
                    autornotif.innerHTML = element.author.first_name;

                    $('form #nom').append(div);
                    //$('form #nom').append($('form #desc'));
                    //$('form #desc').append(div);

                });


                // name = response[0].name;
                // desc = response[0].description;
                // autor = response[0].first_name;
                console.log(response);
                // callback();

                 
                }

            });
        
        xhr.send(null);
    }

    executerequete();
    
}
getnotif();

function confirmDelnotif () {
                    
    $.ajax({
        url: "/notification" ,
        type: 'DELETE',
        success: function (data, statut) {
          console.log(data);
        }
    });
}

$('#del-notif').on('click', confirmDelnotif);