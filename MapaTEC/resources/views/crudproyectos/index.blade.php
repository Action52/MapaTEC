<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body class ="body-mapatec">

  <!--Incluyo el header en el layout principal-->
  @include('includes.headerLogged') <!--Falta enchular-->
  <!--Fin de header-->
<div class="container">

<!--Texto del menu principal-->
  <br>
    <div class ="row">
    <h1><strong class ="page-title">Mis proyectos</strong></h1>


    @foreach($projects as $key => $value)
      <!--Aqui va cada cajita con la info general de cada proyecto-->
      <div class ="col-md-3 project-box">
        <br>
        <center><img src ="img/project-image.jpg" class ="project-image"></center>
        <h4><strong>{{ $value->name }}</strong></h4>
        <h6>
          {{ $value->description }}
        </h6>
        <strong>Opciones</strong>
        <br>
        <!--Show the project, uses show method-->
        <a class = "btn btn-small btn-info" href="{{ URL::to('crudproyectos/' . $value->id) }}"> Desplegar </a>
        <!--Edit the project, uses edit method-->
        <a class = "btn btn-small btn-info" href="{{ URL::to('crudproyectos/' . $value->id . '/edit') }}"> Actualizar </a>
        <!--Delete uses DESTROY method, still to do-->
        {{ Form::open(array('url' => 'nerds/' . $value->id, 'class' => 'pull-right')) }}
             {{ Form::hidden('_method', 'DELETE') }}
             {{ Form::submit('Eliminar', array('class' => 'btn btn-warning')) }}
         {{ Form::close() }}
        <br>
        <br>
      </div>
      <div class ="col-md-1"></div>
    @endforeach
    </div>
</div>

    <footer class="row">
        @include('includes.footer')
    </footer>
</body>
</html>
