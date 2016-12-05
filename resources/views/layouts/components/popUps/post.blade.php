<div id="popUpContainerPost" class="popUpContainer loggedPopUp postContainer" style="display: {{ isset($display)? $display : 'none' }}" >
  <img id="buttonCloseRegister" class="buttonClose hand" src="/images/icons/close.png" alt="cerrar" />
  <form class="" action="{{url('/home/post')}}" method="post" enctype="multipart/form-data">

    <div class="mediaOptions flexRow">

      <div class="optionItem hand flexItem" id="buttonUploadPicture">
        <img src="/images/icons/app/close.svg" alt="">
        <h5>Agregar una foto o video</h5>
        <input id="uploadPicturePost" type="video/*,image/*" class="" style="display:none">
      </div>

      <div class="optionItem hand flexItem">
        <img src="/images/icons/app/close.svg" alt="">
        <h5>Agregar una galeria</h5>
        <input id="uploadPicturePost" type="file multiple" accept="video/*,image/*" class="" style="display:none">
      </div>

    </div>

    <hr>

    <textarea name="postText" class="postText" rows="4" cols="50" placeholder="Que deseas contar?" required/></textarea>

    <hr>

    <div class="tags flexRow">
      <div class="optionItem hand flexItem">
        <img src="/images/icons/app/close.svg" alt="Tag comida">
        <input id="radioFood" type="radio" name="tag" required><label class="hand" for="radioFood">Comida</label>
      </div>
      <div class="optionItem hand flexItem">
        <img src="/images/icons/app/close.svg" alt="Tag siesta">
        <input id="radioNap" type="radio" name="tag"><label class="hand" for="radioNap">Siesta</label>
      </div>
      <div class="optionItem hand flexItem">
        <img src="/images/icons/app/close.svg" alt="Tag toillete">
        <input id="radioPotty" type="radio" name="tag"><label class="hand" for="radioPotty">Toilette</label>
      </div>
      <div class="optionItem hand flexItem">
        <img src="/images/icons/app/close.svg" alt="Tag aprendizaje">
        <input id="radioLearn" type="radio" name="tag"><label class="hand" for="radioLearn">Aprendizaje</label>
      </div>
      <div class="optionItem hand flexItem">
        <img src="/images/icons/app/close.svg" alt="Tag aprendizaje">
        <input id="radioGames" type="radio" name="tag"><label class="hand" for="radioGames">Juegos</label>
      </div>
      <div class="optionItem hand flexItem">
        <img src="/images/icons/app/close.svg" alt="Tag aprendizaje">
        <input id="radioClass" type="radio" name="tag"><label class="hand" for="radioClass">Clase</label>
      </div>
    </div>

    <hr>

    <div class="selectRooms">

      <div class="title">
        <div class="titleText">
          Selecciona el aula
        </div>
        <div class="titleOptions">
          <span class="hand">Marcar todos</span> - <span class="hand">Desmarcar todos</span>
        </div>
      </div>

      <div class="flexRow">
      @foreach ($roomsToPost as $roomToPost)
        <div class="room flexItem hand" id="room_{{$roomToPost->roomId}}" room="{{$roomToPost->roomId}}">
          <div class="imgContainer">
            <img class="roundPicture" src="{{url($roomToPost->roomProfilePicture)}}" alt="{{$roomToPost->roomName}}">
            <label> <span>{{$roomToPost->name}}</span> <br/>{{$roomToPost->schoolName}}</label>
          </div>
        </div>
      @endforeach
      </div>

    @if ($kidsToPost->count() > 1)

      <div class="selectStudents">

        <div class="title">
          <div class="titleText">
            Selecciona los estudiantes
          </div>
          <div class="titleOptions">
            <span class="hand">Marcar todos</span> - <span class="hand">Desmarcar todos</span>
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

    <input id="postKidsInput" style="display:none" type="text" name="kids_id" value="" />
    @endif

    @if (!$kidsToPost->count() > 1)
    <input id="postKidsInput" style="display:none" type="text" name="kids_id" value="{{$kids->first()->kidId}}" />
    @endif


    <div class="submit">
      <button type="submit" id="postSubtmitButton" name="button" style="float: right;">Enviar</button>
    </div>
  </div>


  </form>
</div>


<style media="screen">

.postContainer .selectRooms .room.active {
  background: red;
}

.postContainer .selectStudents .student.active {
  background: orange;
}

</style>

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

window.addEventListener('load', function (evt){
  document.getElementById('buttonUploadPicture').addEventListener('click', function (evt){
    document.getElementById('uploadPicturePost').click();
  });
});

</script>

<!-- RADIO BUTTONS STYLE CHANGE -->

<script type="text/javascript">

  window.addEventListener('load', function () {
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

  window.addEventListener('load', function () {
    document.querySelectorAll('.postContainer .selectRooms .room').forEach( function (el){

      el.addEventListener('click', function (evt){
          selectRoom(el);
      })
    });
  });

  function selectRoom (element){

    if (hasClass(element, 'active')){
      element.classList.remove('active')
      hideStudentsInRoom(element.getAttribute('room'));
    }else{
      element.classList.add('active');
      showStudentsInRoom(element.getAttribute('room'));
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

var StudentsSelected;

<script type="text/javascript">

var studentsSelected = [];

  window.addEventListener('load', function () {
    document.querySelectorAll('.postContainer .selectStudents .student').forEach( function (el){
      el.addEventListener('click', function (evt){
          if(hasClass(el, 'active')) deselectStudent(el);
          else selectStudent(el);
      })
    });

    document.getElementById('postSubtmitButton').addEventListener('click', function (evt) {

      // make validation
      document.getElementById('postKidsInput').value = studentsSelected.toString();
      console.log (document.getElementById('postKidsInput').value);
      evt.preventDefault();
    })
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
