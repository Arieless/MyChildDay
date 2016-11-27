<header class="mainBar">
  <nav class="mainBarNav">
    <a href=" {{ url('/home') }}">
      <img class="logo" src="/images/logo.svg" alt="logotype" />
    </a>
    {{--
    @if (Auth::user()->logAsParent() && user()->hasChildren)
    <ul>
      @foreach (user()->getChildren as children)
      <li><img src="{{children->picture}}" alt=""></li>
      @endforeach
    </ul>
    --}}
    <ul class="list">

    {{--

      @if (Auth::user()->logAsParent())
      <li><a href=""><img src="/images/icons/children.svg" alt="">B</a></li>
      <li><a href="">A</a></li>
      @endif
      @if (Auth::user()->logAsTeacher())
      @endif
      @if (Auth::user()->logAsSchool())
      @endif

    --}}

      <li class="dropdown">
        <span class="userName">{{ strtolower(Auth::user()->firstName) }}</span> <img class="dropImg" src=" {{ url('users/avatars/') }}" alt=""> {{-- Auth::user()->picture --}}
        <ul class="dropdown-content">
          <li id='logoutButton' class="navButton dropdownLink">
            <a class="navButton" href=#>
              <img src="/images/icons/closessesion.svg" alt="">
              <h5>Cerrar sesion</h5>
            </a>
          </li>
          <li class="navButton dropdownLink">
            <a class="navButton" href="{{ url('/home/profile/edit/user') }}">
            <!-- <a class="navButton" href="{{ url('/home/profile/edit/school') }}"> -->
              <img src="/images/icons/profile.svg" alt="">
              <h5>Perfil Personal</h5>
            </a>
          </li>

          {{--
            @if (Auth::user()->hasChildren())
            <li class="navButton dropdownLink">
              <a class="navButton" href="{{ url('/home/profile/edit/children') }}">
                <img src="/images/icons/profile.svg" alt="">
                <h5>Perfil Escuela</h5>
              </a>
            </li>
            @endif
          --}}

          {{--
            @if (Auth::user()->rolSchool)
            <li class="navButton dropdownLink">
              <a class="navButton" href="{{ url('/home/profile/edit/school') }}">
                <img src="/images/icons/profile.svg" alt="">
                <h5>Perfil Escuela</h5>
              </a>
            </li>
            @endif
          --}}

        </ul>
      </li>
    </ul>

  </nav>

  <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
      {{ csrf_field() }}
  </form>

  <script type="text/javascript">
    window.addEventListener('load', function (){
      document.getElementById('logoutButton').addEventListener('click', function(evt){
         evt.preventDefault();
         document.getElementById('logout-form').submit();
      })
    });
  </script>

</header>
