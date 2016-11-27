<header class="loggedBar parentColor">
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
            <a class="flexIconLink parentColor" href=" {{ url('/home') }}">
              <img class="logo" src="/images/logoWhite.svg" alt="logotype" />
            </a>
        </li>
        <li>
          <ul class="flexList center">
            <li>
              <a class="flexIconLink parentColor" href="{{ url('home/parent/feed') }}">
                <img src="/images/icons/app/feed.svg" alt="Ver noticias">
                <br/>Novedades
              </a>
            </li>
            <li>
              <a class="flexIconLink parentColor" href="{{ url('home/user/calendar') }}">
                <img src="/images/icons/app/calendar.svg" alt="Ver calendario">
                <br/>Eventos
              </a>
            </li>
            <li>
              <a class="flexIconLink parentColor" href="{{ url('home/parent/messages') }}">
                <img src="/images/icons/app/messages.svg" alt="Ver lista de mensajes">
                <br/>Mensajes privados
              </a>
              </li>
          </ul>
        </li>
        <li class="dropdown">
          <a class="flexIconLink parentColor">
            <img class="userPicture roundPicture" src="{{ url('/images/users/avatars/default_avatar_'.rand(1,2)).'.svg' }}" alt="Ver perfil">
            <br/>{{ strtolower(Auth::user()->firstName) }}
          </a>
          @include ('layouts.components.headers.components.profileDropdown', ['color' => 'parentColor'])
        </li>
      </ul>
    </div>

    </nav>



</header>
