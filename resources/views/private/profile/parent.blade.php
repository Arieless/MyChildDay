@extends('layouts.home')
@section('title','MyChildDay')

@section('content')
  <div class="viewProfileContainerMain">
    <div class="profileHeader userColor">
      <div class="profilePicImgContainer">
        <img src="{{ asset(Auth::user()->profilePicture) }}" alt="profilePic" >
      </div>
      <div class="profileName">
        <h3>{{ Auth::user()->firstName }} {{ Auth::user()->lastName }}</h3>
      </div>
    </div>
    <section class="dataSection">
      <h3>Datos</h3>
      <div class="infoContainer">
        <div class="dataItem"><p>Dirección:</p> {{ Auth::user()->address }}</div>
        <div class="dataItem"><p>Telefono:</p> {{ Auth::user()->phone }}</div>
        <div class="dataItem"><p>Email:</p> {{ Auth::user()->email }}</div>
      </div>
    </section>
  </div>
@endsection
