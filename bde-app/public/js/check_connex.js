var mailB = surnameB = firstnameB = passwordB  = false;
var emails = [];

function getemails(){
    
    //xml http request to /api/users
    url = '/api/users';
    
    var xhr = new XMLHttpRequest();
    xhr.open('GET', url);
    xhr.send(null);
    
    xhr.addEventListener('readystatechange', function() {

    //if request completed gets the JSON file
    if (xhr.readyState === 4 && xhr.status === 200) {
      
      console.log("request complete");
      var response = JSON.parse(xhr.responseText);
      var i=0;
      
      
      while(response[i] != null){
        emails[i] = response[i].mail;
        i+=1;
      }
     
     

    }
    else {
        return 'error';
    }

    });
     
}

function checkname() {
    var firstname = document.getElementById('Name');
    var filtre = /^[a-zA-z0-9áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ\s\.\,\!\?\-]{3,35}$/;
    

    if (filtre.test(firstname.value)) {

        firstname.style.border = "solid 2px green";
        firstnameB = true;
    }
    else {
        firstname.style.border = "solid 2px red";

    }
}

function checksecondname() {
    var surname = document.getElementById('Surname');
    var filtre = /^[a-zA-záàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ\s\.\,\!\?\-]{3,35}$/;
    if (filtre.test(surname.value)) {
        surname.style.border = "solid 2px green";
        surnameB = true;
    }
    else {
        surname.style.border = "solid 2px red";
    }
}


function checkmail() {
    var grade = document.getElementById('Grade').value;
    var regex_viacesi = /^[a-z\.A-Z]{2,}@viacesi\.fr/;
    var regex_cesi = /^[a-z\.A-Z]{2,}@cesi\.fr/;
    var mail = document.getElementById('Mail');
    var error = document.querySelector('.error');


    if(chkuniqmail(mail.value)){
        if ((grade == "Etudiant EXIA" || grade == "Etudiant EI") && regex_viacesi.test(mail.value)) {


            mail.style.border = "solid 2px green";
            mailB=true;
        }
        else if (grade == "Salarié CESI" && regex_cesi.test(mail.value)) {

            mail.style.border = "solid 2px green";
            mailB=true;
        }
        else {
            mail.style.border = "solid 2px red";
        }
        
        error.innerHTML = ""; // Reset the content of the message
        error.className = "error";
     }
     else {
        error.innerHTML = "Cet email existe déjà, connectez vous";
        error.className = "error active";     }
     }

function chkuniqmail(tstdmail){
    var i=0;
    while(emails[i] != null){
        if(emails[i] == tstdmail){
            
            return false;
        }
        i+=1;
    }
    return true;
}

function checkpassword(){
    var password = document.getElementById('Password');
    var passwordv = document.getElementById('Passwordv');
    var regex_pass =/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{2,})/
    

        if ((password.value == '' || passwordv.value == '') && regex_pass.test(password.value)){
            //alert('Tous les champs ne sont pas remplis');
       
            password.focus();
           
           // return false;
            
            }
          
          else if (password.value != passwordv.value) {
          
            password.focus();
            password.style.border = "solid 2px red"
            passwordv.style.border = "solid 2px red"
    
            //return false;
            }
          else if ((password.value == passwordv.value) &&  regex_pass.test(password.value)){
            //return true;
            
            password.style.border = "solid 2px green"
            passwordv.style.border = "solid 2px green"
            passwordB =true;
          }
          else {
             
            alert('Il manque une majuscule ou une minuscule ou un chiffre  ');
            password.focus();
            //return false;
            password.style.border = "solid 2px red"
            passwordv.style.border = "solid 2px red"
            }
          

    }
    

window.addEventListener('load', getemails);

var firstname = document.getElementById('Name');
firstname.addEventListener('keyup', checkname);

var surname = document.getElementById('Surname');
surname.addEventListener('keyup', checksecondname);

var mail = document.getElementById('Mail');
mail.addEventListener('keyup', checkmail);


var password = document.getElementById('Password');
password.addEventListener('change', checkpassword);

var passwordv = document.getElementById('Passwordv');
passwordv.addEventListener('change', checkpassword);


var grade = document.getElementById('Grade');
grade.addEventListener('click', checkmail);


document.getElementById('btnSubmit').addEventListener('click', function (e) {
        if (firstnameB == false || surnameB == false || passwordB == false || mailB == false) {
            e.preventDefault();
        }
    }
);
