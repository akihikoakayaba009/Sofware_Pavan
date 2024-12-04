<?php

namespace App\Http\Controllers;

use App\Models\Projetista;
use Illuminate\Http\Request;

class ProjetistaController extends Controller
{
    // Exibe todos os projetistas
    public function index()
    {
        $projetistas = Projetista::all();  // Retorna todos os projetistas
        return view('projetistas.index', compact('projetistas'));  // Retorna a view com os projetistas
    }

    // Exibe o formulário para criar um novo projetista
    public function create()
    {
        return view('projetistas.create');  // Retorna o formulário de criação
    }

    // Armazena um novo projetista
    public function store(Request $request)
    {
        // Valida os dados do request
        $request->validate([
            'projetista' => 'required|string|max:255',
        ]);

        // Cria um novo projetista
        Projetista::create([
            'projetista' => $request->input('projetista'),
        ]);

        // Redireciona para a lista de projetistas com uma mensagem de sucesso
        return redirect()->route('projetistas.index')->with('success', 'Projetista criado com sucesso.');
    }

    // Exibe o formulário para editar um projetista existente
    public function edit($id)
    {
        $projetista = Projetista::findOrFail($id);  // Encontra o projetista com o ID fornecido
        return view('projetistas.edit', compact('projetista'));  // Retorna o formulário de edição
    }

    // Atualiza um projetista existente
    public function update(Request $request, $id)
    {
        // Valida os dados do request
        $request->validate([
            'projetista' => 'required|string|max:255',
        ]);

        // Encontra o projetista e atualiza seus dados
        $projetista = Projetista::findOrFail($id);
        $projetista->update([
            'projetista' => $request->input('projetista'),
        ]);

        // Redireciona para a lista de projetistas com uma mensagem de sucesso
        return redirect()->route('projetistas.index')->with('success', 'Projetista atualizado com sucesso.');
    }

    // Deleta um projetista
    public function destroy($id)
    {
        $projetista = Projetista::findOrFail($id);
        $projetista->delete();  // Deleta o projetista

        return redirect()->route('projetistas.index')->with('success', 'Projetista deletado com sucesso.');
    }
}
