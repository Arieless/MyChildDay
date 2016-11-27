<header class="loggedBar neutralColor">
  <nav class="loggedBarNav">
    <a href=" {{ url('/home') }}">
      <img class="logo logoHome" src="/images/logo.svg" alt="logotype" />
    </a>
    <div class="navFlexContainer" style="width: auto; float: right;">
      <ul class="flexList spaceAround">
        <li class="dropdown">
          <a class="flexIconLink neutralColor">
            <img class="userPicture roundPicture" src="{{ url('/images/users/avatars/default_avatar_'.rand(1,2)).'.svg' }}" alt="Ver lista de mensajes">
            <br/>{{ strtolower(Auth::user()->firstName) }}
          </a>
          @include ('layouts.components.headers.components.profileDropdown', ['color' => 'neutralColor'])
        </li>
      </ul>
    </div>
  </nav>
</header>
