@extends('layouts.home')
@section('title','MyChildDay - Editar perfil')


@section('content')

<div class="profileContainerBackgroundColor">
  <div class="profileContainerMain">
      <form class="userUpdateInfoForm" id="userUpdateInfoForm" role="form" method="POST" enctype="multipart/form-data" action="{{ url('home/profile/edit/user') }}">

      <section class="profileSection">
        <header class="profileTitles">
          <h3 class="main">Datos Personales</h3>
        </header>
        <article class="profileInputs">


          {{ csrf_field() }}

          <div class="inputContainer">
            <p class="inputError" id="firstNameError">

              @if (isset($errors))
                @if ($errors->has('firstName'))
                  @foreach ($errors->get('firstName') as $message)
                      {{ $message }} <br/>
                  @endforeach
                @endif
              @endif

            </p>
            <label for="firstName">Nombre</label>
            <img class="editImg" src="/images/icons/app/edit.svg">
            <input class="nonEditable" id="firstName" type="text" placeholder="Ingrese su nombres" name="firstName" value="{{ Auth::user()->firstName }}" readonly/>
          </div>

          <div class="inputContainer">
          <p class="inputError" id="lastNameError">

            @if (isset($errors))
              @if ($errors->has('lastName'))
                @foreach ($errors->get('lastName') as $message)
                    {{ $message }} <br/>
                @endforeach
              @endif
            @endif

          </p>
          <label for="lastName">Apellido</label>
          <img class="editImg" src="/images/icons/app/edit.svg">
          <input class="nonEditable" id="lastName" type="text" placeholder="Ingrese su apellido" name="lastName" value="{{ Auth::user()->lastName }}" readonly/ >
          </div>

          <div class="inputContainer">
            <p class="inputError" id="emailError">

              @if (isset($errors))
                @if ($errors->has('email'))
                  @foreach ($errors->get('email') as $message)
                      {{ $message }} <br/>
                  @endforeach
                @endif
              @endif

            </p>
            <label for="email">E-mail</label>
            <input class="nonEditable" type="email" id="email" placeholder="Ingrese su correo electronico" name="email" value="{{ Auth::user()->email }}" disabled/>
          </div>
          <div class="inputContainer">
            <p class="inputError" id="addressError">

              @if (isset($errors))
                @if ($errors->has('address'))
                  @foreach ($errors->get('address') as $message)
                      {{ $message }} <br/>
                  @endforeach
                @endif
              @endif

            </p>



            <label for="address">Domicilio</label>
            <img class="editImg" src="/images/icons/app/edit.svg">
            <input class="nonEditable" id="address" type="text" placeholder="Ingrese domicilio" name="address" value="{{ Auth::user()->address }}" readonly />
          </div>
          <div class="inputContainer">
            <p class="inputError" id="phoneError">

              @if (isset($errors))
                @if ($errors->has('phone'))
                  @foreach ($errors->get('phone') as $message)
                      {{ $message }} <br/>
                  @endforeach
                @endif
              @endif

            </p>
            <label for="phone">Telefono</label>
            <img class="editImg" src="/images/icons/app/edit.svg">
            <input class="nonEditable" id="phone" type="text" placeholder="Ingrese Teléfono de Contacto" name="phone" value="{{ Auth::user()->phone }}"  readonly />
          </div>


        </article>
      </section>

      <section class="profileSection">
        <header class="profileTitles">
          <h3 class="secondary">FOTO</h3>
        </header>
        <article class="profileInputs">


            <div class="profilePicImgContainer" id="profilePicImgContainer" onclick="$('#profilePicInput').click()">
              <img id="profilePicImg" src="{{ Auth::user()->profilePicture }}" alt="profilePic" >
            </div>
            <div id="fakeSelectFile" class="fakeSelectFile">Seleccione archivo</div>
            <input id="profilePicInput" type="file" class="profilePicInput">
        </article>
      </section>

      <section class="profileSection">
        <header class="profileTitles">
          <h3 class="secondary">CONTRASEÑA</h3>
        </header>
        <article class="profileInputs">

          <div class="inputContainer checkbox">
            <input class="checkbox" type="checkbox" id="change-password" name="change-password"/>
            <label class="checkbox" for="change-password">Quiero cambiar mi contraseña</label>
          </div>



          <div class="inputContainer newPassword">
            <div class="inputContainer">
              <p class="inputError" id="new-passwordError">

                @if (isset($errors))
                  @if ($errors->has('new-password'))
                    @foreach ($errors->get('new-password') as $message)
                        {{ $message }} <br/>
                    @endforeach
                  @endif
                @endif

              </p>
              <label for="new-password">Nueva contraseña:</label>
              <input type="password" id="new-password" placeholder="Ingrese su nueva contraseña" name="new-password"/>
            </div>

            <div class="inputContainer">
              <p class="inputError" id="password-confirmError">

                @if (isset($errors))
                  @if ($errors->has('new-password-confirm'))
                    @foreach ($errors->get('password-confirm') as $message)
                        {{ $message }} <br/>
                    @endforeach
                  @endif
                @endif

              </p>
              <label for="password-confirm">Verificacion de su <br/> nueva contraseña:</label>
              <input type="password" id="password-confirm" placeholder="Ingrese su nueva contraseña" name="new-password_confirmation" />
            </div>
          </div>


          <div class="inputContainer">
            <p class="inputError" id="passwordError">

              @if (isset($errors))
                @if ($errors->has('password'))
                  @foreach ($errors->get('password') as $message)
                      {{ $message }} <br/>
                  @endforeach
                @endif
              @endif

            </p>
            <label id="passwordLabel" for="password">Contraseña:</label>
            <input type="password" id="password" placeholder="Ingrese su contraseña" name="password" required/>
          </div>


        </article>
      </section>

      <div class="update">
          <button id="registerFormSubmit" type="submit" name="registerFormSubmit"><strong>ACTUALIZAR</strong></button>
      </div>

    </form>

  </div>
