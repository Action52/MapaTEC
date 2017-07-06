<div class ="row header-mapatec">
  <div class ="col-md-2">
    <!--Aqui va el logo-->
    <a href="{{ URL('home') }}">{{ Html::image('../img/logo.png', 'Menú Principal', array('height' => '75', 'width' => '75')) }}
    {{ Html::image('../img/itesm.png', 'Menú Principal', array('height' => '75', 'width' => '75')) }}</a>
  </div>
  <div class ="col-md-5">

  </div>
  <div class ="col-md-5">
    <div class ="row">
      <div class ="col-sm-4">
        <a href="crudproyectos/create">{{ Html::image('../img/newproject.png', 'Nuevo Proyecto', array('height' => '25', 'width' => '25')) }}</a>
        <a href ="{{ URL::to('user/' . Auth::user()->id . '/edit') }}">{{ Html::image('../img/editaccount.png', 'Editar cuenta', array('height' => '25', 'width' => '25')) }}</a>
      </div>




      <!--Aqui va el form de logout-->
      <div class="col-sm-1">
        <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
            {{ Html::image('../img/logout.png', 'Cerrar sesión', array('height' => '25', 'width' => '25')) }}
        </a>
      </div>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
      </form>
    </div>
    <div class ="row">
      @if(Auth::user()->has_profile_pic == 1)
        <a href="{{ URL::to('crudproyectos') }}">{{ Html::image('../img/profilePics/' . Auth::user()->id . '.png' , 'Perfil', array('height' => '50', 'width' => '50', 'class' => 'profile-pic')) }}</a>
      @else
        <a href="{{ URL::to('crudproyectos') }}">{{ Html::image('../img/profilePics/default.png' , 'Perfil', array('height' => '50', 'width' => '50')) }}</a>
      @endif
    </div>
  </div>

</div>
