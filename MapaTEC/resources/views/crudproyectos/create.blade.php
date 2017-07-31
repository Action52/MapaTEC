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
<div class ="col-md-4  project-creation-box">
  <h1>Nuevo proyecto</h1>
  <!-- if there are creation errors, they will show here -->
  {{ Html::ul($errors->all()) }}
  <form class="form-horizontal" role="form" method="POST" action="{{ url('crudproyectos') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="name" class="control-label">Nombre</label>


            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
    </div>

    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
        <label for="description" class="control-label">Descripción breve</label>


            <textarea id="description" type="text"  rows ="3" class="form-control" name="description" value="{{ old('description') }}" required autofocus></textarea>

            @if ($errors->has('description'))
                <span class="help-block">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
            @endif
    </div>

    <div class="form-group{{ $errors->has('imagen') ? ' has-error' : '' }}">
        <label for="imagen" class="control-label">Suba una imagen que identifique a su proyecto</label>


            <input id="imagen" type="file" class="form-control" name="imagen" value="{{ old('imagen') }}" required autofocus></textarea>

            @if ($errors->has('imagen'))
                <span class="help-block">
                    <strong>{{ $errors->first('imagen') }}</strong>
                </span>
            @endif
    </div>

    <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
        <label for="status" class="control-label">Estatus</label>


            <select name ="status" id="status" class ="form-control">
              <option name="enproceso" value="1">En proceso</option>
              <option name="terminado" value="0">Terminado</option>
            </select>

    </div>

    <div class="form-group{{ $errors->has('times') ? ' has-error' : '' }}">
          <br>
            Semestre y año de inicio
            <select name ="times_sem_start" class ="">
              <option value ="EM"> EM </option>
              <option value ="AD"> AD </option>
              <option value ="EM"> V </option>
            </select>
            <select name ="times_year_start" class "">
              @for($i = 1980; $i <= 2050; $i++)
                <option value ="{{ $i }}"> {{ $i }} </option>
              @endfor
            </select>
            <br>
              Semestre y año de fin de proyecto
              <select name ="times_sem_end" class ="">
                <option value =""> No aplica </option>
                <option value ="EM"> EM </option>
                <option value ="AD"> AD </option>
                <option value ="EM"> V </option>
              </select>
              <select name ="times_year_end" class "">
                <option value =""> No aplica </option>
                @for($i = 1980; $i <= 2050; $i++)
                  <option value ="{{ $i }}"> {{ $i }} </option>
                @endfor
              </select>
    </div>

    <div class="form-group{{ $errors->has('strategicpartners') ? ' has-error' : '' }}">
        <label for="strategicpartners" class="control-label">Socios estratégicos del proyecto</label>

            <select name ="strategicpartners" class ="form-control" multiple>
              @foreach($strategicpartners as $key => $value)
                <option value ="{{ $value->id }}"> {{ $value->name }} </option>
              @endforeach
            </select>

    </div>

    <div class="form-group{{ $errors->has('users') ? ' has-error' : '' }}">
        <label for="users" class="control-label">Usuarios relacionados al proyecto</label>

            <select name ="users" class ="form-control" multiple>
              @foreach($users as $key => $value)
                <option value ="{{ $value->id }}"> {{ $value->email}} </option>
              @endforeach
            </select>

    </div>

    <div class="form-group{{ $errors->has('campuses') ? ' has-error' : '' }}">
        <label for="campuses" class="control-label">Campus relacionados al proyecto</label>

            <select name ="campuses" class ="form-control" multiple>
              @foreach($campuses as $key => $value)
                <option value ="{{ $value->id }}"> {{ $value->name}} </option>
              @endforeach
            </select>

    </div>

    <div class="form-group{{ $errors->has('categories') ? ' has-error' : '' }}">
        <strong>Indique las categorías del proyecto separándolas con un espacio</strong>

            <textarea name = "categories" class = "form-control" rows="3" required autofocus></textarea>

            @if ($errors->has('categories'))
                <span class="help-block">
                    <strong>{{ $errors->first('categories') }}</strong>
                </span>
            @endif
    </div>

    <div class="form-group{{ $errors->has('courses') ? ' has-error' : '' }}">
        <label for="courses" class="control-label">Indique los cursos del proyecto</label>

            <select name ="cursos" class ="form-control" multiple>
              @foreach($courses as $key => $value)
                <option value ="{{ $value->id }}"> {{ $value->name }} </option>
              @endforeach
            </select>

    </div>

    <div class="form-group{{ $errors->has('majors') ? ' has-error' : '' }}">
        <label for="majors" class="control-label">Indique las carreras de impacto del proyecto</label>

            <select name ="majors" class ="form-control" multiple>
              @foreach($majors as $key => $value)
                <option value ="{{ $value->id }}"> {{ $value->program }} </option>
              @endforeach
            </select>

    </div>

    <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
        <strong>Coloque un marcador en la posición geográfica de su proyecto</strong>

            <input id="lat" type="hidden" class="form-control" name="lat" value="" required autofocus>
            <input id="lon" type="hidden" class="form-control" name="lon" value="" required autofocus>
            <input id="resetMap" type="button" class="form-control" name="resetMap" value="Resetear posición" onClick ="initMap()" required autofocus>
    </div>

    <div class="form-group{{ $errors->has('countries') ? ' has-error' : '' }}">
        <label for="countries" class="control-label">País</label>

            <select name ="countries">
              @foreach($countries as $key => $value)
                <option value ="{{ $value->id }}"> {{ $value->name }} </option>
              @endforeach
            </select>

            <select name ="states">
              @foreach($states as $key => $value)
                <option value ="{{ $value->id }}"> {{ $value->name }} </option>
              @endforeach
            </select>

            <select name ="cities">
              @foreach($cities as $key => $value)
                <option value ="{{ $value->id }}"> {{ $value->name }} </option>
              @endforeach
            </select>
    </div>

    <input id="sbmt" type="submit" class="btn btn-primary" name="submit" value="Agregar" required autofocus>

  </form>
</div>

<div class ="col-md-offset-4 map-wrapper">

  <div id="map"></div>
</div>
    <script>
    var map;

    function initMap() {
      // Create a map object and specify the DOM element for display.
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
      var myPos = {lat: 19.432608, lng: -99.133209 };
      map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: 19.432608, lng: -99.133209},
        styles:estilo,
        scrollwheel: false,
        zoom: 6

      });

      var marker;

      map.addListener('mousemove', function(event) {
        if ( marker ) {
          marker.setPosition(event.latLng);
        } else {
          marker = new google.maps.Marker({
            position: event.latLng,
            map: map
          });
          marker.setMap(map);
        }
      });

      map.addListener('click', function(event) {
        if ( marker ) {
          marker.setPosition(event.latLng);

          google.maps.event.clearListeners(map, 'mousemove');
          document.getElementById("lat").value = event.latLng.lat();
          document.getElementById("lon").value = event.latLng.lng();
        }
      });
    }


function placeMarker(location) {
  if ( marker ) {
    marker.setPosition(location);
  } else {
    marker = new google.maps.Marker({
      position: location,
      map: map
    });
    marker.setMap(map);
  }
}


    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDxuma0ZigWEZMRX4xxLWMz3zIqxVYIykM&callback=initMap"async defer></script>
</body>
</html>
