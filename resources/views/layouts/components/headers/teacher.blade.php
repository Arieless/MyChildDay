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
            <li>
              <a class="flexIconLink teacherColor" href="{{ url('home/parent/feed') }}">
                <img src="/images/icons/app/feed.svg" alt="Ver noticias">
                <br/>Novedades
              </a>
            </li>
            <li>
              <a class="flexIconLink teacherColor" href="{{ url('home/school/students') }}">
                <img src="/images/icons/app/close.svg" alt="Ver estudiantes">
                <br/>Estudiantes
              </a>
            </li>
            <li>
              <a class="flexIconLink teacherColor" href="{{ url('home/user/calendar') }}">
                <img src="/images/icons/app/close.svg" alt="Ver calendario">
                <br/>Posteo
              </a>
            </li>
            <li>
              <a class="flexIconLink teacherColor" href="{{ url('home/user/calendar') }}">
                <img src="/images/icons/app/calendar.svg" alt="Ver calendario">
                <br/>Eventos
              </a>
            </li>
            <li>
              <a class="flexIconLink teacherColor" href="{{ url('home/user/messages') }}">
                <img src="/images/icons/app/messages.svg" alt="Ver lista de mensajes">
                <br/>Conversaciones
              </a>
            </li>
          </ul>
        </li>
        <li class="dropdown">
          <a class="flexIconLink teacherColor">
            <img class="userPicture roundPicture" src="{{ url('/images/users/avatars/default_avatar_'.rand(0,20)).'.svg' }}" alt="Ver perfil">
            <br/>{{ strtolower(Auth::user()->firstName) }}
          </a>
          @include ('layouts.components.headers.components.profileDropdown', ['color' => 'teacherColor'])
        </li>
      </ul>
    </div>

    </nav>



</header>
