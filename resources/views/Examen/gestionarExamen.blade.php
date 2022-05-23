@extends('layouts.plantilla')

@section('title','PanelEstudiante')

@section('estilos')
    <link rel="stylesheet" href="{{ asset('css/panelMenu.css') }}">   
@endsection
    
@section('content')
    <ul class="menu">
        <p><strong>Usuario: {{auth()->user()->usuario}}</strong></p>
        <li class="navegacion"><a href="{{route('login.destroy')}}">Cerrar sesion</a></li>
        <li class="navegacion"><a href="{{route('panel.docente')}}">Inicio</a></li>
    </ul>
    <div class="contenedorPregunta">
        <p class="infoPregunta">Pregunta:
        {{$pregunta->pregunta}}</p><br>
        <p class="infoPregunta">Opcion1:
        {{$pregunta->opcion1}}</p><br>
        <p class="infoPregunta">Opcion2:
        {{$pregunta->opcion2}}</p><br>
        <p class="infoPregunta">Opcion3:
        {{$pregunta->opcion3}}</p><br>
        <p class="infoPregunta">Respuesta:
            {{$pregunta->respuesta}}</p><br>

        <button><a href="{{route('pregunta.editar',$pregunta)}}" class="modificar">Modificar</a></button>
        <form action="{{route('pregunta.eliminar', $pregunta)}}" method="POST">
            @csrf
            @method('delete')
            <button type="submit">Eliminar</button>
        </form>
    </div>
    


@endsection