@extends('layouts.home')
@section('title','MyChildDay')

@section('content')
<div class="listContainerMain">
  <div class="listDataContainer">
    <h3>Kids</h3>

    {{-- @foreach ($kids as $kid) --}}

      <div class="itemList">
        <div class="itemData">
          <div class="itemOrigin">
            <img src="{{ asset(Auth::user()->profilePicture) }}" alt="parentPhoto" class="avatar roundPicture">
            <div class="itemInfoContainer">
              <span class="name">{{ Auth::user()->firstName}}</span>
              <span class="triangle">&#9658;</span>
              <span class="name">{{ Auth::user()->lastName}}</span>
              <ul class="itemInfo">
                <li>{{ Auth::user()->address }}</li>
              </ul>
            </div>
          </div>
          <div class="itemAction">
            <a>Mensaje</a>
          </div>
        </div>
      </div>
    {{-- @endforeach --}}
  </div>
</div>
@endsection
