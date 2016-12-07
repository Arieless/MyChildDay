@extends('layouts.home')
@section('title','MyChildDay')

@section('content')
<div class="listContainerMain">
  <div class="listDataContainer">
    <h3>Kids</h3>

    @foreach ($kids as $kid)
    <?php $kidName = $kid->firstName . $kid->lastName; ?>
      <div class="itemList">
        <div class="itemData">
          <div class="itemOrigin">
            <img src="{{ asset($kid->profilePicture) }}" alt="parentPhoto" class="avatar roundPicture">
            <div class="itemInfoContainer">
              <span class="name"><a href="/home/profile/kids/{{$kid->id}}/{{$kidName}}">{{ $kid->firstName . ' ' . $kid->lastName}}</a></span>
              <span class="triangle">&#9658;</span>
              <span class="name">Room</span>
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
    @endforeach
  </div>
</div>
@endsection
