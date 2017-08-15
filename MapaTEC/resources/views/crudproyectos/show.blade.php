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
<div class ="col-md-4  project-description-box" style="background-image:url('../img/projects/{{ $project->id }}.png'">
  <div class ="">
    <div class ="project-title categories-project-2">
      <hr />
      <h1><strong>&emsp;{{ $project->name }}</strong><h1>
      <h4>{{ $project->description }}</h4>
      <hr />

    </div>

    <div class ="categories-project">
      @if(empty($points))
        <hr />
        <h3>&emsp;Proyecto desarrollado en </h3>
        <hr />
        <h6>
          @foreach($points as $key => $value)
            {{ $value->lat }} , {{ $value->lon }}
          @endforeach
        </h6>
      @endif
    </div>

    <div class ="categories-project">
      @if(!empty($users))
      <hr />
      <h3>&emsp;Usuarios participantes</h3>
      <hr />
      <h5>
            @foreach($users as $key => $value)
                @if($value->has_profile_pic == 1)
                  &emsp;<a href="{{ URL::to('user/' . $value->id) }}">{{ Html::image('/img/profilePics/' . $value->id . '.png', $value->name . ' ' . $value->lastname, array('class' => 'profile-pic profile-pic-shadow')) }} </a>
                @else
                  &emsp;<a href="{{ URL::to('user/' . $value->id) }}">{{ Html::image('/img/profilePics/default.png', $value->name . ' ' . $value->lastname, array('class' => 'profile-pic profile-pic-shadow'))}} </a>
                @endif
            @endforeach
      </h5>
      <br />
    @endif
    </div>

    <div class ="categories-project">
      <hr />
      <h3>&emsp;Estatus </h3>
      <hr />
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
        <br />
    </div>

    <div class ="categories-project">
      @if(!empty($strategicpartners))
      <hr />
      <h3>&emsp;Socios Estratégicos</h3>
      <hr />
      <h5>
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
      </h5>
      <br />
      @endif
    </div>

    <div class ="row">
      @if(!empty($campuses))
      <div class ="col-md-6">
        <div class ="categories-project">
          <hr />
          <h3>&emsp;Campus involucrados</h3>
          <hr />
          <h5>
            <ul>
            @foreach($campuses as $key => $value)
              <li>{{ $value->name }}</li>
            @endforeach
            </ul>
          </h5>
          <br>
        </div>
      </div>
      @endif


      <div class ="col-md-6">
        <div class ="categories-project">
          @if(!empty($majors))
          <hr />
          <h3>&emsp;Carreras relacionadas</h3>
          <hr />
          <h5>
            <ul>
            @foreach($majors as $key => $value)
              <li>{{ $value->aka }}</li>
            @endforeach
            </ul>
          </h5>
          <br>
          @endif
        </div>
      </div>
    </div>

    <br />

    <div class ="categories-project">
      @if(!empty($courses))
      <hr />
      <h3>&emsp;Cursos de impacto</h3>
      <hr />
      <h5>
        <ul>
        @foreach($courses as $key => $value)
          <li>{{ $value->code }} {{ $value->name }}</li>
        @endforeach
        </ul>
      </h5>
      <br />
      @endif
    </div>

    <div class ="categories-project">
      @if(!empty($categories))
      <hr/>
      <h3>&emsp;Categorías</h3>
      <hr />
      <h5>
        @foreach($categories as $key => $value)
          #{{ $value->name }}
        @endforeach
      </h5>
      <br />
    </div>
    <br>
      @endif


  <div class ="row">
    @if($project->has_pic == 1)
    <div class ="col-md-6">
      <div class ="categories-project">
        <hr />
        <h4>Imagen de proyecto</h4>
        <hr />
        <center>
          {{ Html::image('img/projects/' . $project->id . '.png', 'Proyecto', array('class' => 'show_project_img')) }}
        </center>
      </div>
    </div>
    @endif
    <br />
    <div class ="col-md-6">
      <div class ="categories-project">
        <div class = "row">
          <div class ="col-sm-8">
            <hr />
            <h4>Más información</h4>
            <hr />
          </div>
          <div class ="col-sm-4">
            <br />
            <br />
            {{ Html::image('img/download.ico', 'PDF de proyecto', array('class' => 'show_project_img', 'onclick' => '')) }}
          </div>

        </div>
      </div>

    </div>
  </div>

  <br />
  <br />
  <br />

  </div>

</div>



<div class ="col-md-offset-4 map-wrapper">

  <div id="map"></div>
</div>
    <script>
    var markers = [];
    //window.alert({{ $project->latitud}});
    var latitud = {{ $project->latitud }};
    //window.alert({{ $project->longitud}});
    var longitud= {{ $project->longitud}};
    //var nombreP = {{ $project->name}};
    function initMap() {
      var estilo = [
    {
        "featureType": "all",
        "elementType": "labels.text",
        "stylers": [
            {
                "weight": "4.04"
            }
        ]
    },
    {
        "featureType": "administrative",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "color": "#444444"
            }
        ]
    },
    {
        "featureType": "landscape",
        "elementType": "all",
        "stylers": [
            {
                "color": "#f2f2f2"
            }
        ]
    },
    {
        "featureType": "landscape.man_made",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            },
            {
                "color": "#4b55ae"
            }
        ]
    },
    {
        "featureType": "landscape.natural",
        "elementType": "all",
        "stylers": [
            {
                "color": "#84c0b9"
            },
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "poi.attraction",
        "elementType": "all",
        "stylers": [
            {
                "color": "#3569ad"
            },
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "poi.park",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "simplified"
            },
            {
                "color": "#78b69a"
            }
        ]
    },
    {
        "featureType": "poi.park",
        "elementType": "labels",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "poi.place_of_worship",
        "elementType": "geometry",
        "stylers": [
            {
                "visibility": "off"
            },
            {
                "saturation": "0"
            },
            {
                "lightness": "0"
            },
            {
                "gamma": "1.96"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "all",
        "stylers": [
            {
                "saturation": "-100"
            },
            {
                "lightness": "18"
            },
            {
                "gamma": "0.69"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#a7b7c6"
            },
            {
                "visibility": "simplified"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "simplified"
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "labels.icon",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "transit",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            },
            {
                "color": "#91b5ff"
            },
            {
                "saturation": "12"
            },
            {
                "lightness": "-51"
            },
            {
                "gamma": "4.02"
            }
        ]
    },
    {
        "featureType": "transit.station",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "hue": "#0010ff"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "all",
        "stylers": [
            {
                "color": "#227ca2"
            },
            {
                "visibility": "on"
            }
        ]
    }
  ];
      // Create a map object and specify the DOM element for display.
      var map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: latitud, lng: longitud},
        scrollwheel: false,
        styles:estilo,
        zoom: 10
      });
      <?php
        foreach ($points as $point) {
      ?>
      var myPos = {lat:latitud , lng: longitud};
        var marker = new google.maps.Marker({
          position: myPos,
          map: map,

          title: "Prueba"
        });
        markers.push(marker);

              var bounds = new google.maps.LatLngBounds();
              for (var i = 0; i < markers.length; i++) {
                markers[i].setMap(map);
                bounds.extend(markers[i].position);
              }
              map.setZoom(15);
      <?php } ?>
    }

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDxuma0ZigWEZMRX4xxLWMz3zIqxVYIykM&callback=initMap"async defer></script>
</body>
</html>
