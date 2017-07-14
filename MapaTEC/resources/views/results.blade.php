@extends('layouts.default')

@section('sidebar')
  <div class ="col-md-4">
    <h2>Resultados de búsqueda para: </h2>
    <h4>{{ $searchString }}</h4>
    @foreach ($projects as $key => $value)
      <hr />
      <div class ="row">
        <div class ="col-sm-1">

        </div>
        <div class ="col-sm-10" onClick ="">
          <strong>{{ $value->name }}</strong>
          <p>
            <h6>{{ $value->description }}</h6>
          </p>
        </div>
        <div class ="col-sm-1">
          <h4><a href ="{{ URL::to('crudproyectos/' . $value->id) }}">&#10145;</a></h4>
        </div>
      </div>

    @endforeach
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

  // Create a map object and specify the DOM element for display.
  var myPos = {lat: 19.432608, lng: -99.133209 };
  var map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: 19.432608, lng: -99.133209},
    scrollwheel: false,
    styles:estilo,
    zoom: 6
  });


}
  </script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDxuma0ZigWEZMRX4xxLWMz3zIqxVYIykM&callback=initMap"async defer></script>
@endsection
