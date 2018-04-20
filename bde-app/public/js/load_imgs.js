//var pics = [];
//var response;

var Picture = function (id, name, urlImg, sender, comments, likes){
    this.id = id;
    this.name = name;
    this.url = urlImg;
    this.author = sender;
    this.comments = comments;
    this.likes = likes;
};

var images = [];

var getImageById = function(id){

    return images.find(function(element){
        return element.id == id;
    });
};

function getImages(image=null){
    
    //xml http request to /api/users
    url = '/api/event/pictures/'+document.getElementById("eventid").value;
    
    var xhr = new XMLHttpRequest();
    xhr.open('GET', url);
    xhr.send(null);
    
    xhr.addEventListener('readystatechange', function() {

    //if request completed gets the JSON file
    if (xhr.readyState === 4 && xhr.status === 200) {
      
      var response = JSON.parse(xhr.responseText);
      var i=0;
      images = [];
      
      while(response[i] != null){
        let pic = new Picture(response[i].id, response[i].name, response[i].url_picture, response[i].author,response[i].comments,response[i].likes)
        images.push(pic);
        i++;
      }
      if($('#photos').html() == ""){
        buildImage(images);
      }
      if(image !== null){
        image = getImageById(image.id);
        loadMeta(image);
      }
      
      var ldedstate = document.getElementById("imgsloaded");
      ldedstate.value = 1;
 
    }
    else {
        return 'error';
    }

    });
}

var showFrame = function (){
    var modal = document.getElementById('myModal');
    var modalImg = document.getElementById('mdlImg');

    modal.style.display = "block";
    modalImg.style.background = 'center / contain no-repeat url('+this.src+')';

    modalImg.setAttribute("name", this.id);

    img = getImageById(this.id);

    loadMeta(img);
}

var hideFrame = function (){
    var modal = document.getElementById('myModal');

    modal.style.display = "none";
}

function buildImage(pictures){
    //print to DOM

    pictures.forEach(picture =>{
        var newimage = document.createElement('img');
        newimage.id = picture.id;
        newimage.src = picture.url;
        newimage.addEventListener('click', showFrame);
        document.getElementById('photos').appendChild(newimage); 
    });
    
}

$("#mdlImg").on("click", hideFrame);
$("#close-window").on("click", hideFrame);



getImages();
