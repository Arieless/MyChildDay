@extends('layouts.home')
@section('title','MyChildDay')



@section('content')
<div class="containerRols">
      <h1 class="title">Elige el rol que deseas desempeñar:</h1>

  <div class="flexContainer">
    <div class="rol">
      <a href="{{ url ('/teacher/registeras') }}">
        <img src="{{url ('images/icons/teacher.png')}}" alt="">
        <h1>Docente</h1>
      </a>
    </div>

    <div class="rol">
      <a href="{{ url ('/school/registeras') }}">
        <img src="{{url ('images/icons/school.png')}}" alt="">
        <h1>Escuela</h1>
      </a>
    </div>

    <a href="{{ url ('/parent/registeras') }}">
      <div class="rol">
        <img src="{{url ('images/icons/parent.png')}}" alt="">
        <h1>Padre</h1>
      </div>
    </a>
</div>

    <script type="text/javascript">

    </script>

</div>

@endsection
