<style media="screen">

  .postContainer hr {
    width: 90%;
    border: 0;
    height: 1px;
    background: lightgrey;
  }

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

    padding: 10px 5px 5px 5px;

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
    width: 90%;
    margin: auto;
    display: flex;
    justify-content: space-around;
    align-items: center;
  }

  .postContainer .mediaOptions,
  .postContainer .optionItem label {
    cursor: pointer;
    cursor: hand;
  }

  .postContainer .mediaOptions:hover ,
  .postContainer .optionItem:hover {
    color: #333333;
  }

  .postContainer .mediaOptions.active ,
  .postContainer .optionItem.active {
    color: #333333;
  }



  .postContainer .mediaOptions .optionItem h5 {
    display: inline-block;
  }
  .postContainer .tags .optionItem input[type=radio] {
    display: none;
  }

</style>

<div id="popUpContainerPost" class="popUpContainer loggedPopUp postContainer" style="display: {{ isset($display)? $display : 'none' }}" >
  <img id="buttonCloseRegister" class="buttonClose" src="/images/icons/close.png" alt="cerrar" />
  <form class="" action="index.html" method="post" enctype="multipart/form-data">
    <textarea name="postText" class="postText" rows="4" cols="50" placeholder="Que deseas contar?" required/></textarea>



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

      <div class="optionItem" id="buttonUploadPicture">
        <img src="/images/icons/app/close.svg" alt="">
        <h5>Agregar una foto o video</h5>
        <input id="uploadPicturePost" type="file" class="" style="display:none">
      </div>

      <div class="optionItem">
        <img src="/images/icons/app/close.svg" alt="">
        <h5>Agregar una galeria</h5>
      </div>

    </div>

    <hr>

    <div class="tags">
      <div class="optionItem">
        <img src="/images/icons/app/close.svg" alt="Tag comida">
        <input id="radioFood" type="radio" name="tag" required><label for="radioFood">Comida</label>
      </div>
      <div class="optionItem">
        <img src="/images/icons/app/close.svg" alt="Tag siesta">
        <input id="radioNap" type="radio" name="tag"><label for="radioNap">Siesta</label>
      </div>
      <div class="optionItem">
        <img src="/images/icons/app/close.svg" alt="Tag toillete">
        <input id="radioPotty" type="radio" name="tag"><label for="radioPotty">Toilette</label>
      </div>
      <div class="optionItem">
        <img src="/images/icons/app/close.svg" alt="Tag aprendizaje">
        <input id="radioLearn" type="radio" name="tag"><label for="radioLearn">Aprendizaje</label>
      </div>
      <div class="optionItem">
        <img src="/images/icons/app/close.svg" alt="Tag aprendizaje">
        <input id="radioLearn" type="radio" name="tag"><label for="radioLearn">Juegos</label>
      </div>
      <div class="optionItem">
        <img src="/images/icons/app/close.svg" alt="Tag aprendizaje">
        <input id="radioLearn" type="radio" name="tag"><label for="radioLearn">Clase</label>
      </div>
    </div>

    <div class="submit" style="overflow: hidden; margin-top: 20px;">
      <button type="submit" name="button" style="float: right;">Enviar</button>
    </div>

  </form>
</div>

<!-- Loading image -->

<script type="text/javascript">

window.addEventListener('load', function (evt){
  document.getElementById('buttonUploadPicture').addEventListener('click', function (evt){
    document.getElementById('uploadPicturePost').click();
  });
});

</script>

<!-- Radio buttons -->

<script type="text/javascript">

  window.addEventListener('load', function () {
    document.getElementById('popUpButtonPost').onclick = () => {
      document.getElementById('popUpContainerPost').style.display = 'block';
      document.getElementById('popUpContainerBackground').style.display = 'block';
    }

  });

  window.addEventListener('load', function () {
    document.querySelectorAll('.tags .optionItem input').forEach( function (el){

      el.addEventListener('change', function (evt) {
        if (evt.target.checked) evt.target.parentElement.classList.add('active');

        document.querySelectorAll('.tags .optionItem input').forEach(function (elem){
        if (!elem.checked) elem.parentElement.classList.remove('active');
        });

      });
    });
  });

</script>
