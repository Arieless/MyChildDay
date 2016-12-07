
var popUpContainerBackground;
var toHide;

//var faqQuestions;
//var faqAnswers;
//var faqImgs;

window.addEventListener('DOMContentLoaded', function () {
  // pop ups
  popUpContainerBackground = document.getElementById('popUpContainerBackground');
  popUpContainerLogin = document.getElementById('popUpContainerLogin');
  popUpContainerRegister = document.getElementById('popUpContainerRegister');
  popUpContainerEmailReset = document.getElementById('popUpContainerEmailReset');
  popUpContainerPassReset = document.getElementById('popUpContainerPassReset');
  popUpContainerContact = document.getElementById('popUpContainerContact');

  // elements to hide in resolutions less than 1280 so it looks like a new page
  toHide = document.getElementsByClassName('toHide');

  var buttonsClose = document.querySelectorAll('.buttonClose');

  for (var button in buttonsClose){
    buttonsClose[button].onclick = popUpClose;
  }

  // pop up on button register click
  document.getElementById('containerLoginRegisterText').onclick = popUpRegister;
  // pop up on button login click
  document.getElementById('containerRegisterLoginText').onclick = popUpLogin;
  // pop up on button passReset click
  document.getElementById('containerEmailResetText').onclick = popUpEmailReset;
  // pop up on button contact click
  document.getElementById('popUpContactButton').onclick = popUpContact;

  // pops register form
  document.getElementById('popUpButtonRegister').onclick = popUpRegister;
  // pops login form
  document.getElementById('popUpButtonLogIn').onclick = popUpLogin;
  // pops passReset form
  document.getElementById('containerEmailResetText').onclick = popUpEmailReset;
  // pops contact form
  document.getElementById('popUpContactButton').onclick = popUpContact;


  // close popups on key escape down
  window.onkeydown = popUpEscapeClose;
  // close pop ups on background click
  popUpContainerBackground.onclick = popUpClickClose;

});

function popUpClose (){

  popUpContainerLogin.style.display = "none";
  popUpContainerBackground.style.display = "none";
  popUpContainerRegister.style.display = "none";
  popUpContainerEmailReset.style.display = "none";
  popUpContainerPassReset.style.display = "none";
  popUpContainerContact.style.display = "none";

  hideTheRest(false); //este es otro super hackcode
}

function popUpLogin(){

  popUpContainerLogin.style.display = "block";
  popUpContainerBackground.style.display = "block";
  popUpContainerRegister.style.display = "none";
  popUpContainerEmailReset.style.display = "none";
  popUpContainerPassReset.style.display = "none";
  popUpContainerContact.style.display = "none";

  hideTheRest(true);

}

function popUpRegister () {

  popUpContainerRegister.style.display = "block";
  popUpContainerBackground.style.display = "block";
  popUpContainerLogin.style.display = "none";
  popUpContainerEmailReset.style.display = "none";
  popUpContainerPassReset.style.display = "none";
  popUpContainerContact.style.display = "none";

  hideTheRest(true);

}

function popUpEmailReset () {

  popUpContainerEmailReset.style.display = "block";
  popUpContainerBackground.style.display = "block";
  popUpContainerLogin.style.display = "none";
  popUpContainerRegister.style.display = "none";
  popUpContainerPassReset.style.display = "none";
  popUpContainerContact.style.display = "none";

  hideTheRest(true);

}

function popUpPassReset () {

  popUpContainerPassReset.style.display = "block";
  popUpContainerBackground.style.display = "block";
  popUpContainerLogin.style.display = "none";
  popUpContainerRegister.style.display = "none";
  popUpContainerEmailReset.style.display = "none";
  popUpContainerContact.style.display = "none";


  hideTheRest(true);

}

function popUpContact () {

  popUpContainerContact.style.display = "block";
  popUpContainerBackground.style.display = "block";
  popUpContainerPassReset.style.display = "none";
  popUpContainerLogin.style.display = "none";
  popUpContainerRegister.style.display = "none";
  popUpContainerEmailReset.style.display = "none";


  hideTheRest(true);

}

function popUpClickClose (ev) {

    if (ev.target == popUpContainerBackground){
      popUpContainerBackground.style.display = "none";
      popUpContainerLogin.style.display = "none";
      popUpContainerRegister.style.display = "none";
      popUpContainerEmailReset.style.display = "none";
      popUpContainerPassReset.style.display = "none";
      popUpContainerContact.style.display = "none";
    }
}

function popUpEscapeClose (ev){

    if(ev.keyCode==27){
      popUpContainerBackground.style.display = "none";
      popUpContainerLogin.style.display = "none";
      popUpContainerRegister.style.display = "none";
      popUpContainerEmailReset.style.display = "none";
      popUpContainerPassReset.style.display = "none";
      popUpContainerContact.style.display = "none";

      hideTheRest(false);
    }
}

