$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
});

var addLike = function() {

    id_image = document.getElementById('mdlImg').getAttribute("name");
    image = getImageById(id_image);
    element = this;
    $.get("/picture/like/add/"+this.id).done([
        function () { 
            $.get("/picture/like/"+element.id, function(data){
                if(data){
                    $('.img-like').text(data);
                    picture = getImageById(element.id);
                    picture.likes = data;
                }
            });
        }
    ]);
}

function loadMeta(picture){

    var metaData = document.createElement("p");
    metaData.innerHTML = "Postée par "+picture.author.first_name+" "+picture.author.surname;
    $('.metadata').empty().append(metaData);

    $('.img-like').text(picture.likes);
    $('.like .button-red').attr('id', picture.id);

    $('#comments').empty();

    picture.comments.forEach(comment => {
        var newComment = document.createElement("div");
        newComment.className = "comment";

        var newCmtMeta = document.createElement('div');
        var newMeta = document.createElement('p');
        newCmtMeta.className = 'cmtMeta';
        newMeta.innerHTML = comment.author.first_name+" "+comment.author.surname+", le "+comment.date_comment+" à "+comment.time_comment;
        newCmtMeta.appendChild(newMeta);
        newComment.appendChild(newCmtMeta);

        var newCmtText = document.createElement('div');
        var newCmtContent = document.createElement('p');

        newCmtText.className = 'cmtTextArea';
        newCmtContent.innerHTML = comment.body;
        newCmtText.appendChild(newCmtContent);
        newComment.appendChild(newCmtText);

        if($('#id-group-user').html() == 4){
            var suppr = document.createElement('span');
            suppr.className="del-comment";
            suppr.innerHTML="Supprimer";
            suppr.setAttribute("id", comment.id);
            suppr.addEventListener("click", confirmDelComment);
            newComment.appendChild(suppr);
        }

        $('#comments').append(newComment);
    });
}

var addComment = function(){

    id_image = document.getElementById('mdlImg').getAttribute("name");
    image = getImageById(id_image);
    content = document.getElementById('add-comment').value;

    $.ajax({
      type: "POST",
      url: '/event/comment/',
      data: {
        id_img: image.id,
        content: content
      },
      success: function(){
        getImages(image);
        document.getElementById('add-comment').value="";
      }
    });
    
}

var confirmDelComment = function () {

    id_image = document.getElementById('mdlImg').getAttribute("name");
    image = getImageById(id_image);

    if (confirm("Voulez-vous vraiment supprimer ce commentaire ? Cette opération est irréversible.")){
        $.ajax({
            url: "/event/comment/"+this.id,
            type: 'DELETE',
            success: function(data, statut){
                getImages(image);
            }
        });
    };
}

$('#send-comment').on("click", addComment);
$('.like .button-red').on('click', addLike);