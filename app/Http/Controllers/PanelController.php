<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;

class PanelController extends Controller
{
    public function panelE(User $usuario){
        return view('Panel.panelEstudiante', compact('usuario'));
    }

    public function edit(User $usuario){
        return view('Panel.edit');
    }
    public function update(Request $request, $id){
        $usuario = User::find($id);

        $usuario->nombre = $request->nombre;
        $usuario->usuario = $request->usuario;
        $usuario->email = $request->email;
        $usuario->password = $request->password;
        $usuario->tipoUsuario = $request->tipoUsuario;
        $usuario->sexo = $request->sexo;

        if ($request->tipoUsuario=='docente'||$request->tipoUsuario=='Docente'||$request->tipoUsuario=='DOCENTE') {
            $usuario->save();
            return redirect()->route('panel.docente');
            
        }else{
           $usuario->save();
           return redirect()->route('panel.estudiante');
        }
    }

    public function showD(){
        $examenes = Exam::all();

        return view('Panel.panelDocente', compact('examenes'));

    }

    
}
