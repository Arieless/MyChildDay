@extends('layouts.parent')
@section('title','MyChildDay - Noticias!')

@section('content')

  <div class="feedOptionsContainer">
    <div class="feedOptions">


      @if ($kids->count() > 1)
      <div class="kidOptions">
        @foreach ($kids as $kid)
        <div class="kidFilterContainer hand">
          <img class="roundPicture" src="{{url($kid->profilePicture)}}" alt="{{$kid->firstName}}">
        </div>
        @endforeach
        <div class="kidFilterContainer hand">
          <h3>Todos</h3>
        </div>
      </div>

      @else

      <div class="kidFilterContainer">
        <img class="roundPicture" src="{{url($kids[0]->profilePicture)}}" alt="{{$kids[0]->firstName}}">
      </div>

      @endif

      <div class="activityOptions">
        <form class="activityOptionsForm" method="post">
          <select id="activityOptions" class="" name="activityOptions">
            <option selected disabled>Actividad</option>
            @foreach ($posttypes as $id => $type)
              <option value="{{$id}}">{{$type}}</option>
            @endforeach
          </select>
          <button id="activityOptionsSubmit" type="submit" name="button" style="display:none"></button>
        </form>
      </div>

    </div>
  </div>

  @include ('layouts.components.contents.feed')

<script type="text/javascript">

window.addEventListener('load', function (){
  document.getElementById('activityOptions').addEventListener('change', function(){
    document.getElementById('activityOptionsSubmit').click();
  })
});

</script>

@endsection
