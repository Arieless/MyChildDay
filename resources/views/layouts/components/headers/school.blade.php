<header class="loggedBar schoolColor">
  <nav class="loggedBarNav">

    {{-- Ver si implementar...

    @if (user()->hasChildren)
    <ul>
      @foreach (user()->getChildren as children)
      <li><img class="childrenPicture roundPicture" src="{{ children->picture }}" alt=""></li>
      @endforeach
    </ul>
    --}}

    <div class="navFlexContainer">
      <ul class="flexList spaceAround">
        <li class="logoItem">
            <a class="flexIconLink schoolColor" href=" {{ url('/home') }}">
              <img class="logo" src="/images/logoWhite.svg" alt="logotype" />
            </a>
        </li>
        <li>
          <ul class="flexList center">
            <li>
              <a class="flexIconLink schoolColor" href="{{ url('home/school/feed') }}">
                <img src="/images/icons/app/feed.svg" alt="Ver noticias">
                <br/>Novedades
              </a>
            </li>
            <li>
              <a class="flexIconLink schoolColor" href="{{ url('home/school/rooms') }}">
                <img src="/images/icons/app/classroom.svg" alt="Ver aulas">
                <br/>Aulas
              </a>
            </li>
            <li>
              <a class="flexIconLink schoolColor" href="{{ url('home/school/students') }}">
                <img src="/images/icons/app/close.svg" alt="Ver estudiantes">
                <br/>Estudiantes
              </a>
            </li>
            <li>
              <a class="flexIconLink schoolColor" href="{{ url('home/school/students') }}">
                <img src="/images/icons/app/close.svg" alt="Ver profesores">
                <br/>Profesores
              </a>
            </li>
            <li>
              <a class="flexIconLink schoolColor" href="{{ url('home/school/calendar') }}">
                <img src="/images/icons/app/calendar.svg" alt="Ver calendario">
                <br/>Eventos
              </a>
            </li>
            <li>
              <a class="flexIconLink schoolColor" href="{{ url('home/user/messages') }}">
                <img src="/images/icons/app/messages.svg" alt="Ver lista de mensajes">
                <br/>Mensajes
              </a>
              </li>
          </ul>
        </li>
        <li class="dropdown">
          <a class="flexIconLink schoolColor">
            <img class="userPicture roundPicture" src="{{ Auth::user()->profilePicture  }}" alt="Ver perfil">
            <br/>{{ strtolower(Auth::user()->firstName) }}
          </a>
          @include ('layouts.components.headers.components.profileDropdown', ['color' => 'schoolColor'])
        </li>
      </ul>
    </div>

    </nav>



</header>
