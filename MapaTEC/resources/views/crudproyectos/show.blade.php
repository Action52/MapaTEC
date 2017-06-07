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
<div class ="col-md-4  project-description-box">
  <h1><strong>{{ $project->name }}</strong><h1>
    <h4>{{ $project->description }}</h4>
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
  <h3>Socios Estratégicos</h3>
  <h5>
    @if(empty($strategicpartners))
      No existen socios estratégicos relacionados a este proyecto.
    @else
    <table class ="table table-striped table-bordered">
      <thead>
        <tr>
          <td>Socio</td>
          <td>Contacto</td>

        <tr>
      </thead>
      <tbody>
        @foreach($strategicpartners as $key => $value)
          <tr>
            <td>{{ $value->name }}</td>
            <td>{{ $value->email }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  @endif
  </h5>
  <br>
  <h3>Usuarios participantes</h3>
  <h5>
    @if(empty($users))
      No existen usuarios relacionados con el proyecto.
    @else
    <table class ="table table-striped table-bordered">
      <thead>
        <tr>
          <td>Usuario</td>
          <td>Contacto</td>
          <td>Owner</td>
          <td>Role</td>

        <tr>
      </thead>
      <tbody>
        @foreach($users as $key => $value)
          <tr>
            <td>{{ $value->name }} {{ $value->lastname }}</td>
            <td>{{ $value->email }}</td>
            <td>
              @if($value->owner == 1)
              X
              @endif
            </td>
            <td>{{ $value->role }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  @endif
  </h5>
  <br>
  <h3>Campus involucrados</h3>
  <h5>
    <ul>
    @foreach($campuses as $key => $value)
      <li>{{ $value->name }}</li>
    @endforeach
    </ul>
  </h5>
  <br>
  <h3>Carreras relacionadas</h3>
  <h5>
    <ul>
    @foreach($majors as $key => $value)
      <li>{{ $value->aka }}</li>
    @endforeach
    </ul>
  </h5>
  <br>
  <h3>Cursos de impacto</h3>
  <h5>
    <ul>
    @foreach($courses as $key => $value)
      <li>{{ $value->code }} {{ $value->name }}</li>
    @endforeach
    </ul>
  </h5>
  <h3>Categorías</h3>
  <div class ="categories-project">
    <h5>
      @foreach($categories as $key => $value)
        #{{ $value->name }}
      @endforeach
    </h5>
  </div>
  <br>
</div>

<div class ="col-md-offset-4 map-wrapper">

  <div id="map"></div>
</div>
    <script>
    function initMap() {
      var estilo = [
        {
            "featureType": "water",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#e9e9e9"
                },
                {
                    "lightness": 17
                }
            ]
        },
        {
            "featureType": "landscape",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#f5f5f5"
                },
                {
                    "lightness": 20
                }
            ]
        },
        {
            "featureType": "road.highway",
            "elementType": "geometry.fill",
            "stylers": [
                {
                    "color": "#ffffff"
                },
                {
                    "lightness": 17
                }
            ]
        },
        {
            "featureType": "road.highway",
            "elementType": "geometry.stroke",
            "stylers": [
                {
                    "color": "#ffffff"
                },
                {
                    "lightness": 29
                },
                {
                    "weight": 0.2
                }
            ]
        },
        {
            "featureType": "road.arterial",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#ffffff"
                },
                {
                    "lightness": 18
                }
            ]
        },
        {
            "featureType": "road.local",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#ffffff"
                },
                {
                    "lightness": 16
                }
            ]
        },
        {
            "featureType": "poi",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#f5f5f5"
                },
                {
                    "lightness": 21
                }
            ]
        },
        {
            "featureType": "poi.park",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#dedede"
                },
                {
                    "lightness": 21
                }
            ]
        },
        {
            "elementType": "labels.text.stroke",
            "stylers": [
                {
                    "visibility": "on"
                },
                {
                    "color": "#ffffff"
                },
                {
                    "lightness": 16
                }
            ]
        },
        {
            "elementType": "labels.text.fill",
            "stylers": [
                {
                    "saturation": 36
                },
                {
                    "color": "#333333"
                },
                {
                    "lightness": 40
                }
            ]
        },
        {
            "elementType": "labels.icon",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "transit",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#f2f2f2"
                },
                {
                    "lightness": 19
                }
            ]
        },
        {
            "featureType": "administrative",
            "elementType": "geometry.fill",
            "stylers": [
                {
                    "color": "#fefefe"
                },
                {
                    "lightness": 20
                }
            ]
        },
        {
            "featureType": "administrative",
            "elementType": "geometry.stroke",
            "stylers": [
                {
                    "color": "#fefefe"
                },
                {
                    "lightness": 17
                },
                {
                    "weight": 1.2
                }
            ]
        }
    ];
      // Create a map object and specify the DOM element for display.
      var myPos = {lat: 19.432608, lng: -99.133209 };
      var map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: 19.432608, lng: -99.133209},
        scrollwheel: false,
        styles:estilo,
        zoom: 6
      });
      <?php
        foreach ($points as $point) {
      ?>
      var myPos = {lat: <?php echo $point->lat?>, lng: <?php echo $point->lon?>};
        var marker = new google.maps.Marker({
          position: myPos,
          map: map,
          
          title: 'Prueba!'
        });

        map.setCenter(marker.getPosition());
      <?php } ?>
    }

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDxuma0ZigWEZMRX4xxLWMz3zIqxVYIykM&callback=initMap"async defer></script>
</body>
</html>
