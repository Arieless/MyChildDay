<header class="mainBar">
  <nav class="mainBarNav">
    <a href="index.php">
      <img class="logo" src="/images/logo.svg" alt="logotype" />
    </a>


    {{--

      @if (Auth::user()->logAsParent())
      <ul class="list">
        <li><a href="{{ url('/login') }}">Login</a></li>
        <li><a href="{{ url('/register') }}">Register</a></li>
      </ul>
      @endif

      @if (Auth::user()->logAsSchool())

      @endif


      @if (Auth::user()->logAsSchool())

      @endif


    --}}



        <div class="dropdown">
          <img class="dropImg" src=" {{ url('users/avatars/'.Auth::user()->id) }}" alt="">
          <ul class="list dropdown-content">
            <li class="navButton"><a class="navButton" href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><h3>LOGOUT</h3></a></li>
            <li class="navButton"><a class="navButton" href="{{ url('/home/profile') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><h3>ENTRAR</h3></a></li>
          </ul>
        </div>


  </nav>

  <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
      {{ csrf_field() }}
  </form>

</header>
