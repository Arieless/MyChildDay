@extends('layouts.home')
@section('title','MyChildDay')

@section('content')
<?php dd($room) ?>
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
      <h3>teachers</h3>
      <div class="infoContainer">
        <div class="dataItem">los teacher</div>
      </div>
      <h3>kids</h3>
      <div class="teachersContainer">
        <div class="dataItem">los kids</div>
      </div>
    </section>
  </div>
@endsection
