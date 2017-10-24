@extends('layouts.default')
@php
    $i = 1;
@endphp
@foreach ($projects as $key => $value)
    @php
    $i = $i + 1;
    @endphp
@endforeach

@section('sidebar')
<div class ="col-md-4  project-creation-box">
        <h1>Encuentra un proyecto</h1>
        <div>
          <input id="show-listings" type="button" value="Mostrar proyectos">
          <input id="hide-listings" type="button" value="Ocultar Proyectos">
          <hr>
          <span class="text">Dibuja una figura para buscar dentro de ella algunos proyectos!</span>
          <input id="toggle-drawing"  type="button" value="Herramientas de dibujo">
        </div>
        <hr>
        <h1>Busqueda Avanzada</h1>
  <form class="form-horizontal" role="form" method="GET" action="{{ url('advancedSearch') }}" enctype="multipart/form-data">
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
                <option value ="EM"> EM </option>
                <option value ="AD"> AD </option>
                <option value ="EM"> V </option>
              </select>
              <select name ="times_year_end" class "">
                @for($i =2051 ; $i >= 1980; $i--)
                  <option value ="{{ $i }}"> {{ $i }} </option>
                @endfor
              </select>
    </div>
    <div class="form-group{{ $errors->has('campuses') ? ' has-error' : '' }}">
          <label for="campuses" class="control-label">Campus relacionado al proyecto</label>

              <select name ="campuses" class ="form-control" >
                @foreach($campuses as $key => $value)
                  <option value ="{{ $value->id }}"> {{ $value->name}} </option>
                @endforeach
              </select>
      </div>
    <div class="form-group{{ $errors->has('majors') ? ' has-error' : '' }}">
        <label for="majors" class="control-label">Indique la carrera de impacto del proyecto</label>

            <select name ="majors" class ="form-control">
              @foreach($majors as $key => $value)
                <option value ="{{ $value->id }}"> {{ $value->program }} </option>
              @endforeach
            </select>
    </div>
    <input id="sbmt" type="submit" class="btn btn-primary" name="submit" value="Buscar" required autofocus>

  </form>
</div>


@endsection

@section('mapa')
<div class="col-md-offset-4 map-wrapper">
      <div id ="map"></div>
</div>

  <script>
    var map;
    var markers = [];

    var polygon = null;
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
        var myPos = {lat: 19.432608, lng: -99.133209 };
          map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 19.432608, lng: -99.133209},
            styles:estilo,
            scrollwheel: false,
            zoom: 6

          });
          var marker;
          var pos;

          var infoProj = new Array(<?php echo $i?>);

          var labels = new Array(<?php echo $i?>);
          markers = new Array(<?php echo $i?>);
          var titles = new Array(<?php echo $i?>);  
          for(i = 0; i < labels.length; i++){
                labels[i] = i+1;
          }
          var index = 0;

          <?php foreach ($projects as $project) { ?>
            pos = { lat: <?php echo $project->lat ?> , lng: <?php echo $project->lon ?> };
            titles[index] = '<?php echo $project->name ?>';
            marker = new google.maps.Marker({
              position: pos,
              map: map,
              title: '<?php echo $project->name ?>',
              label: {text: labels[index].toString(), color: 'black'},
              icon: 'img/marker.png'
            });

            markers[index] = marker;

            index++;
          <?php } ?>
          //for para obtener los proyectos
          /*
          for (var i = 0; i < locations.length; i++) {
              // Get the position from the location array.
              var position = locations[i].location;
              var title = locations[i].title;
              // Create a marker per location, and put into markers array.
              var marker = new google.maps.Marker({
                position: position,
                title: title,
                animation: google.maps.Animation.DROP,
                icon: defaultIcon,
                id: i
              });
              // Push the marker to our array of markers.
              markers.push(marker);
              // Create an onclick event to open the large infowindow at each marker.
              marker.addListener('click', function() {
                populateInfoWindow(this, largeInfowindow);
              });
              // Two event listeners - one for mouseover, one for mouseout,
              // to change the colors back and forth.
              marker.addListener('mouseover', function() {
                this.setIcon(highlightedIcon);
              });
              marker.addListener('mouseout', function() {
                this.setIcon(defaultIcon);
              });
            }*/
          document.getElementById('show-listings').addEventListener('click', showListings);
            document.getElementById('hide-listings').addEventListener('click', hideListings);

            document.getElementById('toggle-drawing').addEventListener('click', function() {
              toggleDrawing(drawingManager);
            });
          var drawingManager = new google.maps.drawing.DrawingManager({
              drawingMode: google.maps.drawing.OverlayType.POLYGON,
              drawingControl: true,
              drawingControlOptions: {
                position: google.maps.ControlPosition.TOP_LEFT,
                drawingModes: [
                  google.maps.drawing.OverlayType.POLYGON
                ]
              }
            });
        drawingManager.addListener('overlaycomplete', function(event) {
          // First, check if there is an existing polygon.
          // If there is, get rid of it and remove the markers
          if (polygon) {
            polygon.setMap(null);
            hideListings(markers);
          }
          // Switching the drawing mode to the HAND (i.e., no longer drawing).
          drawingManager.setDrawingMode(null);
          // Creating a new editable polygon from the overlay.
          polygon = event.overlay;
          polygon.setEditable(true);
          // Searching within the polygon.
          searchWithinPolygon();
          // Make sure the search is re-done if the poly is changed.
          polygon.getPath().addListener('set_at', searchWithinPolygon);
          polygon.getPath().addListener('insert_at', searchWithinPolygon);
        });
           
          
    }
    function showListings() {
            var bounds = new google.maps.LatLngBounds();
            for (var i = 0; i < markers.length; i++) {
              markers[i].setMap(map);
              bounds.extend(markers[i].position);
            }
            //map.fitBounds(bounds);
          }

          function hideListings() {
            for (var i = 0; i < markers.length; i++) {
              markers[i].setMap(null);
            }
          }
          function toggleDrawing(drawingManager) {
            if (drawingManager.map) {
              drawingManager.setMap(null);
              // si hay un poligono
              if (polygon !== null) {
                polygon.setMap(null);
              }
            } else {
              drawingManager.setMap(map);
            }
          }

          //muestra solo los proyectos que estan en el poligono
          function searchWithinPolygon() {
            for (var i = 0; i < markers.length; i++) {
              if (google.maps.geometry.poly.containsLocation(markers[i].position, polygon)) {
                markers[i].setMap(map);
              } else {
                markers[i].setMap(null);
              }
            }
          }   
  </script>
  <script src="https://maps.googleapis.com/maps/api/js?libraries=geometry,drawing&key=AIzaSyDxuma0ZigWEZMRX4xxLWMz3zIqxVYIykM&callback=initMap"async defer></script>
@endsection
