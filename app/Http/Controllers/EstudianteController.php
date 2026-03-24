<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    public function index()
    {
        // Trae a los estudiantes con su carrera y turno
        return Estudiante::with(['carrera', 'turno'])->get();
    }

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

        return Estudiante::create($data);
    }

    public function show($id)
    {
        return Estudiante::with(['carrera', 'turno'])->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $estudiante = Estudiante::findOrFail($id);
        $estudiante->update($request->all());
        return $estudiante;
    }

    public function destroy($id)
    {
        Estudiante::destroy($id);
        return response()->json(['res' => 'Estudiante eliminado']);
    }
}
