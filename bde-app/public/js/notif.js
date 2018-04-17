function getnotif(){
    
    //xml http request to /api/users
    url = '';
    
    var xhr = new XMLHttpRequest();
    xhr.open('GET', url);
    xhr.send(null);
    
    xhr.addEventListener('readystatechange', function() {

    //if request completed gets the JSON file
    if (xhr.readyState === 4 && xhr.status === 200) {
      
      
      var response = JSON.parse(xhr.responseText);
    
    }
});
}