function hideTheRest (bool){

  if (getWidth() < 1280){ // WARNING THIS SHOULD BE THE SAME AS THE QUERYS OF THE CSS

    if (bool){
      for (var i=0; i < toHide.length; i++){
        toHide[i].style.display = "none";
      }
    }
    else{
      for (var ii=0; ii < toHide.length; ii++){
        toHide[ii].style.display = "block";
      }
    }
  }

  else if (getWidth() >= 1280 && !bool){ //esto es un super hackcode
    for (iii=0; iii < toHide.length; iii++){
      toHide[iii].style.display = "block";
    }
  }
}

function getWidth() {
  if (self.innerWidth) {
    return self.innerWidth;
  }

  if (document.documentElement && document.documentElement.clientWidth) {
    return document.documentElement.clientWidth;
  }

  if (document.body) {
    return document.body.clientWidth;
  }
}



var ruleMoreThan7 = new makeRule (/^(?=.*\d)(?=.*[a-zA-Z])[0-9a-zA-Z]{7,}$/, "Por favor ingresa más de 7 digitos que tengan al menos una letra y un numero.");
var ruleNotEmpty = new makeRule(/^[\s]*$/, "No puede estar vacio, ni ser solo espacios en blanco");
var ruleEmail = new makeRule(/^(?:[^<>()[\].,;:\s@"]+(\.[^<>()[\].,;:\s@"]+)*|"[^\n"]+")@(?:[^<>()[\].,;:\s@"]+\.)+[^<>()[\]\.,;:\s@"]{2,63}$/i, "Email no valido.");
var ruleText = new makeRule (/^[a-zA-Z\s]{2,}$/, "Solo puede contener letras");
var ruleAddress = new makeRule(/^\s*\S+(?:\s+\S+)/, "Ingrese un nombre de calle y su altura.");
var ruleNumber = new  makeRule(/^\d{1,45}$/, "Solo puede contener numeros");

document.addEventListener('DOMContentLoaded', function (evt){
  // validate register form
  document.getElementById('registerForm').addEventListener('submit', formValidation);
  // validate login form
  document.getElementById('loginForm').addEventListener('submit', loginValidation);
  // validate emailReset form
  document.getElementById('emailResetForm').addEventListener('submit', formValidation);
  // validate passReset form
  document.getElementById('passResetForm').addEventListener('submit', formValidation);
  // validate contact form
  document.getElementById('contactForm').addEventListener('submit', formValidation);
});

function loginValidation (evt){

  // validate login
  var loginEmail = new makeInputElement("loginEmail", document.getElementById("loginEmail"), document.getElementById("loginEmailError"));

  var flag = validate(loginEmail, ruleEmail);

  if (!flag) { evt.preventDefault();}
}

function formValidation (evt){

  // Validate register
  var userName = new makeInputElement("nombre", document.getElementById("firstName"), document.getElementById("firstNameError"));
  console.log (userName);
  var userLastName = new makeInputElement("apellido", document.getElementById("lastName"), document.getElementById("lastNameError"));
  console.log (userLastName);
  var email = new makeInputElement("email", document.getElementById("email"), document.getElementById("emailError"));
  console.log (email);
  var address = new makeInputElement("address", document.getElementById("address"), document.getElementById("addressError"));
  console.log (address);
  var phone = new makeInputElement ("phone", document.getElementById("phone"), document.getElementById("phoneError"));
  console.log (phone);
  var password = new makeInputElement ("contraseña", document.getElementById("password"), document.getElementById("passwordError"));
  console.log (password);
  var passwordConfirm = new makeInputElement ("verificacion de contraseña", document.getElementById("password_confirmation"), document.getElementById("password_confirmationError"));
  console.log (passwordConfirm);


  var flag;
  flag = validate (userName, ruleText);
  flag = flag & validate (userLastName, ruleText);
  flag = flag & validate (email, ruleEmail);
  flag = flag & validate (address, ruleAddress);
  flag = flag & validate (phone, ruleNumber);
  flag = flag & validate (password, ruleMoreThan7);
  flag = flag & validatePasswordConfirm (password, passwordConfirm);

  if (!flag) { evt.preventDefault(); }
}

function makeRule (reg, str){

  this.regex = reg;
  this.error = str;
}

function makeInputElement (na, elem, errorElem){

  this.name = na;
  this.element = elem;
  this.errorElement = errorElem;
}

function validate (obj, rule){

  if (rule.regex.test(obj.element.value)){

    markAsCorrect(obj.errorElement);
    return true;
  }

  markAsError(rule.error, obj.errorElement);
  return false;
}

function markAsError (message, elem){

  elem.innerHTML = message;
  elem.style.color = "red";
  //elem.nextElementSibling.focus();
}

function markAsCorrect (elem){
  elem.style.color = "green";
}

function validatePasswordConfirm(password, password2) {
  // check for password to be the same.
  if(password.element.value === password2.element.value){
    markAsCorrect (password2.errorElement);
    return true;
  }
  markAsError(password2.errorElement, "La confirmacion de la contraseña debe ser igual a la contraseña.");
  return false;
}
