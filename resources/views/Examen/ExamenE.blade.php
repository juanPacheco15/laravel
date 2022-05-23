@extends('layouts.plantilla')

@section('title','PanelEstudiante')

@section('estilos')
    <link rel="stylesheet" href="{{ asset('css/examenE.css') }}">
@endsection

@section('content')
    <ul class="menu">
        <p><strong>Usuario: {{auth()->user()->usuario}}</strong></p>
        <li class="navegacion"><a href="{{route('login.destroy')}}">Cerrar sesion</a></li>
    </ul>
        <form action="{{route('pregunta.respuesta', auth()->user()->usuario)}}" method="POST">
            @csrf
            <h1>Examen</h1>
            <h3>TALLER DE PROGRAMACION WEB</h3>
            @foreach ($examenes as $examen)
            <p class="pregunta">{{$examen->pregunta}}</p><br>
            <input type="radio" name="{{$examen->id}}" value="{{$examen->opcion1}}">{{$examen->opcion1}}<br>
            <input type="radio" name="{{$examen->id}}" value="{{$examen->opcion2}}">{{$examen->opcion2}}<br>
            <input type="radio" name="{{$examen->id}}" value="{{$examen->opcion3}}">{{$examen->opcion3}}<br>
            @endforeach 
            <BUtton type="submit">Enviar</BUtton>
        </form>

@endsection