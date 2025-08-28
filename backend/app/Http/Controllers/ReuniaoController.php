<?php

namespace App\Http\Controllers;

use App\Models\Reuniao;
use Illuminate\Http\Request;

class ReuniaoController extends Controller
{
    // Listar todas as reuniões
    public function index()
    {
        return Reuniao::all();
    }

    // Criar uma nova reunião
    public function store(Request $request)
    {
        $validated = $request->validate([
            'assunto' => 'required|string|max:255',
            'local' => 'nullable|string',
            'data' => 'required|date',
            'hora' => 'required',
        ]);

        $reuniao = Reuniao::create($validated);
        return response()->json($reuniao, 201);
    }

    // Mostrar uma reunião específica
    public function show($id)
    {
        return Reuniao::findOrFail($id);
    }

    // Atualizar uma reunião
    public function update(Request $request, $id)
    {
        $reuniao = Reuniao::findOrFail($id);

        $validated = $request->validate([
            'assunto' => 'required|string|max:255',
            'local' => 'nullable|string',
            'data' => 'required|date',
            'hora' => 'required',
        ]);

        $reuniao->update($validated);
        return response()->json($reuniao, 200);
    }

    // Deletar uma reunião
    public function destroy($id)
    {
        Reuniao::destroy($id);
        return response()->json(null, 204);
    }
}