<?php

namespace App\Http\Controllers;

use App\Models\Facultad;
use Illuminate\Http\Request;

class FacultadController extends Controller
{
    public function index()
    {
        return response()->json(Facultad::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:100',
            'codigo' => 'required|string|unique:facultades,codigo',
        ]);
        $facultad = Facultad::create($data);
        return response()->json($facultad, 201);
    }

    public function show(Facultad $facultad)
    {
        return response()->json($facultad);
    }

    public function update(Request $request, Facultad $facultad)
    {
        $data = $request->validate([
            'nombre' => 'sometimes|string|max:100',
            'codigo' => 'sometimes|string|unique:facultades,codigo,' . $facultad->id,
        ]);
        $facultad->update($data);
        return response()->json($facultad);
    }

    public function destroy(Facultad $facultad)
    {
        $facultad->delete();
        return response()->json(['message' => 'Facultad eliminada']);
    }
}
