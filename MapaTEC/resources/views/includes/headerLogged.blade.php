<div class ="row header-mapatec">
  <div class ="col-md-2">
    <!--Aqui va el logo-->
    <a href="{{ URL('home') }}">{{ Html::image('../img/logo.png', 'Menú Principal', array('height' => '75', 'width' => '75')) }}
    {{ Html::image('../img/itesm.png', 'Menú Principal', array('height' => '75', 'width' => '75')) }}</a>
  </div>
  <div class ="col-md-2">
    <a href="crudproyectos/create">Nuevo proyecto</a>

  </div>
  <div class = "col-md-2">
    <a href ="{{ URL::to('crudproyectos') }}">Mis proyectos</a>
  </div>
  <div class = "col-md-2">
    <a href ="{{ URL::to('user/' . Auth::user()->id . '/edit') }}">Editar cuenta</a>
    <a href ="deleteUser/{{ Auth::user()->id }}">Eliminar cuenta</a>
  </div>
  <div class = "col-md-2">
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
  <div class ="col-md-3">
    @if(Auth::user()->has_profile_pic == 1)
      {{ Html::image('../img/profilePics/' . Auth::user()->id . '.png' , 'Perfil', array('height' => '50', 'width' => '50')) }}
    @else
      {{ Html::image('../img/profilePics/default.png' , 'Perfil', array('height' => '50', 'width' => '50')) }}
    @endif
  </div>
</div>
