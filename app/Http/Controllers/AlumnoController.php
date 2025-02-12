<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Nivel;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    //Muestra la lista de alumnos.
    public function index() {
        $alumnos = Alumno::all(); // Obtener todos los alumnos de la base de datos.
        return view('alumnos.index', ['lista' => $alumnos]);
    }

    //Muestra un alumno específico.
    public function show($id) {
        $alumno = Alumno::find($id);

        return view('alumnos.show', ['alumno' => $alumno]);
    }

    //Muestra el formulario para crear un nuevo alumno.
    public function create() {
        $niveles = Nivel::all(); // Obtener todos los niveles disponibles
        return view('alumnos.create', compact('niveles'));
    }
    

    public function store(Request $request) {
        $alumno = new Alumno();
    
        // Asignación de los valores recibidos del formulario con valores por defecto.
        $alumno->matricula = $request->input('matricula', '0000000000');
        $alumno->nombre = $request->input('nombre');
        $alumno->fecha_nacimiento = $request->input('fecha_nacimiento');
        $alumno->telefono = $request->input('telefono', '000000000');
        $alumno->email = $request->input('email', null);
        $alumno->nivel_id = $request->input('nivel_id');
    
        // Guardar en la base de datos.
        $alumno->save();
    
        // Redirigir a la vista index de alumnos.
        return redirect('/alumnos');
    }
    

    
    //Muestra el formulario para editar un alumno específico.
    public function edit($id) {
        // Obtener el alumno por su ID
        $alumno = Alumno::find($id);
        
        // Obtener todos los niveles
        $niveles = Nivel::all();
        
        // Pasar el alumno y los niveles a la vista sin usar compact
        return view('alumnos.edit', ['alumno' => $alumno, 'niveles' => $niveles]);
    }


    //Actualiza un alumno específico en la base de datos.
    public function update(Request $request, $id) {
        // Buscar el alumno por ID.
        $alumno = Alumno::find($id);

        // Asignación de los valores recibidos del formulario
        $alumno->matricula = $request->input('matricula');
        $alumno->nombre = $request->input('nombre');
        $alumno->fecha_nacimiento = $request->input('fecha_nacimiento');
        $alumno->telefono = $request->input('telefono');
        $alumno->email = $request->input('email');
        $alumno->nivel_id = $request->input('nivel_id');

        // Guardar los cambios en la base de datos
        $alumno->save();

        // Redirigir a la vista index
        return redirect('/alumnos');
    }

    //Elimina un alumno específico de la base de datos.
    public function destroy($id) {
        $alumno = Alumno::find($id);

        if ($alumno) {
            $alumno->delete();
            return redirect('/alumnos');
        } else {
            return redirect('/alumnos');
        }
    }
}
