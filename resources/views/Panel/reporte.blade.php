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
    <h1>REPORTE DE ALUMNOS</h1>
    <button class="agrega">
        <a href="{{route('panel.docente')}}">Regresar</a>
    </button>
    <table>
        <thead class="titulo">
          <td>ID</td>
          <td>USUARIO</td>
          <td>INTENTOS 1</td>
          <td>PROMEDIO GENERAL</td>
         
        </thead>
        <tr>
          @foreach ($reportes as $reporte)
          <tr>
            <td>{{$reporte->id}}</td>
            <td>{{$reporte->usuario}}</td>
            <td>{{$reporte->intentos}}</td>
            <td>{{$reporte->promedioGeneral}}</td>
             
          @endforeach
           
        </tr>
        
    </table>

   
    
@endsection