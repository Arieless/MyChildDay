<div id="popUpContainerEmailReset" class="popUpContainer" style="display: {{ isset($display)? $display : 'none' }}">
  <img id="buttonCloseEmailReset" class="buttonClose" src="/images/icons/close.png" alt="cerrar" />
  <h4 class="popUpTitles">Recuperar Contraseña</h4>
  <form id="emailResetForm" role="form" method="POST" action="{{ url('/password/email') }}">

    {{ csrf_field() }}



    <p class="inputError" id="loginEmailError">

      @if (isset($errors))
        @if ($errors->has('email'))
          @foreach ($errors->get('email') as $message)
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


    <label for="resetEmail">Email:</label>
    <input id="resetEmail" type="email" placeholder="Ingrese su email" name="email" required>
    <button id="resetFormSubmit" type="submit" name="resetFormSubmit" style="
    float: right;"><strong>Recuperar contraseña</strong></button>
  </form>
</div>
