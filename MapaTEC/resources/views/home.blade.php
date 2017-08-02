@extends('layouts.default')


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
          
           
          
    }
    function showListings() {
            var bounds = new google.maps.LatLngBounds();
            for (var i = 0; i < markers.length; i++) {
              markers[i].setMap(map);
              bounds.extend(markers[i].position);
            }
            map.fitBounds(bounds);
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
