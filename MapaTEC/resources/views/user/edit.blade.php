@extends('layouts.defaultNoMap')

@section('content')
  <div class ="container">
      <center><strong><h1>Editar mi cuenta</h1></strong></center>

      <br>
      <div class ="row">
      {{ Form::model($user, array('route' => array('user.update', $user->id), 'method' => 'PUT')) }}
        {{ csrf_field() }}

        <div class ="col-md-4">

        </div>
        <div class ="col-md-4">
          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
              <label for="name" class="control-label">Nombre</label>


                  <input id="name" type="text" class="form-control" name="name" placeholder="{{ $user->name }}" required autofocus>

                  @if ($errors->has('name'))
                      <span class="help-block">
                          <strong>{{ $errors->first('name') }}</strong>
                      </span>
                  @endif
          </div>

          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
              <label for="email" class="control-label">Email</label>

                  <input id="email" type="text" class="form-control" name="email" placeholder="{{ $user->email }}" required autofocus>

                  @if ($errors->has('email'))
                      <span class="help-block">
                          <strong>{{ $errors->first('email') }}</strong>
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

            <input id="sbmt" type="submit" class="btn btn-primary" name="submit" value="Actualizar" required autofocus>
        </div>

      {{ Form::close() }}
    </div>
  </div>
@endsection
