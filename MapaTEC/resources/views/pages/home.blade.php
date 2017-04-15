@extends('layouts.default')
@section('cabecera')
  <!--Header de menú-->
  <style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;}
.tg .tg-baqh{text-align:center;vertical-align:top}
</style>
<table class="tg">
  <tr>
    <!--Input de usuario-->
    <form method ="POST" class = "form-group">
    <th class="tg-baqh">
      Usuario:
      <input type="text" name ="usr" value = "">
    </th>
    <th class="tg-baqh">
      Contraseña:
      <input type="password" name ="psw" value = "">
    </th>
    <th class="tg-baqh">
      <input type="submit" name ="sbt" value = "Iniciar sesión">
    </th>
    </form>
  </tr>
</table>
@stop

@section('mapa')
  <div id="map"></div>
  <script>
  function initMap() {
    // Create a map object and specify the DOM element for display.
    var myPos = {lat: -34.397, lng: 150.644};
    var map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: -34.397, lng: 150.644},
      scrollwheel: false,
      zoom: 8
    });
    var marker = new google.maps.Marker({
      position: myPos,
      map: map,
      title: 'Prueba!'
    });
  }

  </script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDxuma0ZigWEZMRX4xxLWMz3zIqxVYIykM&callback=initMap"async defer></script>
@stop
