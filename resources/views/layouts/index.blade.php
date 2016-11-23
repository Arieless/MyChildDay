<!DOCTYPE html>
<html>
  <head>
      <link rel="icon" type="img/ico" href="/images/icons/mychildday.ico">
      <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet">
      <meta charset="utf-8">

      <meta name="viewport" content="width=device-width, initial-scale=1">

      <link rel="stylesheet" type="text/css" href="/css/reset.css">
      <link rel="stylesheet" type="text/css" href="/css/style_index.css">
      <link rel="stylesheet" type="text/css" href="/css/style_faq.css">
      <link rel="stylesheet" type="text/css" href="/css/style_popup.css">

      <script src="/js/offpage.js" charset="utf-8"></script>

      <title>@yield('title')</title>
  </head>
  <body>

    <!-- HEADER -->
    @include('layouts.components.headers.notLogged')
    <!-- REG/OLG -->

    @if ($displayReg || $displayLog || $displayEmailReset || $displayPassReset)
      <div id="popUpContainerBackground" class="popUpContainerBackground" style="display: block"> </div>
    @else
      <div id="popUpContainerBackground" class="popUpContainerBackground" style="display: none"> </div>
    @endif

    @include ('layouts.components.popUps.register', ['display' => $displayReg])
    @include ('layouts.components.popUps.login', ['display' => $displayLog,])
    @include ('layouts.components.popUps.emailReset', ['display' => $displayEmailReset,])
    @include ('layouts.components.popUps.passwordReset', ['display' => $displayPassReset,])
    <!-- CONTENT -->
    @yield('content')
    <!-- FOOTER -->
    @include('layouts.components.footers.notLogged')

  </body>
  </html>
