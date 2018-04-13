var emailB = surnameB = firstnameB = passwordB = gradeB = false; 

function checkname(){
    var firstname = document.getElementById('Name');
   
 if(firstname.value.length <= 15 ){
   firstname.style.border ="solid 2px green";
        firstnameB = true;
    }
 else 
    {
        firstname.style.border ="solid 2px red";
        
    }
}

function checksecondname(){
    var surname = document.getElementById('Surname');

 if(surname.value.length <= 15 ){
      surname.style.border ="solid 2px green";
        surnameB = true;
    }
 else {
      surname.style.border ="solid 2px red";
       }
   }


function checkmail() {
    /*var regex_co = /^[a-z.]+@[a-z]{2,}\.fr$/;*/
    /*var regex_co = /^[a-z.]+@[a-z]{2,}\.[a-z]{1}$/;*/
    var regex_cesi = /^[a-z.]{2,}@cesi\.fr/;
    var regex_viacesi = /^[a-z.]{2,}@viacesi\.fr/;

    if(regex_cesi.test(this.value)){
            mailB = true ;
      
     this.style.border = "solid 2px green";
    }
    else{
        this.style.border = "solid 2px red";
        
    }
    
    if(regex_viacesi.test(this.value)){
        mailB = true ;
  
 this.style.border = "solid 2px green";
    }
else{
    this.style.border = "solid 2px red";
    
    }
}
function checkgrade(){
        var grade = document.getElementById('Grade').value;

     if(grade){
       grade.style.border ="solid 2px green";
            gradeB = true;
        }
     else 
        {
            grade.style.border ="solid 2px red";
            
        }
    }
    





var firstname = document.getElementById('Name');
firstname.addEventListener('change',checkname);

var mail = document.getElementById('Mail');
mail.addEventListener('change',checkmail);

var surname = document.getElementById('Surname');
surname.addEventListener('change',checksecondname);


var grade = document.getElementById('Grade');
grade.addEventListener('click',checkgrade);



document.getElementById('button').addEventListener('click', function(e) {
        
    if (mailB && surnameB && firstnameB && passwordB) {
    } 
    else {
        e.preventDefault();    
        style.border = "solid 2px red";  
    }
});