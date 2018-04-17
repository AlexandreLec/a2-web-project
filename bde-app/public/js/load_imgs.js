var imgs = [];

//request to json file
function getImages(){
    url = '/api/event/pictures/{id}';
    
    //xml http request
    var xhr = new XMLHttpRequest();
    xhr.open('GET', url);
    xhr.send(null);
    
    xhr.addEventListener('readystatechange', function() {

    //if request completed gets the JSON file
    if (xhr.readyState === 4 && xhr.status === 200) {
      
      console.log("got img urls");
      var response = JSON.parse(xhr.responseText);
      var i=0;
        
      while(response[i] != null){
        imgs[i] = response[i].path;
        i+=1;
      }
     
    }
    else {
        return 'error';
    }

    });
}
//get img urls


//print to DOM


