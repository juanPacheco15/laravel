<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;

class ExamenController extends Controller
{
    public function create(){
        return view('Examen.examen');
    }
    public function store(Request $request){
        $examen = new Exam();

        $examen->pregunta = $request->pregunta;
        $examen->opcion1 = $request->opcion1;
        $examen->opcion2 = $request->opcion2;
        $examen->opcion3 = $request->opcion3;
        $examen->respuesta = $request->respuesta;

        $examen->save();

        return redirect()->route('examen.create');
    }

    public function showP($id){
        $pregunta = Exam::find($id);
        return view('Examen.gestionarExamen', compact('pregunta'));
    }

    // public function editarP($id){
    //     $pregunta = Exam::find($id);

    //     return view('Examen.editar', compact('pregunta'));
    // }

    public function update(Request $request, $id){
        $pregunta = Exam::find($id);

        $pregunta->pregunta = $request->pregunta;
        $pregunta->opcion1 = $request->opcion1;
        $pregunta->opcion2 = $request->opcion2;
        $pregunta->opcion3 = $request->opcion3;
        $pregunta->respuesta = $request->respuesta;

        $pregunta->save();

        return redirect()->route('panel.docente');

    }

    public function eliminar($id){
        $pregunta = Exam::find($id);

        $pregunta->delete();

        return redirect()->route('panel.docente');
    }

    //Examen Estudiante

    public function show(){
        $examenes = Exam::all();

        return view('Examen.examenE', compact('examenes'));
    }
    public function resp(Request $request, $usuario){
        $pregunta = Exam::all();
        $preguntas1 = [];
        $resCorrectas = [];
        $res = [];
        $calificacion = 0;
        $contadorCorrecto = 0;
        $contadorIncorrecto = 0;
        $promedio = 0;
        for ($i=1; $i <= sizeof($pregunta); $i++) { 
            $preguntas = Exam::find($i);
            $resCorrectas[$i] = $preguntas->respuesta;
            $preguntas1[$i] = $preguntas->pregunta;
            $res[$i] = $request->input($i);
            if ($request->input($i) == $preguntas->respuesta) {
                $contadorCorrecto = $contadorCorrecto+1;
            }
                    
                
        }
        $intento = Report::where("usuario",$usuario)->first();
        $calificacion = ($contadorCorrecto * 10)/sizeof($pregunta);
        $cali = $intento->calificacion + $calificacion;
        $temporalIntentos = $intento->intentos;
        $promedio = ($cali / $temporalIntentos);
        $intento->calificacion = $cali;
        $intento->promedioGeneral = $promedio;
        $intento->save();

        
        //$resp = $request;
        return view('Examen.respuestas', compact('res','pregunta','resCorrectas','preguntas1', 'contadorCorrecto', 'contadorIncorrecto'));
        

    }

    public function intento($usuario){
        $examenes = Exam::all();
        
        $tempReporte = Report::where("usuario",$usuario)->first();

        $contador=$tempReporte->intentos;

        $contador=$contador+1;
        
        $tempReporte->intentos = $contador;

        $tempReporte->save();

        return redirect()->route('examenE.mostrar', compact('examenes'));
    }

    public function verReporte(){
        $reportes = Report::all();

       

        return view('Panel.reporte', compact('reportes'));

    }
        
        
}