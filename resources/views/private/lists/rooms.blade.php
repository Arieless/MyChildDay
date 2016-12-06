@extends('layouts.home')
@section('title','MyChildDay')

@section('content')
<div class="listContainerMain">
  <div class="listDataContainer">
    <h3>Aulas</h3>


    @foreach ($rooms as $room)
    <?php $roomName = $room->name ?>
      <div class="itemList">
        <div class="itemData">
          <div class="itemOrigin">
            <img src="{{ asset($room->profilePicture) }}" alt="roomPhoto" class="avatar roundPicture">
            <div class="itemInfoContainer">
              <span class="name">{{ $room->name }}</span>
              <div class="itemInfo">
                @foreach ($teachersInRoom as $teacher)
                <?php $teacherName = $teacher->firstName . $teacher->lastName ?>
                <span><a href="/home/profile/teachers/{{$teacher->id}}/{{$teacherName}}">{{ $teacherName }}</a></span>
                @endforeach
              </div>
            </div>
          </div>
          <div class="itemAction">
            <a href="/home/profile/rooms/{{$room->id}}/{{$roomName}}">Ver</a>
          </div>
        </div>
      </div>
    @endforeach


  </div>
</div>
@endsection
