@extends('layouts.plantilla')

@section('title','Registro')

@section('estilos')
    <link rel="stylesheet" href="{{ asset('css/registro.css') }}">   
@endsection
    
@section('content')
<div class="contenedor">
    <h1>Registro</h1>
    <form action="{{route('registro.store')}}" method="POST">
        @csrf
        <input type="text" name="nombre" placeholder="Ingresea tu Nombre">
        @error('nombre')
            <br>
                <small>*{{$message}}</small>
            <br>
        @enderror
        <input type="text" name="usuario" placeholder="Ingresea tu Usuario">
        @error('usuario')
            <br>
                <small>*{{$message}}</small>
            <br>
        @enderror
        <input type="email" name="email" placeholder="Ingresea tu Email">
        @error('email')
            <br>
                <small>*{{$message}}</small>
            <br>
        @enderror
        <input type="password" name="password" placeholder="Ingresea tu Contraseña">
        @error('password')
            <br>
                <small>*{{$message}}</small>
            <br>
        @enderror
        <input type="text" name="tipoUsuario" placeholder="Ingresea tu Tipo de Usuario">
        @error('tipoUsuario')
            <br>
                <small>*{{$message}}</small>
            <br>
        @enderror
        <input type="text" name="sexo" placeholder="Sexo">
        @error('sexo')
            <br>
                <small>*{{$message}}</small>
            <br>
        @enderror
        
        <button class="regresa"><a  href="{{route('login')}}">Volver al login</a></button>
        <button class="button" type="submit">Registrarse</button>
    </form>
</div>
    
@endsection