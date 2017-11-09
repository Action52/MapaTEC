@extends('layouts.defaultNoMap')

@section('content')
  <div class="container">
<div class="row">
<div class="col-md-8 col-md-offset-2">
<div class="panel panel-default">
<div class="panel-heading">Registro confirmado</div>
<div class="panel-body">
Su correo ha sido verificado. Haga click aquí para <a href="{{ URL::to('/login')}}"> iniciar sesión</a>.
</div>
</div>
</div>
</div>
</div>
@endsection
