function checkname(){

    var name
 if(champ.value.length <1 || champ.value.length >15){
        
        surligne(champ,true);
        return false;
    }
 else 
    {

        surligne(champ,false);
        return true;
    }
}

function checksecondname(){


 if(value.length <1 || value.length >15){
        surligne(true);
        return false;
    }
 else {
          surligne(false);
          return true;
       }
   }

function checkemail(){
   
    var regex_co = /^[a-z.]+@[a-z]{2,}\.[a-z]{2,4}$/;

if(!regex_co.test(value)){

    surligne(true);
    return false;
    alert("Veuillez remplir correctement l'email");
}
else{
    surligne(false);
    return true;
}
}

var firstname = document.getElementById('Name')
firstname.addEventListener('keypress',checkname);

var mail = document.getElementById('Mail')
mail.addEventListener('keypress',checkmail);

var surname = document.getElementById('Surname')
surname.addEventListener('keypress',checksecondname);