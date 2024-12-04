<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    // Exibe todos os clientes
    public function index(Request $request)
    {
        // Recuperando o valor de pesquisa (caso haja)
        $search = $request->input('search');

        // Consulta aos clientes com paginação e filtragem por nome
        $clientes = Cliente::where('nome', 'like', '%' . $search . '%')
                           ->paginate(15); // Pagina 15 resultados por página

        // Retorna a view com os dados dos clientes
        return view('clientes.index', compact('clientes', 'search'));
    }


    // Armazena o novo cliente no banco de dados
    public function store(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        // Cria o cliente
        Cliente::create([
            'nome' => $request->nome,
        ]);

        return redirect()->route('clientes.index')->with('success', 'Cliente criado com sucesso.');
    }

    // Exibe os detalhes de um cliente específico
    public function show($id)
    {
        $cliente = Cliente::findOrFail($id); // Recupera o cliente pelo ID
        return view('clientes.show', compact('cliente'));
    }

    // Exibe o formulário de edição de um cliente
    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id); // Recupera o cliente pelo ID
        return view('clientes.edit', compact('cliente'));
    }

    // Atualiza o cliente no banco de dados
    public function update(Request $request, $id)
    {
        // Validação dos dados
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        // Encontra o cliente
        $cliente = Cliente::findOrFail($id);

        // Atualiza o nome
        $cliente->nome = $request->nome;

        $cliente->save();

        return redirect()->route('clientes.index')->with('success', 'Cliente atualizado com sucesso.');
    }

    // Remove o cliente do banco de dados
    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();

        return redirect()->route('clientes.index')->with('success', 'Cliente deletado com sucesso.');
    }
}
