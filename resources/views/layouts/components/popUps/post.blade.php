<div id="popUpContainerPost" class="popUpContainer loggedPopUp postContainer" style="display: {{ isset($display)? $display : 'none' }}" >
  <img id="buttonCloseRegister" class="buttonClose hand" src="/images/icons/close.png" alt="cerrar" />
  <form class="" action="{{$formAction}}" method="post" enctype="multipart/form-data">

    {{ csrf_field() }}

    <div class="mediaOptions flexRow">

      <div class="optionItem hand flexRowCenter" id="buttonUploadPicture">
        <img src="/images/icons/app/close.svg" alt="">
        <h5>Agregar una foto o video</h5>
        <input id="uploadPicturePost" type="file" accept="video/*,image/*" class="" style="display:none">
      </div>

      <div class="optionItem hand flexRowCenter">
        <img src="/images/icons/app/close.svg" alt="">
        <h5>Agregar una galeria</h5>
        <input id="uploadPicturePost" type="file multiple" accept="video/*,image/*" class="" style="display:none">
      </div>

    </div>

    <hr>

    <textarea name="contentText" class="postText" rows="4" cols="50" placeholder="Que deseas contar?" required/></textarea>

    <hr>

    <div class="">
      <div class="tags flexRow">

        @foreach ($posttypes as $posttype)
        <div class="optionItem hand flexRowCenter">
          <img src="{{url($posttype->icon)}}" alt="Tag {{$posttype->type}}">

          <input id="radio{{$posttype->type}}" type="radio" name="posttype" value="{{$posttype->id}}" required><label class="hand" for="radio{{$posttype->type}}">{{$posttype->type}}</label>
        </div>
        @endforeach
      </div>
    </div>

    <hr>

    <div class="selectRooms">

      <div class="title">
        <div class="titleText">
          Selecciona el aula
        </div>
      </div>

      <div class="flexRow">
      @foreach ($roomsToPost as $roomToPost)
        <div class="room flexItem hand" id="room_{{$roomToPost->roomId}}" room="{{$roomToPost->roomId}}">
          <div class="imgContainer">
            <img class="roundPicture" src="{{url($roomToPost->roomProfilePicture)}}" alt="{{$roomToPost->roomName}}">
            <label> <span>{{$roomToPost->roomName}}</span> <br/>{{$roomToPost->schoolName}}</label>
          </div>
        </div>
      @endforeach
      </div>

    @if ($kidsToPost->count() > 1)
      <br/>
      <div class="selectStudents">

        <div class="title">
          <div class="titleText">
            Selecciona los estudiantes
          </div>
          <div class="titleOptions">
            <span class="hand" id="selectAllStudents">Seleccionar todos</span> - <span class="hand" id="deselectAllStudents">Deseleccionar todos</span>
          </div>
        </div>

        <div class="flexRow">
          @foreach ($kidsToPost as $kidToPost)
          <div class="student flexItem hand" id="student_{{$kidToPost->roomId}}" room="{{$kidToPost->roomId}}" student="{{$kidToPost->kidId}}" style="display:none">
            <div class="imgContainer">
              <img class="roundPicture" src="{{url($kidToPost->kidProfilePicture)}}" alt="{{$kidToPost->kidFirstName." ".$kidToPost->kidLastName}}">
              <label> <span>{{$kidToPost->kidFirstName}}<br/>{{$kidToPost->kidLastName}}</span></label>
            </div>
          </div>
          @endforeach
        </div>

      </div>

    </div>

    <input id="postRoomInput" style="display:none" type="text" name="room_id"/>
    <input id="postKidsInput" style="display:none" type="text" name="kids_id"/>
    @endif

    @if (!$kidsToPost->count() > 1)
    <input id="postRoomInput" style="display:none" type="text" name="room_id" value="{{$kidToPost->first()->roomId}}" />
    <input id="postKidsInput" style="display:none" type="text" name="kids_id" value="{{$kidToPost->first()->kidId}}" />
    @endif


    <div class="submit">
      <button type="submit" id="postSubmitButton" name="post" style="float: right;">Enviar</button>
    </div>
  </div>


  </form>
</div>

<script type="text/javascript">
/*

window.addEventListener('load', function () {
  document.getElementById('popUpButtonPost').onclick = () => {
    document.getElementById('popUpContainerPost').style.display = 'block';
    document.getElementById('popUpContainerBackground').style.display = 'block';
  }

});
*/
</script>



</script>

<!-- BUTTON UPLOAD IMAGE -->

