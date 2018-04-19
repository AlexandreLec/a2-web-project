var comments = [];

function addComment(date, time, user, contnt, id, own){
    
    var newComment = document.createElement("div");
    newComment.className = "comment";
    
    var newCmtMeta = document.createElement('div');
    newCmtMeta.className = 'cmtMeta';
    
    var newDateTime = document.createElement('p');
    
    var newDate = document.createElement('i');
    newDate.className = 'cmtDate';
    newDate.textContent = date;
    
    var newTime = document.createElement('i');
    newTime.className = 'cmtTime';
    newTime.textContent = time;
    
    var newUser = document.createElement('p');
    newUser.className = 'cmtUser';
    newUser.textContent = user;
    
    var newCmtText = document.createElement('div');
    newCmtText.className = 'cmtTextArea';
    
    var newCmtContent = document.createElement('p');
    newCmtContent.textContent = contnt;
    
    var newCmtSet = document.createElement('div');
    newCmtSet.className = 'cmntSettings';
    
    var newCmtSetBut = document.createElement('button');
    newCmtSetBut.className = 'stgsButton';
    newCmtSetBut.id = 'drpSet'+id;
    newCmtSetBut.addEventListener('click',dltComment);
    
    var newCmtSetButIcn = document.createElement('i');
    newCmtSetButIcn.className = 'fas fa-trash-alt';
    
    var newCmtSetCnt = document.createElement('div');
    
    newCmtSetCnt.className = 'settingsContent';
    
    var newCmtSetLine = document.createElement('a');
    newCmtSetLine.textContent = 'Supprimer ce commentaire';
    
    
    newCmtSetCnt.appendChild(newCmtSetLine);
    newCmtSetBut.appendChild(newCmtSetButIcn);
    
    newCmtMeta.appendChild(newDateTime);
    newCmtMeta.appendChild(newUser);
    
    newDateTime.appendChild(newDate);
    newDateTime.appendChild(newTime);
    
            
    newCmtSet.appendChild(newCmtSetCnt);
    newCmtSet.appendChild(newCmtSetBut);
    
    newCmtText.appendChild(newCmtContent);
    newCmtText.appendChild( newCmtSet);
    
    newComment.appendChild(newCmtMeta);
    newComment.appendChild(newCmtText);
    
    var cmtSection = document.getElementById('comments');
    
    if(own == 1){
        var newOwnComment = document.createElement('div');
        newOwnComment.className = 'ownComment';
        newOwnComment.appendChild(newComment);
        cmtSection.appendChild(newOwnComment);
    }
    else {
        cmtSection.appendChild(newComment);
    }
    
    
//    console.log(document.getElementsByClassName('comment'));
    
    
}

function getComments(id){
    $.get("/api/pictures/"+id+"/comments", function(data){
        comments = data;
    });
}

function loadComments(){
    console.log(this.id);
    getComments();
    document.querySelector('#reply form').action = "/event/pictures/{{ $picid->id }}/comments";
    comments.forEach(addComment(this.date, this.time, this.user, this.contnt, this.id, this.own));
}

function dltComment(){
    
}

