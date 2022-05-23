@extends('layouts.plantilla')

@section('title','PanelEstudiante')

@section('estilos')
    <link rel="stylesheet" href="{{ asset('css/examenE.css') }}">
@endsection

@section('content')
    <ul class="menu">
        <p><strong>Usuario: {{auth()->user()->usuario}}</strong></p>
        <li class="navegacion"><a href="{{route('login.destroy')}}">Cerrar sesion</a></li>
        <li class="navegacion"><a href="{{route('panel.estudiante')}}">Inicio</a></li>
    </ul>
    <h1>Respuestas Correctas</h1>
    <form action="" method="">
        @csrf
        <h1>Examen</h1>
        <h3>TALLER DE PROGRAMACION WEB</h3>
        @for ($i = 1; $i <= count($res); $i++)
        <p class="pregunta">Preguntas {{$i}}: {{$preguntas1[$i]}} </p><br>
            @if ($resCorrectas[$i] == $res[$i] )
            <p style="color: #00CC00 ">Respuesta Alumno: {{$res[$i]}}</p><br>
            @else
            <p style="color: red">Respuesta Alumno: {{$res[$i]}}</p><br>
            @endif
            <p style="color: green">Respuesta Correcta: {{$resCorrectas[$i]}}</p><br>
        @endfor

    </form>



@endsection