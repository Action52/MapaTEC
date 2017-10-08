<div class ="row header-mapatec">
  <br />
  <div class ="col-md-1"></div>
  <br />

  <div class ="col-md-2">
    <!--Aqui va el logo-->
    <a href="{{ URL('home') }}"><img src ="../img/itesm.png" height ="52" width ="52"></a>
  </div>
  <br />
 
   <a class="col-md-3" href="{{ URL::to('about') }}" title="Acerca de">Acerca de</a>
  <a class="col-md-3" href="{{ URL::to('/register') }}" title="Registrarme">Registrarme</a>
  <a class="col-md-3" href="{{ URL::to('/login') }}" title="Iniciar sesión">Iniciar sesión</a>

  <div class = "col-md-5">
  </div>
</div>

