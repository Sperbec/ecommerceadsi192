<!--Utilizar la plantilla maestra en el login-->
@extends('connect.plantilla')

<!--Reemplazar el titulo-->
@section('title', 'Login')

<!--Mostrar sección de contenido exclusivo de esta plantilla, se debe iniciar y finalizar-->
@section('content')
<div class="box box_login shadow ">
    <div class="inside">

        <div class="header">
           <a href="{{url('/')}}"></a>
           <img class="logo" src="{{url('/static/images/logo.jpg')}}" alt="">
        </div>

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

        <div class="footer mtop16">
            <a href="{{url('/register')}}">Registrarse</a>
            <a href="{{url('/recover')}}">Recuperar contraseña</a>
        </div>
    </div>

</div>
@stop