</div>



<!--  Show input to change password -->

<script type="text/javascript">

window.addEventListener('load', function (evt){

  document.getElementById('change-password').addEventListener('click', function (evt){
    if (evt.target.checked){
      document.querySelector('.profileContainerMain .profileInputs .inputContainer.newPassword').style.display ='block';
      document.getElementById('passwordLabel').innerText = 'Contraseña actual';
      document.getElementById('password').placeholder = 'Ingrese su contraseña actual';

    }else{
      document.querySelector('.profileContainerMain .profileInputs .inputContainer.newPassword').style.display ='none';
      document.querySelector('.profileContainerMain .profileInputs .inputContainer.newPassword input').value ="";

      document.getElementById('passwordLabel').innerText = 'Contraseña';
      document.getElementById('password').placeholder = 'Ingrese su contraseña';
    }
  });

});

</script>

<script type="text/javascript">

// HAY QUE TERMINAR DE ARREGLAR, DEBERIA GUARDAR EL VALOR POR DEFECTO DE ENTRADA,
// SI EL INPUT VUELVE A NOEDITABLE DEBERIA VOLVER AL VALOR POR DEFECTO,
// EN EDITABLE VUELVE AL VALOR QUE SE EDITO


window.addEventListener('load', function (evt) {
  var updateInfoInputs = document.querySelectorAll('form.userUpdateInfoForm .inputContainer img');

  updateInfoInputs.forEach (function (el){
    el.addEventListener('click', function(evt) {
      el.parentElement.childNodes.forEach(function(child){
        if(child.tagName == 'INPUT'){
          console.log (child);
          if (child.readOnly) {
            child.readOnly = false;
            child.classList.remove ('nonEditable');
          }else {
            child.readOnly = true;
            child.classList.add ('nonEditable');
          }

          child.focus();
        }
      });
    });
  });
});

</script>

<!--  Loading profile picture -->

<script>

window.addEventListener('load', function (evt){
  document.getElementById('fakeSelectFile').addEventListener('click', function (evt){
    document.getElementById('profilePicInput').click();
  });
});


window.addEventListener('load', function (evt) {

  var imageLoader = document.getElementById('profilePicInput');
      imageLoader.addEventListener('change', handleImage, false);

  function handleImage(e) {
      var reader = new FileReader();
      reader.onload = function (event) {
          $('#profilePicImgContainer img').attr('src',event.target.result);
      }
      reader.readAsDataURL(e.target.files[0]);
  }

  var dropImg = document.getElementById("profilePicImg");
  dropImg.addEventListener("dragenter", dragenter, false);
  dropImg.addEventListener("dragover", dragover, false);
  dropImg.addEventListener("drop", drop, false);

  function dragenter(e) {
    e.stopPropagation();
    e.preventDefault();
  }

  function dragover(e) {
    e.stopPropagation();
    e.preventDefault();
  }

  function drop(e) {
    e.stopPropagation();
    e.preventDefault();

    var dt = e.dataTransfer;
    var files = dt.files;

    imageLoader.files = files;
  }
});


</script>
