<div class ="row header-mapatec">
  <div class ="col-md-1"></div>
  <div class ="col-md-2">
    <!--Aqui va el logo-->
    <img src ="img/itesm.png" height ="50" width ="50">
  </div>
  <div class = "col-md-offset-6">
    <!--Aqui va el form de login-->
    <form class="form-inline" role="form" method="POST" action="{{ route('login') }}">
      {{ csrf_field() }}
        <div class="form-group">
          <label for="email" class="control-label">E-Mail: </label>
          <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
        </div>

        <div class="form-group">
          <label for="password" class="control-label">Contraseña: </label>
          <input id="password" type="password" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-default">Iniciar sesión</button>
        </div>
    </form>
  </div>
</div>
