<?php

namespace App\Http\Controllers;

use App\Models\Caminhao;
use Illuminate\Http\Request;

class CaminhaoController extends Controller
{
    /**
     * Exibe todos os caminhões, com filtro de pesquisa.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Recuperando o valor de pesquisa (caso haja)
        $search = $request->input('search');

        // Consulta aos caminhões com paginação e filtragem por nome
        $caminhoes = Caminhao::where('Caminhao', 'like', '%' . $search . '%')
                             ->paginate(15); // Pagina 15 resultados por página

        // Retorna a view com os dados dos caminhões e o filtro de pesquisa
        return view('caminhao.index', compact('caminhoes', 'search'));
    }

    /**
     * Exibe os detalhes de um caminhão específico.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $caminhao = Caminhao::findOrFail($id); // Recupera o caminhão pelo ID
        return view('caminhao.show', compact('caminhao'));
    }

    /**
     * Exibe o formulário para criar um novo caminhão.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('caminhao.create'); // Exibe o formulário de criação
    }

    /**
     * Salva um novo caminhão no banco de dados.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validação dos dados do formulário
        $request->validate([
            'Caminhao' => 'required|string|max:255', // Validação para o nome do caminhão
        ]);

        // Criação do caminhão no banco de dados
        Caminhao::create([
            'Caminhao' => $request->Caminhao,
        ]);

        // Redireciona para a lista de caminhões com mensagem de sucesso
        return redirect()->route('caminhao.index')
                         ->with('success', 'Caminhão criado com sucesso.');
    }

    /**
     * Exibe o formulário de edição para o caminhão.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $caminhao = Caminhao::findOrFail($id); // Recupera o caminhão pelo ID
        return view('caminhao.edit', compact('caminhao')); // Retorna a view com os dados para edição
    }

    /**
     * Atualiza os dados de um caminhão no banco de dados.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validação dos dados
        $request->validate([
            'Caminhao' => 'required|string|max:255',
        ]);

        // Encontra o caminhão pelo ID
        $caminhao = Caminhao::findOrFail($id);

        // Atualiza o nome do caminhão
        $caminhao->Caminhao = $request->Caminhao;
        $caminhao->save();

        // Redireciona para a lista com a mensagem de sucesso
        return redirect()->route('caminhao.index')
                         ->with('success', 'Caminhão atualizado com sucesso.');
    }

    /**
     * Remove o caminhão do banco de dados.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Encontra o caminhão pelo ID e deleta
        $caminhao = Caminhao::findOrFail($id);
        $caminhao->delete();

        // Redireciona para a lista de caminhões com mensagem de sucesso
        return redirect()->route('caminhao.index')
                         ->with('success', 'Caminhão deletado com sucesso.');
    }
}
