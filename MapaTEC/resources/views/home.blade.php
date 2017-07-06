@extends('layouts.default')


@section('sidebar')
  <div class ="col-md-4">
      <div class="row search">
        <br />
        <div class ="col-sm-1">
        </div>
        <div class ="col-sm-10">
          <form class="form-horizontal" role="form" method="POST" action="">
            <input type ="text" class ="form-control searchInput" name ="categories" id ="categories" placeholder="Buscar por nombre, descripción, categoría..."/>
          </form>
        </div>
        <div class ="col-sm-1">
        </div>
      </div>

      <div class ="row">
        Campus:
        <div id ="campusesContSelect" class ="dragAndDrop">
          @php
            use App\campus;
            $campuses = campus::all();
          @endphp
          @foreach ($campuses as $key => $value)
            <input type ="button" class ="btn btn-default" value ="{{ $value->name }}" id ="to_select">
          @endforeach
        </div>
      </div>
      <div class ="row">
        <div id ="campusesContUser" class ="dragAndDrop">
          <br />
          <br />
          <br />
          <br />
        </div>
      </div>
      <br />
      <div class ="col-md-6">
        <strong>Desde</strong>
        <br />
        <input type ="date" class ="" id ="inicio" name ="inicio"/>
      </div>
      <div class ="col-md-6">
        <strong>Hasta</strong>
        <br />
        <input type ="date" class ="" id ="fin" name ="fin"/>
      </div>

      <div class ="row">
        <br />
        <br />
        <br />
        <input type ="submit" class ="btn btn-primary" name ="submit" id ="submit" value ="Buscar"/>
      </div>
      </form>
      <script src='https://cdnjs.cloudflare.com/ajax/libs/dragula/3.7.2/dragula.min.js'>
          dragula([document.getElementById(campusesContSelect), document.getElementById(campusesContUser)]);
      </script>

  </div>

@endsection

@section('mapa')
<div class="col-md-offset-4 map-wrapper">
      <div id ="map"></div>
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


    }



  </script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDxuma0ZigWEZMRX4xxLWMz3zIqxVYIykM&callback=initMap"async defer></script>
@endsection
