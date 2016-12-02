@extends('layouts.home')
@section('title','MyChildDay')



@section('content')
<div class="containerRols">

    <h1 class="title">Elige el rol que deseas desempeñar:</h1>

  <div class="flexContainer">

    <div class="rol hand" id="chooseTeacher">
        <img src="{{url ('images/icons/big/teacher.svg')}}" alt="">
        <h1>Docente</h1>
    </div>

    <div class="rol hand" id="chooseSchool">
        <img src="{{url ('images/icons/big/school.svg')}}" alt="">
        <h1>Escuela</h1>
    </div>

    <div class="rol hand" id="chooseParent">
      <img src="{{url ('images/icons/big/parent.svg')}}" alt="">
      <h1>Padre</h1>
    </div>
  </div>

</div>


<form id="choose-form" action="{{ url('/home') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
    <input id="choose-input" type="text" name="choose-input" value="">
</form>

<script type="text/javascript">

  window.addEventListener('load', function (){

    document.getElementById('chooseTeacher').addEventListener('click', function(evt){
       evt.preventDefault();
       document.getElementById('choose-input').value ="teacher";
       document.getElementById('choose-form').submit();
    });

    document.getElementById('chooseSchool').addEventListener('click', function(evt){
       evt.preventDefault();
       document.getElementById('choose-input').value = "school";
       document.getElementById('choose-form').submit();
    });

    document.getElementById('chooseParent').addEventListener('click', function(evt){
       evt.preventDefault();
       document.getElementById('choose-input').value = "parent";
       document.getElementById('choose-form').submit();
    });

  });
</script>

@endsection
