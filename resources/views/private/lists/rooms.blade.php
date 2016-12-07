@extends('layouts.home')
@section('title','MyChildDay')

@section('content')
<div class="listContainerMain">
  <div class="listDataContainer">
    <h3>Aulas</h3>


    @foreach ($rooms as $room)
          <div class="itemList">
          <div class="itemData">
            <div class="itemOrigin">
              <img src="{{ asset($room->roomProfilePicture) }}" alt="roomPhoto" class="avatar roundPicture">
              <div class="itemInfoContainer">
                <span class="name">{{ $room->roomName }}</span>
                <div class="itemInfo">

                  <?php $teacherName = $room->teacherFirstName . $room->teacherLastName ?>
                  <span><a href="/home/profile/teachers/{{$room->teacherId}}/{{$teacherName}}">{{ $teacherName }}</a></span>

                </div>
              </div>
            </div>
            <div class="itemAction">
              <a href="/home/profile/rooms/{{$room->roomId}}/{{$room->roomName}}">Ver</a>
            </div>
          </div>
        </div>
      @endforeach


  </div>
</div>
@endsection
