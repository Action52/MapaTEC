@extends('layouts.defaultNoMap')

@section('content')
  <div class ="container">
      <center><strong><h1>Editar mi cuenta</h1></strong></center>

      <br>
      <div class ="row">
      {{ Form::model($user, array('route' => array('user.update', $user->id), 'method' => 'PUT', 'files' => true)) }}
        {{ csrf_field() }}

        <div class ="col-md-4">

        </div>
        <div class ="col-md-4">
          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
              <label for="name" class="control-label">Nombre</label>


                  <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required autofocus>

                  @if ($errors->has('name'))
                      <span class="help-block">
                          <strong>{{ $errors->first('name') }}</strong>
                      </span>
                  @endif
          </div>

          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              <label for="password" class="control-label">Contraseña</label>

                  <input id="password" type="password" class="form-control" name="password" placeholder="" required autofocus>

                  @if ($errors->has('password'))
                      <span class="help-block">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                  @endif
          </div>

          <div class="form-group{{ $errors->has('c_password') ? ' has-error' : '' }}">
              <label for="c_password" class="control-label">Confirmar contraseña</label>

                  <input id="c_password" type="password" class="form-control" name="c_password" placeholder="" required autofocus>

                  @if ($errors->has('c_password'))
                      <span class="help-block">
                          <strong>{{ $errors->first('c_password') }}</strong>
                      </span>
                  @endif
          </div>

          <!--Imagen de perfil-->
          <div class="form-group{{ $errors->has('profile_img') ? ' has-error' : '' }}">
              <label for="profile_img" class="control-label">Imagen de perfil</label>

                  <input type = "file" name ="profile_img" id="profile_img">

                  @if ($errors->has('profile_img'))
                      <span class="help-block">
                          <strong>{{ $errors->first('profile_img') }}</strong>
                      </span>
                  @endif
          </div>
            <input id="sbmt" type="submit" class="btn btn-primary" name="submit" value="Actualizar" required autofocus>
        </div>

      {{ Form::close() }}

      <a href ="deleteUser/{{ Auth::user()->id }}">Eliminar cuenta</a>
    </div>
  </div>
@endsection
