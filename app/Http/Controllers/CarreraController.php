<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use Illuminate\Http\Request;

class CarreraController extends Controller
{
    public function index()
    {
        return response()->json(Carrera::with('facultad')->get());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre'      => 'required|string|max:100',
            'facultad_id' => 'required|exists:facultades,id',
        ]);
        $carrera = Carrera::create($data);
        return response()->json($carrera->load('facultad'), 201);
    }

    public function show(Carrera $carrera)
    {
        return response()->json($carrera->load('facultad'));
    }

    public function update(Request $request, Carrera $carrera)
    {
        $data = $request->validate([
            'nombre'      => 'sometimes|string|max:100',
            'facultad_id' => 'sometimes|exists:facultades,id',
        ]);
        $carrera->update($data);
        return response()->json($carrera->load('facultad'));
    }

    public function destroy(Carrera $carrera)
    {
        $carrera->delete();
        return response()->json(['message' => 'Carrera eliminada']);
    }
}
