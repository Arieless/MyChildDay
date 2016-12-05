<header class="loggedBar parentColor">
  <nav class="loggedBarNav">

    <div class="navFlexContainer">
      <ul class="flexList spaceAround">
        <li class="logoItem">
            <a class="flexIconLink parentColor" href="{{ url('/home') }}">
              <img class="logo" src="/images/logoWhite.svg" alt="logotype" />
            </a>
        </li>
        <li>
          <ul class="flexList center">
            <li class="optionIcon">
              <a class="flexIconLink parentColor" href="{{ url('home/parent/feed') }}">
                <img src="/images/icons/app/feed.svg" alt="Ver noticias">
                <br/>Novedades
              </a>
            </li>
            <li class="optionIcon notActiveLink">
              <a class="flexIconLink parentColor" href="{{ url('home/parent/calendar') }}">
                <img src="/images/icons/app/calendar.svg" alt="Ver calendario">
                <br/>Eventos
              </a>
            </li>
            <li class="optionIcon notActiveLink">
              <a class="flexIconLink parentColor" href="{{ url('home/user/messages') }}">
                <img src="/images/icons/app/messages.svg" alt="Ver lista de mensajes">
                <br/>Mensajes
              </a>
            </li>
          </ul>
        </li>
        <li class="dropdown userPicture">
          <a class="flexIconLink parentColor">
            <img class="roundPicture userPicture" src="{{ asset(Auth::user()->profilePicture) }}" alt="Ver perfil">
            <br/>{{ strtolower(Auth::user()->firstName) }}
          </a>
          @include ('layouts.components.headers.components.profileDropdown', ['color' => 'parentColor'])
        </li>
      </ul>
    </div>

    </nav>
</header>
