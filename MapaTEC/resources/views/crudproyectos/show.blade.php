<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body class ="body-mapatec">
  <!--Incluyo el header en el layout principal-->
  @include('includes.headerLogged') <!--Falta enchular-->
  <!--Fin de header-->


<!--Texto del menu principal-->
<div class ="col-md-4">
  <h1><strong>{{ $project->name }}</strong><h1>
  <h3>Descripción</h3>
    <h5>{{ $project->description }}</h5>
  <br>
  <h3>Estatus </h3>
    <h5>
      @if($project->status == 1)
        Terminado
      @else
        En progreso
      @endif

      <table class ="table table-striped table-bordered">
        <thead>
          <tr>
            <td>Semestre inicio</td>
            <td>Año inicio</td>
            <td>Semestre fin</td>
            <td>Año fin</td>

          <tr>
        </thead>
        <tbody>
          @foreach($times as $key => $value)
            <tr>

              <td>{{ $value->sem_start }}</td>
              <td>{{ $value->year_start }}</td>
              <td>{{ $value->sem_end }}</td>
              <td>{{ $value->year_end }}</td>

            </tr>
          @endforeach
        </tbody>
      </table>

    </h5>
  <br>
  <h3>Socios Estretégicos</h3>
  <h5></h5>
  <br>
  <h3>Usuarios participantes en el proyecto</h3>
  <h5></h5>
  <br>
  <h3>Campus involucrados en el proyecto</h3>
  <h5></h5>
  <br>
  <h3>Carreras relacionadas al proyecto</h3>
  <h5></h5>
  <br>
  <h3>Categorías</h3>
  <h5></h5>
  <br>
  <h3>Cursos relacionados con el proyecto</h3>
  <h5></h5>
</div>

<div class ="col-md-offset-4 map-wrapper">
  <div id="map"></div>
</div>
    <script>
    function initMap() {
      // Create a map object and specify the DOM element for display.
      var myPos = {lat: 19.432608, lng: -99.133209};
      var map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: 19.432608, lng: -99.133209},
        scrollwheel: false,
        zoom: 6
      });

    }

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDxuma0ZigWEZMRX4xxLWMz3zIqxVYIykM&callback=initMap"async defer></script>
</body>
</html>
