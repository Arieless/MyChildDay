@extends('layouts.parent')
@section('title','MyChildDay - Noticias!')

<style media="screen">

.feedPostsContainer{
  margin-top: calc(70px + 57px + 10px);
}

.feedPostsContainer .feedPost{

  margin-top: 10px;
  margin-bottom: 10px;

  padding: 20px 30px;

  border: 1px solid lightgrey;

}

</style>

@section('content')

<div class="parentFeedContainer" style="height: 800px;">

  <div class="feedOptionsContainer">
    <div class="feedOptions">


      @if ($kids->count() > 1)
      <div class="kidOptions">
        @foreach ($kids as $kid)
        <div class="kidFilterContainer hand">
          <img class="roundPicture" src="{{$kid->profilePicture}}" alt="{{$kid->firstName}}">
        </div>
        @endforeach
        <div class="kidFilterContainer hand">
          <h3>Todos</h3>
        </div>
      </div>

      @else

      <div class="kidFilterContainer">
        <img class="roundPicture" src="{{$kids[0]->profilePicture}}" alt="{{$kids[0]->firstName}}">
      </div>

      @endif

      <div class="activityOptions">
        <form class="activityOptionsForm" method="post">
          <select id="activityOptions" class="" name="activityOptions">
            <option selected disabled>Select an activity</option>
            @foreach ($postTypes as $type)
              <option value="{{$type->id}}">{{$type->type}}</option>
            @endforeach
          </select>
          <button id="activityOptionsSubmit" type="submit" name="button" style="display:none"></button>
        </form>
      </div>

    </div>
  </div>

  <div class="feedPostsContainer">
  @foreach ($posts as $post)
    <div class="feedPost">
      <div class="">
      {{-- $post->postType()->get() --}}
      </div>
      <div class="">
        {{-- $post->user()->get() --}}
      </div>
      <div class="">
      </div>
      <div class="">
        {{$post->contentText}}
      </div>
    </div>

  @endforeach
  </div>


</div>

<script type="text/javascript">

window.addEventListener('load', function (){
  document.getElementById('activityOptions').addEventListener('change', function(){
    document.getElementById('activityOptionsSubmit').click();
  })
});

</script>

@endsection
