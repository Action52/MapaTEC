<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body class ="body-mapatec">

  <!--Incluyo el header en el layout principal-->
  @include('includes.headerNotLogged')
  <!--Fin de header-->
<div class="container">



    <!--Texto del menu principal-->

      <!-- Page Content -->
      <div class ="row">
        <div class ="col-md-6">
          <div class ="col-md-2 sidebar-register">
            <img src ="img/itesm.png" height ="50" width ="50">
          </div>
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

    <footer class="row">
        @include('includes.footer')
    </footer>
</body>
</html>
