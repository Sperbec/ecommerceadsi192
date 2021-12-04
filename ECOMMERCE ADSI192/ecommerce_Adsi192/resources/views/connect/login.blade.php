<!--Utilizar la plantilla maestra en el login-->
@extends('connect.plantilla')

<!--Reemplazar el titulo-->
@section('title', 'Login')

<!--Mostrar sección de contenido exclusivo de esta plantilla, se debe iniciar y finalizar-->
@section('content')
<div class="box box_login shadow ">
    {!!  Form::open(['url' => '/login']) !!}

    <label for="email">Correo electrónico:</label>
    <div class="input-group">
        <div class="input-group-text">
            <!--Hacer uso del fontawesome-->
            <i class="far fa-envelope-open"></i>
        </div>

        <!--El segundo parámetro se manda en null porque no lleva ningun
        valor por defecto-->
         {!!  Form::email('email', null, ['class' => 'form-control']) !!}
    </div>

    <label for="password" class="mtop16">Contraseña:</label>
    <div class="input-group">
        <div class="input-group-text">
            <!--Hacer uso del fontawesome-->
            <i class="fas fa-lock"></i>
        </div>
         {!!  Form::password('password', ['class' => 'form-control']) !!}
    </div>

    {!! Form::submit('Ingresar', ['class' => 'btn btn-success mtop16'])!!}


    {!!  Form::close() !!}
</div>
@stop