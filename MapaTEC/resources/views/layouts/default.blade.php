<!doctype html>
<html>
<head>
    @include('includes.head')
    <style>

    </style>
</head>
<body class ="body-mapa">


    <!--Incluyo el sidebar en el layout principal-->
    @if(Auth::check())
      @include('includes.headerLogged')
    @else
      @include('includes.headerNotLogged')
    @endif
    <!--Texto del menu principal-->

      <!-- Page Content -->

      <div class="w3-container w3-teal">
        @yield('cabecera')
      </div>




  @yield('sidebar')


@yield('mapa')


    <footer>
        @include('includes.footer')
    </footer>
    <!--   Core JS Files   -->
  	<script src="{{ URL('js/jquery-3.1.0.min.js') }}" type="text/javascript"></script>
  	<script src="{{ URL('js/bootstrap.min.js') }}" type="text/javascript"></script>
  	<script src="{{ URL('js/material.min.js') }}" type="text/javascript"></script>

  	<!--  Charts Plugin -->
  	<script src="{{ URL('js/chartist.min.js') }}"></script>

  	<!--  Notifications Plugin    -->
  	<script src="{{ URL('js/bootstrap-notify.js') }}"></script>

  	<!--  Google Maps Plugin    -->
  	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

  	<!-- Material Dashboard javascript methods -->
  	<script src="{{ URL('js/material-dashboard.js') }}"></script>
</body>
</html>
