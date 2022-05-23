@extends('layouts.plantilla')

@section('title','Login')

@section('estilos')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">   
@endsection
    
@section('content')
<div class="c1">
    <p class="title">TALLER DE PROGRAMACION WEB</p>
  </div>
    <div class="contenedor">
        
        <h1>LOGIN</h1>
        <form action="{{route('login.validar')}}" method="POST">
            @csrf
            <input type="text" name="usuario" placeholder="ingresa tu nombre de usuario"><br>
            <input type="password" name="password" placeholder="ingresa tu nombre Contraseña"><br>
            <br>
            <a href="{{route('registro')}}">Registrarse</a><br>
            <button type="submit">LOGIN</button>
        </form>
    </div>
    
   
@endsection