@extends('layouts.home')
@section('title','MyChildDay')

@section('content')
<div class="listRoomsContainerMain">
  <h3>Aulas</h3>
  <div class="listImgContainer">
    <div class="dataRoom">
      <div class="roomImgContainer">
        <img src="{{ asset(Auth::user()->profilePicture) }}" alt="parentPhoto">
      </div>
        <a href="#">{{ Auth::user()->firstName }} {{ Auth::user()->lastName }}</a>
    </div>
    <div class="dataRoom">
      <div class="roomImgContainer">
        <img src="{{ asset(Auth::user()->profilePicture) }}" alt="parentPhoto">
      </div>
        <a href="#">{{ Auth::user()->firstName }} {{ Auth::user()->lastName }}</a>
    </div>
    <div class="dataRoom">
      <div class="roomImgContainer">
        <img src="{{ asset(Auth::user()->profilePicture) }}" alt="parentPhoto">
      </div>
        <a href="#">{{ Auth::user()->firstName }} {{ Auth::user()->lastName }}</a>
    </div>
    <div class="dataRoom">
      <div class="roomImgContainer">
        <img src="{{ asset(Auth::user()->profilePicture) }}" alt="parentPhoto">
      </div>
        <a href="#">{{ Auth::user()->firstName }} {{ Auth::user()->lastName }}</a>
    </div>
    <div class="dataRoom">
      <div class="roomImgContainer">
        <img src="{{ asset(Auth::user()->profilePicture) }}" alt="parentPhoto">
      </div>
        <a href="#">{{ Auth::user()->firstName }} {{ Auth::user()->lastName }}</a>
    </div>
    <div class="dataRoom">
      <div class="roomImgContainer">
        <img src="{{ asset(Auth::user()->profilePicture) }}" alt="parentPhoto">
      </div>
        <a href="#">{{ Auth::user()->firstName }} {{ Auth::user()->lastName }}</a>
    </div>
    <div class="dataRoom">
      <div class="roomImgContainer">
        <img src="{{ asset(Auth::user()->profilePicture) }}" alt="parentPhoto">
      </div>
        <a href="#">{{ Auth::user()->firstName }} {{ Auth::user()->lastName }}</a>
    </div>
  </div>
</div>
@endsection
