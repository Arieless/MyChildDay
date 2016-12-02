<header class="loggedBar teacherColor">
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
            <a class="flexIconLink teacherColor" href=" {{ url('/home') }}">
              <img class="logo" src="/images/logoWhite.svg" alt="logotype" />
            </a>
        </li>
        <li>
          <ul class="flexList center">
            <li class="optionIcon">
              <a class="flexIconLink teacherColor" href="{{ url('home/teacher/feed') }}">
                <img src="/images/icons/app/feed.svg" alt="Ver noticias">
                <br/>Novedades
              </a>
            </li>
            <li class="optionIcon">
              <a class="flexIconLink teacherColor" href="{{ url('home/teacher/students') }}">
                <img src="/images/icons/app/students.svg" alt="Ver estudiantes">
                <br/>Estudiantes
              </a>
            </li>
            {{-- @if (user()->hasRooms()) --}}
            <li class="optionIcon" id="popUpButtonPost">
              <a class="flexIconLink teacherColor" href="{{ url('home/teacher/post') }}">
                <img src="/images/icons/app/post.svg" alt="Hacer un nuevo post">
                <br/>Posteo
              </a>
            </li>
            <li class="optionIcon">
              <a class="flexIconLink teacherColor" href="{{ url('home/teacher/calendar') }}">
                <img src="/images/icons/app/calendar.svg" alt="Ver calendario">
                <br/>Eventos
              </a>
            </li>
            <li class="optionIcon">
              <a class="flexIconLink teacherColor" href="{{ url('home/user/messages') }}">
                <img src="/images/icons/app/messages.svg" alt="Ver lista de mensajes">
                <br/>Conversaciones
              </a>
            </li>
          </ul>
        </li>
        <li class="dropdown userPicture">
          <a class="flexIconLink teacherColor">
            <img class="roundPicture userPicture" src="{{ asset(Auth::user()->profilePicture) }}" alt="Ver perfil">
            <br/>{{ strtolower(Auth::user()->firstName) }}
          </a>
          @include ('layouts.components.headers.components.profileDropdown', ['color' => 'teacherColor'])
        </li>
      </ul>
    </div>

    </nav>


</header>
