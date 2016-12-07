@extends('layouts.home')
@section('title','MyChildDay')

@section('content')
  <div class="viewProfileContainerMain">
    <div class="profileHeader teacherColor">
      <div class="profilePicImgContainer">
        <img src="{{ asset($room->profilePicture) }}" alt="profilePic" >
      </div>
      <div class="profileName">
        <h3>{{$room->name}}</h3>
      </div>
    </div>
    <section class="dataSection">
      <h3>Responsable de aula</h3>
      @foreach($teachers as $teacher)
      <div class="infoContainer">
        <div class="dataItem"><a href="/home/profile/teachers/{{$teacher->teacherId}}/{{$teacher->teacherFirstName}}{{$teacher->teacherLastName}}">{{$teacher->teacherFirstName}} {{$teacher->teacherLastName}}</a></div>
      </div>
      @endforeach
      <h3>Infantes</h3>
      @foreach($kids as $kid)
      <div class="teachersContainer">
        <div class="dataItem"><a href="/home/profile/kids/{{$kid->id}}/{{$kid->firstName}}{{$kid->lastName}}">{{$kid->firstName}} {{$kid->lastName}}</a></div>
      </div>
      @endforeach
    </section>
  </div>
@endsection
