<?php

namespace App\Http\Controllers;

use App\Models\Turno;
use Illuminate\Http\Request;

class TurnoController extends Controller
{
    public function index()
    {
        return response()->json(Turno::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:50',
        ]);
        $turno = Turno::create($data);
        return response()->json($turno, 201);
    }

    public function show(Turno $turno)
    {
        return response()->json($turno);
    }

    public function update(Request $request, Turno $turno)
    {
        $data = $request->validate([
            'nombre' => 'sometimes|string|max:50',
        ]);
        $turno->update($data);
        return response()->json($turno);
    }

    public function destroy(Turno $turno)
    {
        $turno->delete();
        return response()->json(['message' => 'Turno eliminado']);
    }
}
