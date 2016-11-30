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

      <title>@yield('title')</title>
  </head>
  <body>
    <!-- HEADER -->
    @include('layouts.components.headers.school')

    <!-- POPUPS -->

    <!-- CONTENT -->
    @yield('content')
    <!-- FOOTER -->

    @include('layouts.components.footers.home')

  </body>
  </html>