<script type="text/javascript">

window.addEventListener('DOMContentLoaded', function (evt){

  document.getElementById('buttonUploadPicture').addEventListener('click', function (evt){
    document.getElementById('uploadPicturePost').click();
  });
});

</script>

<!-- RADIO BUTTONS STYLE CHANGE -->

<script type="text/javascript">

  window.addEventListener('DOMContentLoaded', function () {

    document.querySelectorAll('.tags .optionItem input').forEach( function (el){

      el.parentElement.querySelector('label').addEventListener('click', function (evt){
        evt.preventDefault();
      })

      el.parentElement.addEventListener('click', function (evt){
        this.querySelector('input').click();
      });

      el.addEventListener('change', function (evt) {
        if (evt.target.checked) evt.target.parentElement.classList.add('active');
        document.querySelectorAll('.tags .optionItem input').forEach(function (elem){
        if (!elem.checked) elem.parentElement.classList.remove('active');
        });

      });

    });
  });

</script>

<!-- SELECT ROOM STYLE CHANGE (join with select student)-->

<script type="text/javascript">

  window.addEventListener('DOMContentLoaded', function () {

    document.querySelectorAll('.postContainer .selectRooms .room').forEach( function (el){

      el.addEventListener('click', function (evt){
          selectRoom(el);
      })
    });
  });

  function selectRoom (element){

    document.querySelectorAll('.postContainer .selectRooms .room').forEach( function (el){
          deselectRoom(el, element);
    });

    if (hasClass(element, 'active')){
      element.classList.remove('active')
      document.getElementById('postRoomInput').value = "";
      hideStudentsInRoom(element.getAttribute('room'));

    }else{
      element.classList.add('active');
      var roomNum = element.getAttribute('room');
      document.getElementById('postRoomInput').value = roomNum;
      showStudentsInRoom(roomNum);
    }

  }

  function deselectRoom (el, element){
    if (el != element) {
      if (hasClass(el, 'active')){
        el.classList.remove('active');
        hideStudentsInRoom(el.getAttribute('room'));
      }
    }
  }

  function showStudentsInRoom (roomNumber){
    document.querySelectorAll('.postContainer .selectStudents .student').forEach( function (el){
      if (el.getAttribute('room') === roomNumber) {
        el.style.display = 'block';
      }
    });
  }

  function hideStudentsInRoom (roomNumber){
    document.querySelectorAll('.postContainer .selectStudents .student').forEach( function (el){
      if (el.getAttribute('room') === roomNumber) {
        deselectStudent(el);
        el.style.display = 'none';
      }
    });
  }

  function hasClass(el, cn){
    var classes = el.classList;
    for(var j = 0; j < classes.length; j++){
        if(classes[j] == cn){
            return true;
        }
    }
    return false;
  }

</script>

<!-- SELECT STUDENT STYLE CHANGE -->

<script type="text/javascript">

var studentsSelected = [];

  window.addEventListener('DOMContentLoaded', function () {

    document.querySelectorAll('.postContainer .selectStudents .student').forEach( function (el){
      el.addEventListener('click', function (evt){
          if(hasClass(el, 'active')) deselectStudent(el);
          else selectStudent(el);
      })
    });
  });

  function selectStudent (element){
    element.classList.add('active');
    var studentNumber = element.getAttribute('student');
    if (studentsSelected.indexOf(studentNumber) === -1) studentsSelected.push(element.getAttribute('student'));
  }

  function deselectStudent(element){
    var studentNumber = element.getAttribute('student');
    studentsSelected = studentsSelected.filter ( function (el){
      return el !== studentNumber;
    });
    element.classList.remove('active');
  }

</script>


<script type="text/javascript">

  window.addEventListener('DOMContentLoaded', function () {

    document.getElementById('postSubmitButton').addEventListener('click', function (evt) {

      // here make validation WARNING!!!
      document.getElementById('postKidsInput').value = studentsSelected.toString();
    });
  });

</script>


<script type="text/javascript">

  window.addEventListener('DOMContentLoaded', function (){

    document.getElementById('selectAllStudents').addEventListener('click', function (){
        document.querySelectorAll('.postContainer .selectStudents .student').forEach( function (el){
          if (el.style.display === 'block') selectStudent(el);
        });
    });

    document.getElementById('deselectAllStudents').addEventListener('click', function (){
      document.querySelectorAll('.postContainer .selectStudents .student').forEach( function (el){
        if (hasClass(el, 'active')) deselectStudent(el);
      });
    });
  });

</script>
