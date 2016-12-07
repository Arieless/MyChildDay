@extends('layouts.home')
@section('title','MyChildDay')

@section('content')
  <div class="viewProfileContainerMain">
    <div class="profileHeader kidColor">
      <div class="profilePicImgContainer">
        <img src="{{ asset($kid->profilePicture) }}" alt="profilePic" >
      </div>
      <div class="profileName">
        <h3>{{ $kid->firstName }} {{ $kid->lastName }}</h3>
      </div>
    </div>
    <section class="dataSection">
      <h3>Familiar</h3>
      <div class="dataItem">
        @foreach($parents as $parent)
        <div class="dataParent">
          <div class="dataImgContainer">
            <img src="{{ asset($parent->guardianPicture) }}" alt="parentPhoto">
          </div>
            <a href="/home/profile/parents/{{$parent->guardianId}}/{{$parent->guardianFirstName}}{{$parent->guardianLastName}}">{{ $parent->guardianFirstName }} {{ $parent->guardianLastName }}</a>
        </div>
        @endforeach
      <h3>Datos</h3>
      <div class="infoContainer">
        <div class="dataItem"><p>Descripcion:</p> {{ $kid->description }}</div>
        <div class="dataItem"><p>Cumpleaños:</p> {{ $kid->birthdate }}</div>
      </div>
      <h3>Aula</h3>
      <div class="roomsContainer">
        @foreach($inRoom as $room)
        <div class="dataItem">
          <a href="/home/profile/rooms/{{$room->id}}/{{$room->name}}">{{$room->name}}</a>
        </div>
        @endforeach
      </div>
    </section>
  </div>
@endsection
