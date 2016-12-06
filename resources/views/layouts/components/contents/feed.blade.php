<div class="parentFeedContainer">
<div class="feedPostsContainer">
  @foreach ($posts as $post)

    <div class="feedPost">

      <div class="postHeader">
        <div class="postOriginContainer">
          <div class="postOrigin">
            <img src="{{url($post->schoolProfilePicture)}}" alt="{{$post->schoolName}}" class="avatar roundPicture" title="Logo de la escuela">
            <div class="">
              <div>
                <span class="name" title="Escuela">{{$post->schoolName}}</span>
                <span class="triangle">&#9658;</span>
                <span class="name" title="Profesor">{{$post->teacherFirstName}}</span>
                @if ($kids->count() > 1)
                  <span class="triangle">&#9658;</span>
                  <span class="name" title="Alumno">{{$post->kidFirstName}}</span>
                @endif
              </div>
              <div class="dateContainer">
                <span class="date" title="Fecha">{{$post->date}}</span>
              </div>
            </div>
          </div>

          <div class="postTypeContainer">
            <span title="Actividad">{{$post->typeName}}</span>
            <img src="{{url($post->typeIcon)}}" class="roundPicture postType" alt="{{$post->typeName}}" title="Actividad">
          </div>

        </div>

      </div>

      <hr>

      <div class="contentText">
        <div class="">
          {{$post->contentText}}
        </div>
      </div>

    </div>

  @endforeach
  </div>
</div>
