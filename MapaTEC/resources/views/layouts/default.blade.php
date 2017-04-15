<!doctype html>
<html>
<head>
    @include('includes.head')
    <style>
    #map {
      height: 100%;
      width: 100%;
    }
    html, body {
    height: 100%;
    margin: 0;
    padding: 0;
    }
    .map-wrapper{
      margin-left:25%;
      width: 100%;
      height: 100%;
      margin: 0;
      padding: 0;
    }
    .w3-teal{
      margin-left: 25%;
    }
    </style>
</head>
<body>

<div class="container">
    <!--Incluyo el sidebar en el layout principal-->
    @include('includes.sidebar')
    <!--Texto del menu principal-->

      <!-- Page Content -->

      <div class="w3-container w3-teal">
        <!--Se reemplazará por un header de menú-->
        <h1>Mapa TEC</h1>
      </div>



</div>

<div class="map-wrapper">
    @yield('mapa')
</div>

    <footer class="row">
        @include('includes.footer')
    </footer>
</body>
</html>
