@extends('layouts.defaultNoMap')

@section('content')
    <div class ="col-md-8 user-section-user allow-scroll">

        <br />
        <div class ="row">
          <div class ="col-md-4">
            <center>
              @if($user->has_profile_pic == 1)
                {{ Html::image('/img/profilePics/' . $user->id . '.png', '', array('class' => 'main-profile-pic')) }}
              @else
                {{ Html::image('/img/profilePics/default.png', '', array('class' => 'main-profile-pic')) }}
              @endif
            </center>
          </div>
          <div class ="col-md-8">
          <center>
            <br />
            <br />
            <strong><h1>{{ $user->name }} {{ $user->lastname }}</h1></strong>
            <h4>{{ $user->description }}</h4>
          </center>
          </div>
        </div>
        <hr />
        <strong><h2>Mis proyectos</h2></strong>
        <div class ="row">
          @if(empty($projects_user))
            <h4>&emsp;Aún no hay proyectos que mostrar.</h4>
          @else
            @foreach ($projects_user as $key => $value)
              <div class ="col-md-3">
                @if($value->has_pic == 1)
                  <a href ="{{ URL::to('crudproyectos/' . $value->project_id) }}">{{ Html::image('/img/projects/' . $value->project_id . '.png', '', array('class' => 'project-image project-image-desc profile-pic-shadow')) }}</a>
                @else
                  <a href ="{{ URL::to('crudproyectos/' . $value->project_id) }}">{{ Html::image('/img/project-image.jpg', '', array('class' => 'project-image project-image-desc profile-pic-shadow')) }}</a>
                @endif
              </div>
            @endforeach
          @endif
        </div>
        <hr />
        <strong><h2>Areas de interés</h2></strong>

              <h4>
                @foreach ($categories_user as $key => $value)
                  <a href ="{{URL::to('search?busqueda=' . $value->name)}}">#{{ $value->name }}&emsp;</a>
                @endforeach
              </h4>


        <br />
    </div>
    <div class ="col-md-4 project-section-user">
      <strong><h2>Contacto</h2></strong>
      <br />
      <div class ="col-sm-1">

      </div>
      <div class ="col-sm-10">
        {{ Html::ul($errors->all()) }}
        <form class="form-horizontal" role="form" method="POST" action="{{ url('user/' . $user->id . '/contactUser') }}">
          {{ csrf_field() }}

          <div class="form-group{{ $errors->has('motivo') ? ' has-error' : '' }}">

                  <select name ="motivo" id ="motivo" class ="form-control">
                    <option name ="motivo">Motivo de contacto</option>
                    <option name ="proyecto_existente">Involucarme en un proyecto de {{ $user->name }}</option>
                    <option name ="proyecto_crear">Crear un proyecto con {{ $user->name }}</option>
                    <option name ="proyecto_patrocinar">Patrocinar un proyecto de {{ $user->name }}</option>
                    <option name ="Otro">Otro motivo</option>
                  </select>

                  @if ($errors->has('motivo'))
                      <span class="help-block">
                          <strong>{{ $errors->first('motivo') }}</strong>
                      </span>
                  @endif
          </div>

          <div class="form-group{{ $errors->has('asunto') ? ' has-error' : '' }}">

                  <input id="asunto" type="text" class="form-control" name="asunto" value="{{ old('asunto') }}" placeholder="Asunto" required autofocus>

                  @if ($errors->has('asunto'))
                      <span class="help-block">
                          <strong>{{ $errors->first('asunto') }}</strong>
                      </span>
                  @endif
          </div>

          <div class="form-group{{ $errors->has('contenido') ? ' has-error' : '' }}">

                  <textarea id="contenido" rows ="5" class="form-control" name="contenido" value="{{ old('contenido') }}" placeholder="¡Ponte en contacto con {{ $user->name }}!" required autofocus></textarea>

                  @if ($errors->has('asunto'))
                      <span class="help-block">
                          <strong>{{ $errors->first('asunto') }}</strong>
                      </span>
                  @endif
          </div>



          <input id="sbmt" type="submit" class="btn btn-primary" name="submit" value="Enviar mensaje" class ="btn" required autofocus>

        </form>
      </div>
      <div class ="col-sm-1">

      </div>
      <div class ="row">
        <br />
        {{ Html::image('../img/logo.png', '', array('class' => 'img-responsive')) }}

      </div>
    </div>
@endsection
