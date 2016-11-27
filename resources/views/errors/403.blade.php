@extends('layouts.error')

@section('title','MyChildDay - 404')

@section('content')

<div style="padding-top: 20vh;" class="">
  <img class="errorsImgLogo" src="/images/logo.svg" alt="">
  <h1 class="errorsTitle errorsText">UUPS! </h1>
  <br/>
  <h4 class="errorsMessage errorsText">Parece que que no tienes permiso para acceder aqui, lo sentimos!</h4>
</div>


<button id="buttongoback" onClick="goBack()">Volver</button>

  <script>

  function goBack() {
      window.history.back();
  }

  </script>

@endsection
