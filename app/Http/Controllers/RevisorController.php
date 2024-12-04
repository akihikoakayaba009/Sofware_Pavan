<?php

namespace App\Http\Controllers;

use App\Models\Revisor;
use Illuminate\Http\Request;

class RevisorController extends Controller
{
    // Método para listar todos os revisores
    public function index()
    {
        $revisores = Revisor::all(); // Recupera todos os revisores
        return response()->json($revisores);
    }

    // Método para mostrar um revisor específico
    public function show($id)
    {
        $revisor = Revisor::find($id); // Encontra um revisor pelo ID

        if (!$revisor) {
            return response()->json(['message' => 'Revisor não encontrado'], 404);
        }

        return response()->json($revisor);
    }

    // Método para criar um novo revisor
    public function store(Request $request)
    {
        $request->validate([
            'Nome' => 'required|string|max:255', // Validação do campo 'Nome'
        ]);

        $revisor = Revisor::create([
            'Nome' => $request->Nome,
        ]);

        return response()->json($revisor, 201);
    }

    // Método para atualizar um revisor existente
    public function update(Request $request, $id)
    {
        $revisor = Revisor::find($id);

        if (!$revisor) {
            return response()->json(['message' => 'Revisor não encontrado'], 404);
        }

        $request->validate([
            'Nome' => 'required|string|max:255', // Validação do campo 'Nome'
        ]);

        $revisor->update([
            'Nome' => $request->Nome,
        ]);

        return response()->json($revisor);
    }

    // Método para excluir um revisor
    public function destroy($id)
    {
        $revisor = Revisor::find($id);

        if (!$revisor) {
            return response()->json(['message' => 'Revisor não encontrado'], 404);
        }

        $revisor->delete();

        return response()->json(['message' => 'Revisor deletado com sucesso']);
    }
}
