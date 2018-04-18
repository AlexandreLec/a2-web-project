var pics = [];
//var response;

function getImages(){
    
    //xml http request to /api/users
    url = '/api/event/pictures/'+document.getElementById("eventid").value;
    
    var xhr = new XMLHttpRequest();
    xhr.open('GET', url);
    xhr.send(null);
    
    xhr.addEventListener('readystatechange', function() {

    //if request completed gets the JSON file
    if (xhr.readyState === 4 && xhr.status === 200) {
      
      
      response = JSON.parse(xhr.responseText);
//      console.log(response);
      var i=0;
      
      
      while(response[i] != null){
        pics[i] = response[i].url_picture;
        i+=1;
      }
 
    }
    else {
        return 'error';
    }

    });
    console.log(response);
}

getImages();












////------------------------------------------
//var images = [];
//
////request to json file
//function getImages(){
//    url = '/api/event/pictures/'+document.getElementById("eventid").value;         
//    
//    //xml http request
//    var xhr = new XMLHttpRequest();
//    xhr.open('GET', url);
//    xhr.send(null);
//    
//    xhr.addEventListener('readystatechange', function() {
//
//    //if request completed gets the JSON file
//    if (xhr.readyState === 4 && xhr.status === 200) {
//      
//      console
//      var response = JSON.parse(xhr.responseText);
//      var i=0;
//       
//      //get img urls
//      while(response[i] != null){
//        images[i] = response[i].url_picture;
////        console.log(images[i]);
//        i+=1;
//      }
//      
//      
//     
//    }
//    else {
//        return 'error';
//    }
//    
//    });
//    
//    
//}
//
//function setImages(){
//   var i=0;
//    while(images[i] != null){
//        console.log('test');
//        i+=1;
//    }
//    
//    console.log(images);
//    console.log(images[0]);
//    //print to DOM
//    var newimage = document.createElement("img");
////    newimage.src = imgs[0];
//    document.getElementById('photos').appendChild(newimage); 
//}
//
//
//getImages();
//setImages();
//
//
