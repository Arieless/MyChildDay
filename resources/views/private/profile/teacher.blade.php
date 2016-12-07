@extends('layouts.home')
@section('title','MyChildDay')

@section('content')
  <div class="viewProfileContainerMain">
    <div class="profileHeader teacherColor">
      <div class="profilePicImgContainer">
        <img src="{{ asset($teacher->profilePicture) }}" alt="profilePic" >
      </div>
      <div class="profileName">

        <h3>{{ $teacher->firstName }} {{ Auth::user()->lastName }}</h3>
      </div>
    </div>
    <section class="dataSection">
      <h3>Datos</h3>
      <div class="infoContainer">
        <div class="dataItem"><p>Dirección:</p> {{ $teacher->address }}</div>
        <div class="dataItem"><p>Telefono:</p> {{ $teacher->phone }}</div>
        <div class="dataItem"><p>Email:</p> {{$teacher->email }}</div>
      </div>
      <h3>Aulas</h3>
      <div class="roomsContainer">
        @foreach ($rooms as $room)
        <div class="dataItem"><a href="/home/profile/rooms/{{$room->roomId}}/{{$room->roomName}}">{{$room->roomName}}</a></div>
        @endforeach
      </div>
    </section>
  </div>
@endsection
