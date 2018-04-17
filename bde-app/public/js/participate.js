var url ='/api/users';
function participate() {
    
    var samemail = new XMLHttpRequest();

     samemail.addEventListener('readystatechange', function () {

        if (samemail.readyState === 4) {
            if (httpRequest.status === 200){
        
            var results = JSON.parse(samemail.responseXML)
            result.innerHTML = ''
            var ul = document.createElement('ul')
            result.appendChild(ul)

            for (var i = 0; i < results.length; i++){
                var li = document.createElement('li')
                li.innerHTML = results[i].name
                ul.appendChild(li)

            }

        }
        }
    });
    samemail.open('GET', url, true);
    samemail.send();

}