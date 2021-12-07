<!--Utilizar la plantilla maestra en el login-->
@extends('connect.plantilla')

<!--Reemplazar el titulo-->
@section('title', 'Registrarse')

<!--Mostrar sección de contenido exclusivo de esta plantilla, se debe iniciar y finalizar-->
@section('content')
<div class="box box_register shadow ">
    <div class="inside">

        {!!  Form::open(['url' => '/register']) !!}

        <h1 class="registarse">Registrarse</h1>
        

        <label for="name1">Primer nombre :</label>
        <div class="input-group">
            <div class="input-group-text">
                <!--Hacer uso del fontawesome-->
                <i class="fas fa-user"></i>
            </div>

            <!--El segundo parámetro se manda en null porque no lleva ningun
            valor por defecto-->
            {!!  Form::text('name1', null, ['class' => 'form-control', 'required']) !!}
        </div>

        <label for="name2">Segundo nombre :</label>
        <div class="input-group">
            <div class="input-group-text">
                <i class="fas fa-user"></i>
            </div>
            {!!  Form::text('name2', null, ['class' => 'form-control']) !!}
        </div>

        <label for="lastname1" class="mtop16">Primer apellido:</label>
        <div class="input-group">
            <div class="input-group-text">
                <i class="fas fa-user"></i>
            </div>
            {!!  Form::text('lastname1', null, ['class' => 'form-control', 'required']) !!}
        </div>

        <label for="lastname2" >Segundo apellido:</label>
        <div class="input-group">
            <div class="input-group-text">
                <i class="fas fa-user"></i>
            </div>
            {!!  Form::text('lastname2', null, ['class' => 'form-control']) !!}
        </div>


        <!--Se debe cambiar por un select y no un input-->
        <label for="typedocument" class="mtop16" >Tipo de documento:</label>
        <div class="input-group">
            <div class="input-group-text">
                <i class="far fa-id-card"></i>
            </div>
            {!!  Form::text('typedocument', null, ['class' => 'form-control', 'required']) !!}
        </div>

        <label for="numberdocument" >Número de documento:</label>
        <div class="input-group">
            <div class="input-group-text">
                <i class="far fa-id-card"></i>
            </div>
            {!!  Form::text('numberdocument', null, ['class' => 'form-control', 'required']) !!}
        </div>
        
 
        <label for="email" class="mtop16">Correo electrónico:</label>
        <div class="input-group">
            <div class="input-group-text">
                <i class="far fa-envelope-open"></i>
            </div>

            {!!  Form::email('email', null, ['class' => 'form-control', 'required']) !!}
        </div>

        <label for="password" >Contraseña:</label>
        <div class="input-group">
            <div class="input-group-text">
                <i class="fas fa-lock"></i>
            </div>
            {!!  Form::password('password', ['class' => 'form-control', 'required']) !!}
        </div>


        <!--Se debe cambiar por un select y no un input-->
        <label for="gender" class="mtop16">Género:</label>
        <div class="input-group">
            <div class="input-group-text">
                <i class="fas fa-venus-mars"></i>
            </div>
            {!!  Form::text('gender', null, ['class' => 'form-control']) !!}
        </div>
 
           
         <!--Se debe cambiar por un input calendar-->
         <label for="datebirth" >Fecha de nacimiento:</label>
         <div class="input-group">
             <div class="input-group-text">
                 <i class="fas fa-calendar"></i>
             </div>
             {!!  Form::text('datebirth', null, ['class' => 'form-control']) !!}
         </div>
  

       

        {!! Form::submit('Registrarse', ['class' => 'btn btn-success mtop16'])!!}
        {!!  Form::close() !!}

        <div class="footer mtop16">
            <a href="{{url('/login')}}">Ya tengo una cuenta, Ingresar</a>
        </div>

    </div>

</div>
@stop