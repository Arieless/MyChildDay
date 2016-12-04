@extends('layouts.home')
@section('title','MyChildDay')

@section('content')
<div class="listKidsContainerMain">
  <h3>Niños</h3>
  <div class="listImgContainer">
    <div class="datakid">
      <div class="kidImgContainer">
        <img src="{{ asset(Auth::user()->profilePicture) }}" alt="parentPhoto">
      </div>
        <a href="#">{{ Auth::user()->firstName }} {{ Auth::user()->lastName }}</a>
    </div>
    <div class="datakid">
      <div class="kidImgContainer">
        <img src="{{ asset(Auth::user()->profilePicture) }}" alt="parentPhoto">
      </div>
        <a href="#">{{ Auth::user()->firstName }} {{ Auth::user()->lastName }}</a>
    </div>
    <div class="datakid">
      <div class="kidImgContainer">
        <img src="{{ asset(Auth::user()->profilePicture) }}" alt="parentPhoto">
      </div>
        <a href="#">{{ Auth::user()->firstName }} {{ Auth::user()->lastName }}</a>
    </div>
    <div class="datakid">
      <div class="kidImgContainer">
        <img src="{{ asset(Auth::user()->profilePicture) }}" alt="parentPhoto">
      </div>
        <a href="#">{{ Auth::user()->firstName }} {{ Auth::user()->lastName }}</a>
    </div>
    <div class="datakid">
      <div class="kidImgContainer">
        <img src="{{ asset(Auth::user()->profilePicture) }}" alt="parentPhoto">
      </div>
        <a href="#">{{ Auth::user()->firstName }} {{ Auth::user()->lastName }}</a>
    </div>
    <div class="datakid">
      <div class="kidImgContainer">
        <img src="{{ asset(Auth::user()->profilePicture) }}" alt="parentPhoto">
      </div>
        <a href="#">{{ Auth::user()->firstName }} {{ Auth::user()->lastName }}</a>
    </div>
    <div class="datakid">
      <div class="kidImgContainer">
        <img src="{{ asset(Auth::user()->profilePicture) }}" alt="parentPhoto">
      </div>
        <a href="#">{{ Auth::user()->firstName }} {{ Auth::user()->lastName }}</a>
    </div>
  </div>
</div>
@endsection
