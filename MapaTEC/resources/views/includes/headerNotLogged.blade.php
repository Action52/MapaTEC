<div class ="row header-mapatec">
  <div class ="col-md-1"></div>
  <div class ="col-md-2">
    <!--Aqui va el logo-->
    <a href="{{ URL('home') }}"><img src ="../img/itesm.png" height ="50" width ="50"></a>
  </div>
  <div class ="col-md-4">
    <a href="{{ URL::to('/register') }}">Registrarme</a>

  </div>
  <div class = "col-md-3">
    <a href ="{{ URL::to('/login') }}">Iniciar sesión</a>
  </div>
  <div class = "col-md-3">
    <a href ="{{ URL::to('about') }}">Acerca de</a>
  </div>
  <div class = "col-md-5">
  </div>
</div>
