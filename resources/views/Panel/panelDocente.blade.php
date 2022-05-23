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
    <h1>Examen</h1>
    <button class="agrega">
        <a href="{{route('examen.create')}}">Agregar Pregunta</a>
    </button>
    <button class="agrega">
        <a href="{{route('panelE.reporte')}}">Reportes Alumnos</a>
    </button>
    <button class="agrega">
        <a href="{{route('panelE.edit')}}">Editar Usuario</a>
    </button>
    <table>
        <thead class="titulo">
          <td>ID</td>
          <td>PREGUNTAS</td>
          <td>OPCION 1</td>
          <td>OPCION 2</td>
          <td>OPCION 2</td> 
          <td>RESPUESTA</td> 
          <td>ACCION</td> 
        </thead>
        <tr>
          @foreach ($examenes as $examen)
          <tr>
            <td>{{$examen->id}}</td>
            <td>{{$examen->pregunta}}</td>
            <td>{{$examen->opcion1}}</td>
            <td>{{$examen->opcion2}}</td>
            <td>{{$examen->opcion3}}</td> 
            <td>{{$examen->respuesta}}</td> 
            <td>
                <button><a href="{{route('pregunta.editar',$examen)}}" class="modificar">Modificar</a></button>
                <form action="{{route('pregunta.eliminar', $examen)}}"method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="eliminar">Eliminar</button>
                </form>  
          </tr>
             
          @endforeach
           
        </tr>
        
    </table>
    {{-- <ul>
        @foreach ($examenes as $examen)
         <li class="preguntas"><a href="{{route('examen.gestionar', $examen->id)}}">{{$examen->pregunta}}</a></li><br>
        @endforeach 
     </ul> --}}

@endsection