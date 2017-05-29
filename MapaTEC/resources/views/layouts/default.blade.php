<!doctype html>
<html>
<head>
    @include('includes.head')
    <style>
    
    </style>
</head>
<body>

<div class="container">
    <!--Incluyo el sidebar en el layout principal-->
    @include('includes.sidebar')
    <!--Texto del menu principal-->

      <!-- Page Content -->

      <div class="w3-container w3-teal">
        @yield('cabecera')
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
