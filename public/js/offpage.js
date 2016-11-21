
var popUpContainerBackground;
var toHide;

//var faqQuestions;
//var faqAnswers;
//var faqImgs;

var ruleMoreThan7 = new makeRule (/^(?=.*\d)(?=.*[a-zA-Z])[0-9a-zA-Z]{7,}$/, "Por favor ingresa más de 7 digitos que tengan al menos una letra y un numero.");
var ruleNotEmpty = new makeRule(/^[\s]*$/, "No puede estar vacio, ni ser solo espacios en blanco");
var ruleEmail = new makeRule(/^(?:[^<>()[\].,;:\s@"]+(\.[^<>()[\].,;:\s@"]+)*|"[^\n"]+")@(?:[^<>()[\].,;:\s@"]+\.)+[^<>()[\]\.,;:\s@"]{2,63}$/i, "Email no valido.");
var ruleText = new makeRule (/^[a-zA-Z\s]{2,}$/, "Solo puede contener letras");
var ruleAddress = new makeRule(/^\s*\S+(?:\s+\S+)/, "Ingrese un nombre de calle y su altura.");
var ruleNumber = new  makeRule(/^\d{1,45}$/, "Solo puede contener numeros");

var canClose = true; // This is an ultra super hack, i didnt have enough time to make it right...

window.onload = function () {
  // pop ups
  popUpContainerBackground = document.getElementById('popUpContainerBackground');
  popUpContainerLogin = document.getElementById('popUpContainerLogin');
  popUpContainerRegister = document.getElementById('popUpContainerRegister');

  // elements to hide in resolutions less than 1280 so it looks like a new page
  toHide = document.getElementsByClassName('toHide');

  // close on login buttonClose click
  document.getElementById('buttonCloseLogin').onclick = popUpClose;
  // close on register buttonClose click
  document.getElementById('buttonCloseRegister').onclick = popUpClose;

  // pop up on button register click
  document.getElementById('containerLoginRegisterText').onclick = popUpRegister;
  // pop up on button login click
  document.getElementById('containerRegisterLoginText').onclick = popUpLogin;

  popUpContainerLogin.onclick = function () {
    canClose = false;
  };

  popUpContainerRegister.onclick = function (){
    canClose = false;
  };

  // close popups on key escape down
  window.onkeydown = popUpEscapeClose;
  // close pop ups on background click
  popUpContainerBackground.onclick = popUpClickClose;
  // pops register form
  document.getElementById('popUpButtonRegister').onclick = popUpRegister;
  // pops login form
  document.getElementById('popUpButtonLogIn').onclick = popUpLogin;


  // validate register form
  document.getElementById('registerForm').addEventListener('submit', formValidation);
  // validate login form
  document.getElementById('loginForm').addEventListener('submit', loginValidation);

};

function popUpClose (){

  popUpContainerLogin.style.display = "none";
  popUpContainerBackground.style.display = "none";
  popUpContainerRegister.style.display = "none";

}

function popUpLogin(){

  popUpContainerLogin.style.display = "block";
  popUpContainerBackground.style.display = "block";
  popUpContainerRegister.style.display = "none";

  hideTheRest(true);

}

function popUpRegister () {

  popUpContainerRegister.style.display = "block";
  popUpContainerBackground.style.display = "block";
  popUpContainerLogin.style.display = "none";

  hideTheRest(true);

}

function popUpClickClose () {

    if (canClose){
      popUpContainerBackground.style.display = "none";
      popUpContainerLogin.style.display = "none";
      popUpContainerRegister.style.display = "none";
    }

    canClose = true;
}

function popUpEscapeClose (ev){

    if(ev.keyCode==27){
      popUpContainerBackground.style.display = "none";
      popUpContainerLogin.style.display = "none";
      popUpContainerRegister.style.display = "none";

      hideTheRest(false);
    }
}

function hideTheRest (bool){

  if (getWidth() < 1280){ // WARNING THIS SHOULD BE THE SAME AS THE QUERYS OF THE CSS

    console.log (toHide);
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
