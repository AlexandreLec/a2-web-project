var mailB = surnameB = firstnameB = passwordB  = false;

function checkname() {
    var firstname = document.getElementById('Name');
    var filtre = /[a-z]{2,}$/;
    

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
    var filtre = /[a-z]{2,}$/;
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
    var regex_viacesi = /^[a-z.]{2,}@viacesi\.fr/;
    var regex_cesi = /^[a-z.]{2,}@cesi\.fr/;
    var mail = document.getElementById('Mail');

  
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
             
            alert('Il manque une majuscule et une minuscule ou un chiffre!');
            password.focus();
            //return false;
            password.style.border = "solid 2px red"
            passwordv.style.border = "solid 2px red"
            }
          

    }
    


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
