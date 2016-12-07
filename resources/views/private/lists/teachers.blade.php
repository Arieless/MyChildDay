@extends('layouts.home')
@section('title','MyChildDay')

@section('content')
<div class="listContainerMain">
  <div class="listDataContainer">
    <h3>Teachers</h3>


    @foreach ($teachersInSchool as $teacher)
      <div class="itemList">
        <div class="itemData">
          <div class="itemOrigin">
            <img src="{{ asset($teacher->teacherProfilePicture) }}" alt="parentPhoto" class="avatar roundPicture">
            <div class="itemInfoContainer">
              <?php $teacherName = $teacher->teacherFirstName . $teacher->teacherLastName ?>
              <span class="name">{{ $teacher->teacherFirstName . " " . $teacher->teacherLastName}}</span>
              <span class="triangle">&#9658;</span>
              <span class="name">{{ $teacher->roomName }}</span>
            </div>
          </div>
          <div class="itemAction">
            <a href="/home/profile/teachers/{{$teacher->teacherId}}/{{$teacherName}}">Ver</a>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection
