<div id="popUpContainerRegister" class="popUpContainer" style="display: {{ isset($display)? $display : 'none' }}" >
  <img id="buttonCloseRegister" class="buttonClose" src="images/icons/close.png" alt="cerrar" />
  <h4 class="popUpTitles">Ingrese sus datos para registrarse</h4>
  <form id="registerForm" role="form" method="POST" action="{{ url('/register') }}">

    {{ csrf_field() }}

    <p class="inputError" id="first-nameError">

      @if (isset($errors))
        @if ($errors->has('first-name'))
          @foreach ($errors->get('first-name') as $message)
              {{ $message }} <br/>
          @endforeach
        @endif
      @endif

    </p>
    <label for="first-name">Nombres:</label>
    <input id="first-name" type="text" placeholder="Ingrese su nombres" name="first-name" value="{{ old('first-name') }}" required/>
    <p class="inputError" id="last-nameError">

    @if (isset($errors))
      @if ($errors->has('last-name'))
        @foreach ($errors->get('last-name') as $message)
            {{ $message }} <br/>
        @endforeach
      @endif
    @endif

    </p>
    <label for="last-name">Apellido:</label>
    <input id="last-name" type="text" placeholder="Ingrese su apellido" name="last-name" value="{{ old('last-name') }}" required/ >
    <p class="inputError" id="emailError">

    @if (isset($errors))
      @if ($errors->has('email'))
        @foreach ($errors->get('email') as $message)
            {{ $message }} <br/>
        @endforeach
      @endif
    @endif

    </p>
    <label for="email">E-mail:</label>
    <input type="email" id="email" placeholder="Ingrese su correo electronico" name="email" value="{{ old('email') }}" required/>
    <p class="inputError" id="addressError">

    @if (isset($errors))
      @if ($errors->has('address'))
        @foreach ($errors->get('address') as $message)
            {{ $message }} <br/>
        @endforeach
      @endif
    @endif

    </p>
    <label for="address">Domicilio:</label>
    <input id="address" type="text" placeholder="Ingrese domicilio" name="address" value="{{ old('address') }}" required/>
    <p class="inputError" id="phoneError">

    @if (isset($errors))
      @if ($errors->has('phone'))
        @foreach ($errors->get('phone') as $message)
            {{ $message }} <br/>
        @endforeach
      @endif
    @endif

    </p>
    <label for="phone">Telefono de contacto:</label>
    <input id="phone" type="text" placeholder="Ingrese Teléfono de Contacto" name="phone" value="{{ old('phone') }}"  required/>
    <p class="inputError" id="passwordError">

    @if (isset($errors))
      @if ($errors->has('password'))
        @foreach ($errors->get('password') as $message)
            {{ $message }} <br/>
        @endforeach
      @endif
    @endif

    </p>
    <label for="password">Contraseña:</label>
    <input type="password" id="password" placeholder="Ingrese su contraseña" name="password" required>
    <p class="inputError" id="password-confirmError">

    @if (isset($errors))
      @if ($errors->has('password-confirm'))
        @foreach ($errors->get('password-confirm') as $message)
            {{ $message }} <br/>
        @endforeach
      @endif
    @endif

    </p>
    <label for="password-confirm">Verificacion de contraseña:</label>
    <input type="password" id="password-confirm" placeholder="Ingrese su contraseña nuevamente" name="password_confirmation" required>
    <div class="containerOptions">
      <p id="containerRegisterLoginText" class="containerOptionsText">Inicie sesion si ya se encuentra registrado</p>
    </div>
    <button id="registerFormSubmit" type="submit" name="registerFormSubmit"><strong>REGISTRARME</strong></button>
  </form>
</div>
