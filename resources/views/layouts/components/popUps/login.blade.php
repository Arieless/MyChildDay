<div id="popUpContainerLogin" class="popUpContainer" style="display: {{ isset($display)? $display : 'none' }}">
  <img id="buttonCloseLogin" class="buttonClose" src="/images/icons/close.png" alt="cerrar" />
  <h4 class="popUpTitles">Inicie sesion</h4>
  <form id="loginForm" role="form" method="POST" action="{{ url('/login') }}">

    {{ csrf_field() }}

    <p class="inputError" id="loginEmailError">

    </p>
    <label for="loginEmail">Email:</label>
    <input id="loginEmail" type="email" placeholder="Ingrese su email" name="email" required>
    <label for="loginPassword">Contraseña:</label>
    <input id="loginPassword" type="password" placeholder="Ingrese su clave" name="password" required>
    <div class="rememberCheckbox" name="rememberMe">
      <input id="loginRememberMe" type="checkbox" checked="checked">
      <label for="loginRememberMe">Quiero que me recuerden mi contraseña.</label>
    </div>
    <div class="containerOptions">
      <p class="containerOptionsText">
        <span id="containerEmailResetText">¿Olvidaste tu contraseña?</span>
      </p>
      <p id="containerLoginRegisterText" class="containerOptionsText">
        <span>¿Aun no tienes cuenta? Regístrate</span>
      </p>
    </div>
    <button id="loginFormSubmit" type="submit" name="loginFormSubmit"><strong>Ingresar</strong></button>
  </form>
</div>
