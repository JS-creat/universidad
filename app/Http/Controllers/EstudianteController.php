<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EstudianteController extends Controller
{
    //  Listar estudiantes con relaciones
    public function index()
    {
        return response()->json(
            Estudiante::with(['carrera', 'turno'])->get()
        );
    }

    //  Crear estudiante
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombres'    => 'required|string',
            'apellidos'  => 'required|string',
            'codigo'     => 'required|unique:estudiantes',
            'email'      => 'required|email|unique:estudiantes',
            'carrera_id' => 'required|exists:carreras,id',
            'turno_id'   => 'required|exists:turnos,id',
            'activo'     => 'boolean'
        ]);

        //  PASSWORD AUTOMÁTICO
        $data['password'] = Hash::make('123456');

        return Estudiante::create($data);
    }

    //  Mostrar uno
    public function show($id)
    {
        $estudiante = Estudiante::with(['carrera', 'turno'])->findOrFail($id);

        return response()->json($estudiante);
    }

    //  Actualizar
    public function update(Request $request, $id)
    {
        $estudiante = Estudiante::findOrFail($id);

        $data = $request->validate([
            'nombres'    => 'sometimes|string',
            'apellidos'  => 'sometimes|string',
            'codigo'     => 'sometimes|unique:estudiantes,codigo,' . $id,
            'email'      => 'sometimes|email|unique:estudiantes,email,' . $id,
            'password'   => 'nullable|min:6',
            'carrera_id' => 'sometimes|exists:carreras,id',
            'turno_id'   => 'sometimes|exists:turnos,id',
            'activo'     => 'boolean'
        ]);

        //  Si envían password, encriptar
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        $estudiante->update($data);

        return response()->json($estudiante);
    }

    // Eliminar
    public function destroy($id)
    {
        Estudiante::destroy($id);

        return response()->json([
            'message' => 'Estudiante eliminado'
        ]);
    }
}
