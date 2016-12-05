@extends('layouts.home')
@section('title','MyChildDay')

@section('content')
  <div class="viewProfileContainerMain">
    <div class="profileHeader teacherColor">
      <div class="profilePicImgContainer">
        <img src="{{ asset(Auth::user()->profilePicture) }}" alt="profilePic" >
      </div>
      <div class="profileName">
        <h3>nombre de aula</h3>
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
