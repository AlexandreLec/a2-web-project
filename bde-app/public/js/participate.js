
var participate = [];
var user;
var event;



function getparticipate() {

    var url = '/participate';

    function participate() {

        var xhr = new XMLHttpRequest();
        xhr.open('GET', url, true);


        xhr.addEventListener('readystatechange', function () {

            if (xhr.readyState === 4 && xhr.status === 200) {

                var response = JSON.parse(xhr.responseText);

                    console.log(response);
                
                   

                }
            });
       
        xhr.send(null);

    }
    participate() ;
}
getparticipate();