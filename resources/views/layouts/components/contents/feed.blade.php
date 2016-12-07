<div class="parentFeedContainer">
<div class="feedPostsContainer">
  @foreach ($posts as $post)

    <div class="feedPost">

      <div class="postHeader">
        <div class="postOriginContainer">
          <div class="postOrigin">
            <img src="{{url($post->schoolProfilePicture)}}" alt="{{$post->schoolName}}" class="avatar roundPicture">
            <div class="">
              <div>
                <span class="name">{{$post->schoolName}}</span>
                <span class="triangle">&#9658;</span>
                <span class="name">{{$post->teacherFirstName}}</span>
                @if ($kids->count() > 1)
                  <span class="triangle">&#9658;</span>
                  <span class="name">{{$post->kidFirstName}}</span>
                @endif
              </div>
              <div class="dateContainer">
                <span class="date">{{$post->date}}</span>
              </div>
            </div>
          </div>

          <div class="posttypeContainer">
            <span>{{$post->typeName}}</span>
            <img src="{{url($post->typeIcon)}}" class="roundPicture posttype" alt="{{$post->typeName}}">
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
