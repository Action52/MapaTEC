<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body class ="body-mapatec backgroundTec">

  <!--Incluyo el header en el layout principal-->
  @include('includes.headerNotLogged')
  <!--Fin de header-->
<div class="container">



    <!--Texto del menu principal-->

      <!-- Page Content -->
      <div class ="row">
        <div class ="col-md-6">
          <br />

          {{ Html::image('../img/logo.png', '', array('class' => 'img-responsive')) }}
        </div>
        <div class ="col-md-6 register-space register">
          <h1>Registro</h1>

          <h3>
            ¡Forma parte de MapaTec! Si eres miembro de la comunidad del Tecnológico de Monterrey, ¡únete!
          </h3>
          <h5>
            <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">Nombre</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                    <label for="lastname" class="col-md-4 control-label">Apellidos</label>

                    <div class="col-md-6">
                        <input id="lastname" type="text" class="form-control" name="lastname" value="{{ old('lastname') }}" required autofocus>

                        @if ($errors->has('lastname'))
                            <span class="help-block">
                                <strong>{{ $errors->first('lastname') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    <label for="description" class="col-md-4 control-label">Descripción breve</label>

                    <div class="col-md-6">
                        <input id="description" type="text" class="form-control" name="description" value="{{ old('description') }}" required autofocus>

                        @if ($errors->has('description'))
                            <span class="help-block">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('interests') ? ' has-error' : '' }}">
                  <label for="description" class="col-md-4 control-label">Áreas de interés</label>
                  <div class="col-md-6">
                      <input type ="text" value ="{{ old('interests') }}" name ="interests" class="form-control" required autofocus/>

                      @if ($errors->has('interests'))
                          <span class="help-block">
                              <strong>{{ $errors->first('interests') }}</strong>
                          </span>
                      @endif
                  </div>

                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-4 control-label">Correo institucional</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-md-4 control-label">Contraseña</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="password-confirm" class="col-md-4 control-label">Confirmar contraseña</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="conditions" class="col-md-4 control-label">
                    He leído y acepto los <a href ="../terminosycondiciones.blade.php">términos y condiciones.</a></label>

                    <div class="col-md-6">
                        <input id="conditions" type="checkbox" class="form-control" name="conditions" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Registrar
                        </button>
                    </div>
                </div>
            </form>
          </h5>
        </div>
      </div>
      <!--Fin de Content-->

</div>

</body>
</html>
