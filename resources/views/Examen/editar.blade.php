@extends('layouts.plantilla')

@section('title','PanelEstudiante')

@section('estilos')
    <link rel="stylesheet" href="{{ asset('css/examen.css') }}">   
@endsection
    
@section('content')
    <ul class="menu">
        <p><strong>Usuario: {{auth()->user()->usuario}}</strong></p>
        <li class="navegacion"><a href="{{route('login.destroy')}}">Cerrar sesion</a></li>
        
        
    </ul>
    <div class="contenedor">
        <h3>Editar Pregunta</h3>
        <form action="{{route('pregunta.edit', $pregunta)}}" method="POST">
            @csrf
            @method('put')
            <p class="textExamen">Pregunta</p><br>
            <input type="text" class="Pregunta" name="pregunta" value="{{$pregunta->pregunta}}"><br>
            <p class="textExamen">Opcion 1</p><br>
            <input type="text" class="opciones" name="opcion1" value="{{$pregunta->opcion1}}"><br>
            <p class="textExamen">Opcion 2</p><br>
            <input type="text" class="opciones" name="opcion2" value="{{$pregunta->opcion2}}"><br>
            <p class="textExamen">Opcion 3</p><br>
            <input type="text" class="opciones" name="opcion3" value="{{$pregunta->opcion3}}"><br>
            <p class="textExamen">Respuesta</p><br>
            <input type="text" class="opciones" name="respuesta" value="{{$pregunta->respuesta}}"><br>
            <button class="modifica" type="submit">Modificar</button><br>
            <button class="cancela" type="submit"><a href="{{route('panel.docente')}}" style="text-decoration: none; color: white">Cancelar</a></button>
        </form>
    </div>
    
@endsection