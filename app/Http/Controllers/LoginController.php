<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function login(){
        return view('Login.login');
    }

    public function validar(){
        $examenes = Exam::all();

        if (auth()->attempt(request(['usuario','password'])) == false) {
            return "El usuario no existe";
        }else{
            if (auth()->user()->tipoUsuario == 'Docente' || auth()->user()->tipoUsuario == 'docente'|| auth()->user()->tipoUsuario == 'DOCENTE') {
                return view('Panel.panelDocente', compact('examenes'));
            }
        }
        return view('Panel.panelEstudiante');

    }

    public function destroy(){
        auth()->logout();
        return redirect()->route('login');
    }

    public function registro(){
        return view('Login.registro');
    }
    
    public function store(Request $request){
        $request->validate([
            'nombre'=>'required',
            'usuario'=>'required',
            'email'=>'required',
            'password'=>'required',
            'tipoUsuario'=>'required',
            'sexo'=>'required',
        ]);

        
        $usuario = new User();
        $reporte = new Report();

        $usuario->nombre = $request->nombre;
        $usuario->usuario = $request->usuario;
        $usuario->email = $request->email;
        $usuario->password = $request->password;
        $usuario->tipoUsuario = $request->tipoUsuario;
        $usuario->sexo = $request->sexo;
        if ($request->tipoUsuario=='docente'||$request->tipoUsuario=='Docente'||$request->tipoUsuario=='DOCENTE') {
            $usuario->save();
            return redirect()->route('login');
        }else{
           $reporte->usuario = $request->usuario;
           $reporte->intentos = 0;
           $reporte->calificacion = 0;
           $reporte->promedioGeneral = 0;
           $usuario->save();
           $reporte->save();
           
           return redirect()->route('login'); 
        }
        
    }
}
