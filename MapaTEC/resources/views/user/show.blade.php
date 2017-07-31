@extends('layouts.defaultNoMap')

@section('content')
    <div class ="col-md-8 user-section-user allow-scroll">

        <br />
        <div class ="row">
          <div class ="col-md-4">
            <center>
              @if($user->has_profile_pic == 1)
                {{ Html::image('/img/profilePics/' . $user->id . '.png', '', array('class' => 'main-profile-pic')) }}
              @else
                {{ Html::image('/img/profilePics/default.png', '', array('class' => 'main-profile-pic')) }}
              @endif
            </center>
          </div>
          <div class ="col-md-8">
          <center>
            <br />
            <br />
            <strong><h1>{{ $user->name }} {{ $user->lastname }}</h1></strong>
            <h4>{{ $user->description }}</h4>
          </center>
          </div>
        </div>
        <hr />
        <strong><h2>Mis proyectos</h2></strong>
        <div class ="row">
          @if(empty($projects_user))
            <h4>&emsp;Aún no hay proyectos que mostrar.</h4>
          @else
            @foreach ($projects_user as $key => $value)
              <div class ="col-md-3">
                @if($value->has_pic == 1)
                  <a href ="{{ URL::to('crudproyectos/' . $value->project_id) }}">{{ Html::image('/img/projects/' . $value->project_id . '.png', '', array('class' => 'project-image project-image-desc profile-pic-shadow')) }}</a>
                @else
                  <a href ="{{ URL::to('crudproyectos/' . $value->project_id) }}">{{ Html::image('/img/project-image.jpg', '', array('class' => 'project-image project-image-desc profile-pic-shadow')) }}</a>
                @endif
              </div>
            @endforeach
          @endif
        </div>
        <hr />
        <strong><h2>Areas de interés</h2></strong>

              <h4>
                @foreach ($categories_user as $key => $value)
                  <a href ="{{URL::to('search?busqueda=' . $value->name)}}">#{{ $value->name }}&emsp;</a>
                @endforeach
              </h4>


        <br />
    </div>
    <div class ="col-md-4 project-section-user">
      <strong><h2>Contacto</h2></strong>
    </div>
@endsection
