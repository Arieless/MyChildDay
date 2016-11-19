<div id="popUpContainerBackground" class="popUpContainerBackground" style="display:'block':'none'">
</div>
<div id="popUpContainerRegister" class="popUpContainer" style="display:'block':'none'">
  <img id="buttonCloseRegister" class="buttonClose" src="images/icons/close.png" alt="cerrar" />
  <h4 class="popUpTitles">Ingrese sus datos para registrarse</h4>
  <form id="registerForm" method="post">
    <p class="inputError" id="userNameError"></p>
    <label for="userName">Nombres:</label>
    <input id="userName" type="text" placeholder="Ingrese su nombres" name="userName" value="" required/>
    <p class="inputError" id="userLastNameError"></p>
    <label for="userLastName">Apellido:</label>
    <input id="userLastName" type="text" placeholder="Ingrese su apellido" name="userLastName" value="" required/ >
    <p class="inputError" id="emailError"></p>
    <label for="email">E-mail:</label>
    <input type="email" id="email" placeholder="Ingrese su correo electronico" name="email" value="" required/>
    <p class="inputError" id="addressError"></p>
    <label for="address">Domicilio:</label>
    <input id="address" type="text" placeholder="Ingrese domicilio" name="address" value="" required/>
    <p class="inputError" id="phoneError"></p>
    <label for="phone">Telefono de contacto:</label>
    <input id="phone" type="text" placeholder="Ingrese Teléfono de Contacto" name="phone" value="" required/>
    <p class="inputError" id="passwordError"></p>
    <label for="password">Contraseña:</label>
    <input type="password" id="password" placeholder="Ingrese su contraseña" name="password" required>
    <p class="inputError" id="passwordConfirmError"></p>
    <label for="passwordConfirm">Verificacion de contraseña:</label>
    <input type="password" id="passwordConfirm" placeholder="Ingrese su contraseña nuevamente" name="passwordConfirm" required>
    <div class="containerOptions">
      <p id="containerRegisterLoginText" class="containerOptionsText">Inicie sesion si ya se encuentra registrado</p>
    </div>
    <button id="registerFormSubmit" type="submit" name="registerFormSubmit"><strong>REGISTRARME</strong></button>
  </form>
</div>

<div id="popUpContainerLogin" class="popUpContainer" style="display:'block':'none'">
  <img id="buttonCloseLogin" class="buttonClose" src="images/icons/close.png" alt="cerrar" />
  <h4 class="popUpTitles">Inicie sesion</h4>
  <form id="loginForm" method="post">
    <p class="inputError" id="loginEmailError"></p>
    <label for="loginEmail">Email:</label>
    <input id="loginEmail" type="email" placeholder="Ingrese su email" name="loginEmail" required>
    <label for="loginPassword">Contraseña:</label>
    <input id="loginPassword" type="password" placeholder="Ingrese su clave" name="loginPassword" required>
    <div class="rememberCheckbox" name="rememberMe">
      <input id="loginRememberMe" type="checkbox" checked="checked">
      <label for="loginRememberMe">Quiero que me recuerden mi contraseña.</label>
    </div>
    <div class="containerOptions">
      <p class="containerOptionsText">
        <span>¿Olvidaste tu contraseña?</span>
      </p>
      <p id="containerLoginRegisterText" class="containerOptionsText">
        <span>¿Aun no tienes cuenta? Regístrate</span>
      </p>
    </div>
    <button id="loginFormSubmit" type="submit" name="loginFormSubmit"><strong>Ingresar</strong></button>
  </form>
</div>
