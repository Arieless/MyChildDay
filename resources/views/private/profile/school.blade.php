@extends('layouts.home')
@section('title','MyChildDay')

@section('content')
  <div class="viewProfileContainerMain">
    <div class="profileHeader schoolColor">
      <div class="profilePicImgContainer">
        <img src="{{ asset(Auth::user()->profilePicture) }}" alt="profilePic" >
      </div>
      <div class="profileName">
        <h3>{{ Auth::user()->firstName }}</h3>
      </div>
    </div>
    <section class="dataSection">
      <h3>Info</h3>
      <div class="infoContainer">
        <div class="dataItem"><p>Dirección:</p> {{ Auth::user()->address }}</div>
        <div class="dataItem"><p>Telefono:</p> {{ Auth::user()->phone }}</div>
        <div class="dataItem"><p>Email:</p> {{ Auth::user()->email }}</div>
      </div>
      <h3>Aulas</h3>
      <div class="roomsContainer">
        <div class="dataItem">Aula1</div>
        <div class="dataItem">Aula2</div>
        <div class="dataItem">Aula3</div>
      </div>
    </section>
  </div>
@endsection
