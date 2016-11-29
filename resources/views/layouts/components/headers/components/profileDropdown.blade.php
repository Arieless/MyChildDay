  <ul class="dropdown-content {{isset($color)? $color:""}}" id="userProfileDropDownContent">
    <li class="navButton dropdownLink {{isset($color)? $color:""}}" >
      <a class="navButton" href="{{ url('/home/profile/edit/user') }}">
        <img src="/images/icons/app/profile.svg" alt="">
        <h5>Perfil</h5>
      </a>
    </li>
    <li id='logoutButton' class="navButton {{isset($color)? $color:""}}">
      <a class="navButton" href=#>
        <img src="/images/icons/app/close.svg" alt="">
        <h5>Cerrar sesion</h5>
      </a>
    </li>
    @if (Auth::user()->parentRol)
    <li class="navButton {{isset($color)? $color:""}}">
      <a class="navButton" href="{{ url('/home/profile/edit/children') }}">
        <img src="/images/icons/app/children.svg" alt="">
        <h5>Chicos</h5>
      </a>
    </li>
    @endif
    @if (Auth::user()->schoolRol)
    <li class="navButton {{isset($color)? $color:""}}">
      <a class="navButton" href="{{ url('/home/profile/edit/school') }}">
        <img src="/images/icons/app/school.svg" alt="">
        <h5>Perfil Escuela</h5>
      </a>
    </li>
    @endif
  </ul>

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

  window.addEventListener('load', function (evt) {
    document.getElementById('userProfileDropDownContent').parentElement.addEventListener('click', function () {

      var userProfileDropDownContent = document.getElementById('userProfileDropDownContent');

        if (userProfileDropDownContent.style.display !== 'block'){
          userProfileDropDownContent.style.display = 'block';
        }else{
          userProfileDropDownContent.style.display = 'none';
        }
    });
  });

</script>
