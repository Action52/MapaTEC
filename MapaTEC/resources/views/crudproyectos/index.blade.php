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
    @if(empty($projects))
      <h1><strong class ="page-title">Parece que no tienes proyectos aún: </strong></h1>
      <h3><a href ="{{ URL::to('crudproyectos/create') }}">Crear un proyecto</a></h3>
    @else
    <h1><strong class ="page-title">Mis proyectos</strong></h1>
    <br />
      @foreach($projects as $key => $value)
        <!--Aqui va cada cajita con la info general de cada proyecto-->
        <div class ="col-md-3 project-box" onClick ="{{ URL::to('crudproyectos/' . $value->id) }}">
          <br>
          @if($value->has_pic == 0)
            <center>{{Html::image('../img/project-image.jpg', 'Proyecto', array('class' => 'project-image'))}}</center>
          @else
            <center>{{Html::image('../img/projects/' . $value->id . '.png' , 'Proyecto', array('class' => 'project-image'))}}</center>
          @endif
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
          {{ Form::open(array('url' => 'crudproyectos/' . $value->id, 'class' => 'pull-right')) }}
               {{ Form::hidden('_method', 'DELETE') }}
               {{ Form::submit('Eliminar', array('class' => 'btn btn-warning')) }}
           {{ Form::close() }}
          <br>
          <br>
        </div>
        <div class ="col-md-1"></div>
      @endforeach
    @endif
    </div>
</div>
</body>
</html>
