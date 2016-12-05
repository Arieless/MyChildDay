<header class="loggedBar schoolColor">
  <nav class="loggedBarNav">

    <div class="navFlexContainer">
      <ul class="flexList spaceAround">
        <li class="logoItem">
            <a class="flexIconLink schoolColor" href="{{ url('/home') }}">
              <img class="logo" src="/images/logoWhite.svg" alt="logotype" />
            </a>
        </li>
        <li>
          <ul class="flexList center">
            <li class="optionIcon">
              <a class="flexIconLink schoolColor" href="{{ url('home/school/feed') }}">
                <img src="/images/icons/app/feed.svg" alt="Ver noticias">
                <br/>Novedades
              </a>
            </li>
            <li class="optionIcon">
              <a class="flexIconLink schoolColor" href="{{ url('home/school/rooms') }}">
                <img src="/images/icons/app/classroom.svg" alt="Ver aulas">
                <br/>Aulas
              </a>
            </li>
            <li class="optionIcon">
              <a class="flexIconLink schoolColor" href="{{ url('home/school/kids') }}">
                <img src="/images/icons/app/students.svg" alt="Ver estudiantes">
                <br/>Estudiantes
              </a>
            </li>
            <li class="optionIcon">
              <a class="flexIconLink schoolColor" href="{{ url('home/school/teachers') }}">
                <img src="/images/icons/app/teachers.svg" alt="Ver profesores">
                <br/>Profesores
              </a>
            </li>
            <li class="optionIcon ">
              <a class="flexIconLink schoolColor" href="{{ url('home/school/post') }}">
                <img src="/images/icons/app/post.svg" alt="Ver profesores">
                <br/>Posts
              </a>
            </li>
            <li class="optionIcon notActiveLink">
              <a class="flexIconLink schoolColor" href="{{ url('home/school/calendar') }}">
                <img src="/images/icons/app/calendar.svg" alt="Ver calendario">
                <br/>Eventos
              </a>
            </li>
            <li class="optionIcon notActiveLink">
              <a class="flexIconLink schoolColor" href="{{ url('home/user/messages') }}">
                <img src="/images/icons/app/messages.svg" alt="Ver lista de mensajes">
                <br/>Mensajes
              </a>
            </li>
          </ul>
        </li>
        <li class="dropdown userPicture">
          <a class="flexIconLink schoolColor">
            <img class="roundPicture userPicture" src="{{ asset(Auth::user()->profilePicture) }}" alt="Ver perfil">
            <br/>{{ strtolower(Auth::user()->firstName) }}
          </a>
          @include ('layouts.components.headers.components.profileDropdown', ['color' => 'schoolColor'])
        </li>
      </ul>
    </div>

    </nav>



</header>
