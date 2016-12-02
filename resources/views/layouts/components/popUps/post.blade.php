<style media="screen">

  .postContainer .postText{
    padding: 20px;
    width: calc(100% - 16px);
    resize: none;
    font-family: 'Source Sans Pro', sans-serif;
    color: #333333;
    font-size: 22px;
    font-weight: bold;

    border: none;
  }

  .postContainer .postText::-webkit-input-placeholder { /* Chrome/Opera/Safari */
    font-size: 22;
    font-weight: bold;
  }
  .postContainer .postText::-moz-placeholder { /* Firefox 19+ */
    font-size: 22;
    font-weight: bold;
  }
  .postContainer .postText:-ms-input-placeholder { /* IE 10+ */
    font-size: 22;
    font-weight: bold;
  }
  .postContainer .postText:-moz-placeholder { /* Firefox 18- */
    font-size: 22;
    font-weight: bold;
  }

  .postContainer .submit {
    overflow: hidden; margin-top: 20px;
  }

  .postContainer .flexRow {
    display: flex;
    justify-content: space-around;
    align-items: center;
  }

  .postContainer .selectRooms .title,
  .postContainer .flexRow {
    width: 90%;
    margin: auto;
  }

  .postContainer .selectRooms .title{
    margin-top: 10px;
    margin-bottom: 10px;
    overflow: hidden;
  }

  .postContainer .selectRooms .titleText {
    font-weight: bold;
    color: darkgrey;
    display: inline-block;
  }

  .postContainer .selectRooms .title .titleOptions {
    float: right;
    display: inline-block;
  }

  .postContainer .selectRooms .title .titleOptions{
    color: darkgrey;
    font-size: 10px;
    line-height: 16px;
  }

  .postContainer .flexRow .flexItem{
    display: inline-flex;
    padding: 10px 5px;
    vertical-align: middle;
  }

  .postContainer .selectRooms {
    width: 100%;
  }

  .postContainer .students img,
  .postContainer .selectRooms .room img{
    height: 30px;
    width: 30px;
    display: block;
    margin: auto;
  }

  .postContainer .selectRooms .students label,
  .postContainer .selectRooms .room {
    color: darkgrey;
    font-size: 12px;
  }

  .postContainer .selectRooms .students label,
  .postContainer .selectRooms .room label {
    padding-top: 5px;
    display: block;
    text-align: center;
  }

  .postContainer .selectRooms .room span {
    font-weight: bold;
  }

  .postContainer .optionItem{
    line-height: 20px;
    font-size: 14px;
    font-weight: bold;
    color: darkgrey;
  }

  .postContainer .mediaOptions {
    padding-top: 20px;
  }

  .postContainer .tags .optionItem img,
  .postContainer .mediaOptions .optionItem img {
    height: 10px;
    margin: 5px;
  }

  .postContainer .selectRooms .room:hover,
  .postContainer .selectRooms .title .titleOptions span:hover,
  .postContainer .mediaOptions:hover ,
  .postContainer .optionItem:hover,
  .postContainer .mediaOptions.active ,
  .postContainer .optionItem.active {
    color: #333333;
  }

  .postContainer .selectRooms .room:hover img,
  .postContainer .mediaOptions:hover img,
  .postContainer .optionItem.active {
    filter: brightness(90%);
  }

  .postContainer .mediaOptions .optionItem h5 {
    display: inline-block;
  }

  .postContainer .students input[type=checkbox],
  .postContainer .selectRooms .room input[type=checkbox],
  .postContainer .tags .optionItem input[type=radio] {
    display: none;
  }

</style>

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
  @if (isset($rooms) && $rooms->count() > 1)
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

      @foreach ($rooms as $room)
        <div class="room flexItem hand">
          <div class="imgContainer">
            <img class="roundPicture" src="{{$room->profilePicture}}" alt="{{$room->name}}">
            <label for="{{$room->id}}"> <span>{{$room->name}}</span> <br/>{{$room->school->name}}</label>
          </div>
        </div>
      @endforeach

      </div>
      
    @if ($kids->count() > 1)

      <div class="selectStudents">
        <div class="titleText">
          Selecciona el aula
        </div>
        <div class="titleOptions">
          <span class="hand">Marcar todos</span> - <span class="hand">Desmarcar todos</span>
        </div>

          @foreach ($kids as $kid)
          <div class="student flexItem hand">
            <div class="imgContainer" id="students_{{$room->id}}">
              <img class="roundPicture" src="{{$kid->profilePicture}}" alt="{{$kid->firstName." ".$kid->lastName}}">
              <label for="{{$kid->id}}"> <span>{{$kid->firstName." ".$kid->lastName}}</span></label>
            </div>
          </div>
          @endforeach



        </div>

      </div>

      <input style="display:none" type="number" name="kid" value="" />
    @endif

    @if (!$kids->count() > 1)
      <input style="display:none" type="number" name="kid" value="{{$kids->first()}}" />
    @endif

      <input style="display:none" type="text" name="school" value="" />
  @else
      <input style="display:none" type="text" name="school" value="{{$kids->first()}}" />
  @endif
  </div>





  <div class="submit">
    <button type="submit" name="button" style="float: right;">Enviar</button>
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
