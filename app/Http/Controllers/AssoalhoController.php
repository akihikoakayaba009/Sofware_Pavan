<?php
namespace App\Http\Controllers;

use App\Models\Assoalho;
use Illuminate\Http\Request;

class AssoalhoController extends Controller
{
    // Exibe todos os assoalhos
    public function index()
    {
        $assoalhos = Assoalho::paginate(10); // Usando paginação, 10 itens por página
        return view('assoalhos.index', compact('assoalhos'));
    }

    // Exibe o formulário para criar um novo assoalho
    public function create()
    {
        return view('assoalhos.create');
    }

    // Armazena um novo assoalho
    public function store(Request $request)
    {
        // Validação
        $request->validate([
            'Assoalho' => 'required|integer', // Validação do campo Assoalho
        ]);

        // Cria o assoalho no banco de dados
        Assoalho::create([
            'Assoalho' => $request->Assoalho,
        ]);

        return redirect()->route('assoalhos.index')->with('success', 'Assoalho criado com sucesso!');
    }

    // Exibe os detalhes de um assoalho específico
    public function show($id)
    {
        $assoalho = Assoalho::findOrFail($id); // Encontrar ou falhar
        return view('assoalhos.show', compact('assoalho'));
    }

    // Exibe o formulário de edição de um assoalho
    public function edit($id)
    {
        $assoalho = Assoalho::findOrFail($id);
        return view('assoalhos.edit', compact('assoalho'));
    }

    // Atualiza um assoalho existente
    public function update(Request $request, $id)
    {
        // Validação
        $request->validate([
            'Assoalho' => 'required|integer',
        ]);

        $assoalho = Assoalho::findOrFail($id);
        $assoalho->update([
            'Assoalho' => $request->Assoalho,
        ]);

        return redirect()->route('assoalhos.index')->with('success', 'Assoalho atualizado com sucesso!');
    }

    // Remove um assoalho
    public function destroy($id)
    {
        $assoalho = Assoalho::findOrFail($id);
        $assoalho->delete();

        return redirect()->route('assoalhos.index')->with('success', 'Assoalho deletado com sucesso!');
    }
}
