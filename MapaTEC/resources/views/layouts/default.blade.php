<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body>

<div class="container">
    <!--Incluyo el sidebar en el layout principal-->
    @include('includes.sidebar')
    <!--Texto del menu principal-->

      <!-- Page Content -->
      <div style="margin-left:25%">

      <div class="w3-container w3-teal">
        <!--Se reemplazará por un header de menú-->
        <h1>Mapa TEC</h1>
      </div>

      @yield('mapa')

      </div>
      </div>

    <footer class="row">
        @include('includes.footer')
    </footer>

</div>
</body>
</html>
