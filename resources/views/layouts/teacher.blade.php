<!DOCTYPE html>
<html>
  <head>
      <link rel="icon" type="img/ico" href="/images/icons/mychildday.ico">
      <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet">
      <meta charset="utf-8">

      <meta name="viewport" content="width=device-width, initial-scale=1">

      <link rel="stylesheet" type="text/css" href="/css/reset.css">
      <link rel="stylesheet" type="text/css" href="/css/style_general.css">

      <link rel="stylesheet" type="text/css" href="/css/style_loggedBar.css">
      <link rel="stylesheet" type="text/css" href="/css/style_loggedBar_dropdown.css">
      <link rel="stylesheet" type="text/css" href="/css/style_footerLogged.css">

      <link rel="stylesheet" type="text/css" href="/css/style_feed.css">
      <link rel="stylesheet" type="text/css" href="/css/style_popup.css">

      <title>@yield('title')</title>
  </head>
  <body>
    <!-- HEADER -->
    @include('layouts.components.headers.teacher')


@if(isset($displayPost))
    <!-- POPUPS -->
    @if ($displayPost))
      <div id="popUpContainerBackground" class="popUpContainerBackground" style="display: block">
    @else
      <div id="popUpContainerBackground" class="popUpContainerBackground" style="display: none">
    @endif

        <!-- REG -->
        @include ('layouts.components.popUps.post', (isset($displayPost) && $displayPost)? ['display' => 'block'] : ['display' => 'none'])
        <!-- LOG -->

      </div>
@endif


    <!-- CONTENT -->
    @yield('content')
    <!-- FOOTER -->

    @include('layouts.components.footers.home')



  </body>


  <script type="text/javascript">

  window.addEventListener('load', function () {
    var buttonsClose = document.querySelectorAll('.buttonClose');

    for (var button in buttonsClose){

      buttonsClose[button].onclick = function () {
        document.getElementById('popUpContainerBackground').style.display = 'none';
        closeAllPopUpsContainers();
      };
    };
  });

  window.addEventListener('load', function () {

    document.getElementById('popUpContainerBackground').addEventListener('click', function (evt){

      var bg = document.getElementById('popUpContainerBackground');
      if (evt.target == bg){
        bg.style.display = 'none';
        closeAllPopUpsContainers();
      }

    });
  });

  function closeAllPopUpsContainers(){

    var popUpContainers = document.querySelectorAll('.popUpContainer');

    popUpContainers.forEach (function (el){
      el.style.display = 'none';
    });

  }

  </script>

  </html>
