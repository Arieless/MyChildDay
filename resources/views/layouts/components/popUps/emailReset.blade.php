<div id="popUpContainerEmailReset" class="popUpContainer indexPopUp popUpReset" style="display: {{ isset($display)? $display : 'none' }}">
  <img id="buttonCloseEmailReset" class="buttonClose" src="/images/icons/close.png" alt="cerrar" />
  <h4 class="popUpTitles">Recuperar Contraseña</h4>
  <form id="emailResetForm" role="form" method="POST" action="{{ url('/password/email') }}">

    {{ csrf_field() }}

    <p class="inputError" id="loginEmailError">

      @if (isset($errors))
        @if ($errors->has('emailReset'))
          @foreach ($errors->get('emailReset') as $message)
              {{ $message }} <br/>
          @endforeach
        @endif
      @endif
    </p>

    <p class="inputSucces">
      @if (session('status'))
              {{ session('status') }}
      @endif
    </p>

    <label for="emailReset">Email:</label>

    <input id="emailReset" type="email" placeholder="Ingrese su email"  name="email" value="{{ old('email') }}" required />
    <div class="containerOptions">
      <p id="containerEmailResetText" class="containerOptionsInfo">
        <span>Te enviaremos un mail con un link para recuperar tu contraseña</span>
      </p>
    </div>
    <button id="resetFormSubmit" type="submit" name="resetFormSubmit"><strong>Recuperar contraseña</strong></button>
  </form>
</div>
