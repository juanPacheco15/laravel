@extends('layouts.plantilla')

@section('title','PanelEstudiante')

@section('estilos')
    <link rel="stylesheet" href="{{ asset('css/panelMenu.css') }}">   
@endsection
    
@section('content')
    <ul class="menu">
        <p><strong>Usuario: {{auth()->user()->usuario}}</strong></p>
        <li class="navegacion"><a href="{{route('login.destroy')}}">Cerrar sesion</a></li>
        
    </ul>
    <button class="edita"><a href="{{route('panelE.edit')}}">Editar Usuario</a></button>
    <form action="{{route('examen.intento', auth()->user()->usuario)}}" method="POST">
        @csrf
        <button class="edita" type="submit">Realizar Examen</button>
    </form>

@endsection