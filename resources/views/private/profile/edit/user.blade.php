@extends('layouts.home')
@section('title','MyChildDay - Editar perfil')


@section('content')


<div class="profileContainerMain">
    <form class="userUpdateInfoForm" id="userUpdateInfoForm" role="form" method="POST" enctype="multipart/form-data" action="{{ url('/home/profile/edit/update') }}">

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
          <input id="firstName" type="text" placeholder="Ingrese su nombres" name="firstName" value="{{ Auth::user()->firstName }}" readonly/>
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
        <input id="lastName" type="text" placeholder="Ingrese su apellido" name="lastName" value="{{ Auth::user()->lastName }}" readonly/ >
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
          <input type="email" id="email" placeholder="Ingrese su correo electronico" name="email" value="{{ Auth::user()->email }}" readonly/>
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
          <input id="address" type="text" placeholder="Ingrese domicilio" name="address" value="{{ Auth::user()->address }}" readonly />
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
          <label for="phone">Telefono de contacto</label>
          <input id="phone" type="text" placeholder="Ingrese Teléfono de Contacto" name="phone" value="{{ Auth::user()->phone }}"  readonly />
        </div>


      </article>
    </section>

    <section class="profileSection">
      <header class="profileTitles">
        <h3 class="secondary">FOTO</h3>
      </header>
      <article class="profileInputs">
          <div class="profilePicImgContainer" id="profilePicImgContainer" onclick="$('#profilePicInput').click()">
            <img id="profilePicImg" src="/images/icons/profile_default.png" alt="profilePic" >
          </div>
          <label for="profilePic">Foto de Perfil</label>
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
          <input type="password" id="password" placeholder="Ingrese su contraseña" name="password" required/>
        </div>

        <div class="inputContainer">
          <p class="inputError" id="password-confirmError">

            @if (isset($errors))
              @if ($errors->has('password-confirm'))
                @foreach ($errors->get('password-confirm') as $message)
                    {{ $message }} <br/>
                @endforeach
              @endif
            @endif

          </p>
          <label for="password-confirm">Verificacion <br/>de contraseña:</label>
          <input type="password" id="password-confirm" placeholder="Ingrese su nueva contraseña" name="password-confirm" required/>
        </div>

        <button id="registerFormSubmit" type="submit" name="registerFormSubmit"><strong>ACTUALIZAR</strong></button>


      </article>
    </section>

  </form>

</div>

<script>

window.addEventListener('load', function (evt) {
  var updateInfoInputs = document.querySelectorAll('form.userUpdateInfoForm input');

  updateInfoInputs.forEach (function (el){
    el.addEventListener('click', function(evt) {
      if (el.readOnly) el.readOnly = false;
    });

  });

  document.getElementById('change-password').addEventListener('click', function (evt){
    if (evt.target.checked){
      document.querySelector('.profileContainerMain .profileInputs .inputContainer.newPassword').style.display ='block';
    }else{
      document.querySelector('.profileContainerMain .profileInputs .inputContainer.newPassword').style.display ='none';
      document.querySelector('.profileContainerMain .profileInputs .inputContainer.newPassword input').value ="";
    }
  });

  // FUNCION PARA IMAGE FILE

  var imageLoader = document.getElementById('profilePicInput');
      imageLoader.addEventListener('change', handleImage, false);
      // imageLoader.addEventListener('change', defaultImage, false);

  function handleImage(e) {
      var reader = new FileReader();
      reader.onload = function (event) {
          $('#profilePicImgContainer img').attr('src',event.target.result);
      }
      reader.readAsDataURL(e.target.files[0]);
  }

  // function defaultImage(e) {
  //   if (imageLoader === "") {
  //     reader.onload = function (event) {
  //         $('#profilePicImgContainer img').attr('src', event.target."/images/icons/profile_default.png");
  //     }
  //   }
  // }

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
