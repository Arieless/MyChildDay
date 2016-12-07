@extends('layouts.home')
@section('title','MyChildDay')

@section('content')
  <div class="viewProfileContainerMain">
    <div class="profileHeader userColor">
      <div class="profilePicImgContainer">
        <img src="{{ asset($parent->profilePicture) }}" alt="Foto de perfíl" >
      </div>
      <div class="profileName">
        <h3>{{ $parent->firstName }} {{ $parent->lastName }}</h3>
      </div>
    </div>
    <section class="dataSection">
      <h3>Datos</h3>
      <div class="infoContainer">
        <div class="dataItem"><p>Dirección:</p> {{ $parent->address }}</div>
        <div class="dataItem"><p>Telefono:</p> {{ $parent->phone }}</div>
        <div class="dataItem"><p>Email:</p> {{ $parent->email }}</div>
      </div>
    </section>
  </div>
@endsection
