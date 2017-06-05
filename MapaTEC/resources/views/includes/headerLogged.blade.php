<div class ="row header-mapatec">
  <div class ="col-md-1"></div>
  <div class ="col-md-2">
    <!--Aqui va el logo-->
    <img src ="../img/itesm.png" height ="50" width ="50">
  </div>
  <div class ="col-md-4">
    <a href="crudproyectos/create">Nuevo proyecto</a>

  </div>
  <div class = "col-md-5">
    <!--Aqui va el form de logout-->
    <a href="{{ route('logout') }}"
        onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">
        Logout
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
  </div>
</div>
