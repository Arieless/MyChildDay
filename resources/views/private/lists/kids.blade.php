@extends('layouts.school')
@section('title','MyChildDay')

@section('content')
<div class="listContainerMain">
  <div class="listDataContainer">
    <h3>Alumnos</h3> <a href="{{ url('/home/profile/create/kid') }}">AGREGAR ALUMNO</a>

    @foreach ($kids as $kid)
    <?php $kidName = $kid->firstName . $kid->lastName; ?>
      <div class="itemList">
        <div class="itemData">
          <div class="itemOrigin">
            <img src="{{ asset($kid->profilePicture) }}" alt="parentPhoto" class="avatar roundPicture">
            <div class="itemInfoContainer">
              <span class="name"><a href="/home/profile/kids/{{$kid->id}}/{{$kidName}}">{{ $kid->firstName . ' ' . $kid->lastName}}</a></span>
              <span class="triangle">&#9658;</span>
              <span class="name">Room</span>
              <span class="itemInfo">

                {{ $kid->birthdate }}
              </span>
            </div>
          </div>
          <div class="itemAction">
            <a class="addParentButton" kid="{{$kid->id}}">Agregar guardian</a>
            <a>Mensaje</a>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>

{{-- TO FINISH! should also display a message --}}

<div id="addParentPopUpContainerBackground" class="popUpContainerBackground" style="display: none">
  <div id="popUpContainerAddParent" class="popUpContainer loggedPopUp addParentContainer" style="display: block;">
    <img id="buttonCloseAddParent" class="buttonClose hand" src="/images/icons/close.png" alt="cerrar" />
    <form class="" action="{{url('/home/profile/create/userkid')}}" method="post" enctype="multipart/form-data">

          {{ csrf_field() }}

      <div class="" style="padding: 40px 20px 0px 20px; overflow: hidden;">
        <label for="parentEmail">Email del padre</label>
        <input type="email" name="parentEmail">
      </div>
        <input id="addParentKidId" type="text" name="kid_id" style="display:none">
      <div class="submit">
        <button type="submit" id="postSubmitButton" name="post" style="float: right;">Enviar</button>
      </div>
    </div>


    </form>
  </div>
</div>

<script type="text/javascript">

  document.addEventListener('DOMContentLoaded', function (){
    document.querySelectorAll('.itemList .addParentButton').forEach(function (el){
      el.addEventListener('click', function (){
        var bgap = document.getElementById('addParentPopUpContainerBackground');
        bgap.style.display = 'block';
        document.getElementById('addParentKidId').value = el.getAttribute('kid');
      });
    })
  });

</script>

<script type="text/javascript">

  document.addEventListener('DOMContentLoaded', function (){
    document.getElementById('buttonCloseAddParent').addEventListener('click', function(){
      document.getElementById('addParentPopUpContainerBackground').style.display = 'none';
    });
  });

  document.addEventListener('DOMContentLoaded', function (){
    document.getElementById('addParentPopUpContainerBackground').addEventListener('click', function(evt){
      var bgap = document.getElementById('addParentPopUpContainerBackground');
      if (evt.target === bgap){
        bgap.style.display = 'none';
      }
    });
  });

</script>

@endsection
