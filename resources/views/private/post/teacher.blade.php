@extends('layouts.teacher')
@section('title','MyChildDay - Noticias!')



@section('content')

<style media="screen">

  .postContainer {
    width: 720px;
    margin: auto;
    margin-top: 100px;
    border: 1px solid lightgrey;
  }

  .postContainer hr {
    width: 90%;
    border: 0;
    height: 1px;
    background: lightgrey;
  }

  .postContainer .postText{
      padding: 20px;
      width: 100%;
      resize: none;
      font-family: 'Source Sans Pro', sans-serif;
      color: #333333;
      font-size: 22px;
      font-weight: bold;

      border: none;
  }

  .postContainer .postText::-webkit-input-placeholder { /* Chrome/Opera/Safari */
    font-family: 'Source Sans Pro', sans-serif;
    font-size: 22;
    font-weight: bold;
    color: #999999;
  }
  .postContainer .postText::-moz-placeholder { /* Firefox 19+ */
    font-family: 'Source Sans Pro', sans-serif;
    font-size: 22;
    font-weight: bold;
    color: #999999;
  }
  .postContainer .postText:-ms-input-placeholder { /* IE 10+ */
    font-family: 'Source Sans Pro', sans-serif;
    font-size: 22;
    font-weight: bold;
    color: #999999;
  }
  .postContainer .postText:-moz-placeholder { /* Firefox 18- */
    font-family: 'Source Sans Pro', sans-serif;
    font-size: 22;
    font-weight: bold;
    color: #999999;
  }

  .postContainer .dropdown {
    position: relative;
  }

  .postContainer .dropdown-content {
      position: absolute;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      overflow: hidden;
  }

  .postContainer .flexColumn {
    display: flex;
    flex-direction: column;
    justify-content: space-around;
    align-items: center;
  }

  .postContainer .flexColumn .flexItem{
    display: flex;
    justify-content: flex-start;
    align-items: center;
  }

  .postContainer .flexColumn .flexItem input,
  .postContainer .flexColumn .flexItem label{

  }

  .postContainer .selectRooms {
    width: 100%;
  }

  .postContainer .optionItem{
    display: inline-flex;
    line-height: 20px;
    font-size: 14px;
    vertical-align: middle;

    font-weight: bold;
    color: darkgrey;
  }

  .postContainer .tags .optionItem img,
  .postContainer .mediaOptions .optionItem img {
    height: 10px;
    margin: 5px;
  }

  .postContainer .tags,
  .postContainer .mediaOptions {
    width: 100%;
    display: flex;
    justify-content: space-around;
    align-items: center;
  }

  .postContainer .mediaOptions .optionItem h5 {
    display: inline-block;
  }
  .postContainer .tags .optionItem input {
    display: none;
  }

</style>

{{--  TEACHER SHOULD ONLY MAKE POST IF HAVE ASSIGNED CLASSROOMS  --}}

<div class="postContainer" style="">

  <form class="" action="index.html" method="post">
    <textarea class="postText" rows="4" cols="50" placeholder="Que deseas contar?"/></textarea>



    <div class="selectRooms">
    {{--
      @if (isset($classRooms))
    <hr>
        @if ($classRooms.length > 1)
          <div class="dropdown">
            <div class="dropdown-content flexColumn">
              @foreach ($classRooms as $class)
                  <div class="flexItem">
                    <input id="{{$class->id}}" type="checkbox" name="{{$class->id}}" value="{{$class->id}}"><label for="{{$class->id}}">{{$class->name}}</label>
                  </div>
              @endforeach
            </div>
          </div>
        @elseif
        <input id="{{$classRooms[0]->id}}" type="checkbox" name="{{$classRooms[0]->id}}" value="{{$classRooms[0]->id}}" selected><label for="{{$classRooms[0]->id}}">{{$classRooms[0]->name}}</label>
        @endif

      @endif
    --}}
    </div>

    <hr>

    <div class="mediaOptions">

      <div class="optionItem">
        <img src="/images/icons/app/close.svg" alt="">
        <h5>Picture / Video</h5>
      </div>

      <div class="optionItem">
        <img src="/images/icons/app/close.svg" alt="">
        <h5>Galeria</h5>
      </div>

    </div>

    <hr>

    <div class="tags">
      <div class="optionItem">
        <img src="/images/icons/app/close.svg" alt="Tag comida">
        <input id="radioFood" type="radio" name="food" selected><label for="radioFood">Comida</label>
      </div>
      <div class="optionItem">
        <img src="/images/icons/app/close.svg" alt="Tag siesta">
        <input id="radioNap" type="radio" name="nap" selected><label for="radioNap">Siesta</label>
      </div>
      <div class="optionItem">
        <img src="/images/icons/app/close.svg" alt="Tag toillete">
        <input id="radioPotty" type="radio" name="potty" selected><label for="radioPotty">Toilette</label>
      </div>
      <div class="optionItem">
        <img src="/images/icons/app/close.svg" alt="Tag aprendizaje">
        <input id="radioLearn" type="radio" name="learn" selected><label for="radioLearn">Aprendizaje</label>
      </div>
    </div>
  </form>
</div>



@endsection
