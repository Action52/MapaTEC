<div class ="row header-mapatec">
  <div class ="col-md-2">
    <!--Aqui va el logo-->
    <a href="{{ URL('home') }}">
    {{ Html::image('../img/itesm.png', 'Menú Principal', array('height' => '52', 'width' => '52')) }}</a>
  </div>
  <div class ="col-md-5">
    <div class ="row" style="">
      <br />
      <form class="form-horizontal" role="form" method="GET" action="{{ url('search') }}">
        <input type ="text" class ="form-control searchInput" name ="rawsearch" id ="rawsearch" placeholder="Buscar por nombre, descripción, o categoría" style=""/>
      </form>
    </div>
  </div>
  <div class ="col-md-5">
    <div class ="row">

      <div class ="col-sm-3">

      </div>
      <div class ="col-sm-6">
        <div class ="menu-wrap">
          <nav class ="menu">
            <ul class ="clearfix">
              <li>
                {{ Auth::user()->name }}

              @if(Auth::user()->has_profile_pic == 1)
                <a href="{{ URL::to('crudproyectos') }}">{{ Html::image('../img/profilePics/' . Auth::user()->id . '.png' , 'Perfil', array('height' => '50', 'width' => '50', 'class' => 'profile-pic')) }}</a>
              @else
                <a href="{{ URL::to('crudproyectos') }}">{{ Html::image('../img/profilePics/default.png' , 'Perfil', array('height' => '50', 'width' => '50', 'class' => 'profile-pic')) }}</a>
              @endif

                <span class="arrow">&#9660;</span>
                <ul class="sub-menu">
                  <li>
                    <a href="crudproyectos/create">Crear proyecto</a>
                  </li>
                  <li>
                    <a href ="{{ URL::to('user/' . Auth::user()->id . '/edit') }}">Editar cuenta</a>
                  </li>
                  <li>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        Cerrar sesión
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                  </li>
                </ul>
              </li>
            </ul>
          </nav>
        </div>

      </div>
      <div class ="col-sm-1">
        <a href="{{ URL('home') }}">{{ Html::image('../img/logo.png', 'Menú Principal', array('height' => '52', 'width' => '52')) }}</a>
      </div>
    </div>
  </div>

</div>
