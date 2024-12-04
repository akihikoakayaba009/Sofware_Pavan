<?php

namespace App\Http\Controllers;

use App\Models\DenominacaoChassi;
use Illuminate\Http\Request;

class DenominacaoChassiController extends Controller
{
    // Exibir a lista de chassis
    public function index(Request $request)
    {
        $search = $request->get('search', '');
        
        // Consultar a tabela com o filtro de busca
        $denominacaoChassis = DenominacaoChassi::where('codigo_chassi', 'like', '%' . $search . '%')
            ->paginate(10);

        return view('denominacao_chassis.index', compact('denominacaoChassis', 'search'));
    }

    // Exibir o formulário para criar um novo chassi
    public function create()
    {
        return view('denominacao_chassis.create');
    }

    // Armazenar um novo chassi no banco de dados
    public function store(Request $request)
    {
        $request->validate([
            'codigo_chassi' => 'required|string|max:11',
            'comprimento' => 'required|integer',
            'largura' => 'required|integer',
            'entre_longarinas' => 'required|integer',
            'frontal_centro_eixo' => 'required|integer',
            'tracao_truck' => 'required|integer',
            'frontal_4_eixo' => 'required|integer',
            'obs' => 'required|string|max:11',
            'tipo' => 'required|string|max:11',
        ]);

        DenominacaoChassi::create($request->all());

        return redirect()->route('denominacao_chassis.index')->with('success', 'Chassi adicionado com sucesso.');
    }

    // Exibir o formulário para editar um chassi
    public function edit(DenominacaoChassi $denominacaoChassi)
    {
        return view('denominacao_chassis.edit', compact('denominacaoChassi'));
    }

    // Atualizar o chassi no banco de dados
    public function update(Request $request, DenominacaoChassi $denominacaoChassi)
    {
        $request->validate([
            'codigo_chassi' => 'required|string|max:11',
            'comprimento' => 'required|integer',
            'largura' => 'required|integer',
            'entre_longarinas' => 'required|integer',
            'frontal_centro_eixo' => 'required|integer',
            'tracao_truck' => 'required|integer',
            'frontal_4_eixo' => 'required|integer',
            'obs' => 'required|string|max:11',
            'tipo' => 'required|string|max:11',
        ]);

        $denominacaoChassi->update($request->all());

        return redirect()->route('denominacao_chassis.index')->with('success', 'Chassi atualizado com sucesso.');
    }

    // Deletar um chassi
    public function destroy(DenominacaoChassi $denominacaoChassi)
    {
        $denominacaoChassi->delete();

        return redirect()->route('denominacao_chassis.index')->with('success', 'Chassi deletado com sucesso.');
    }
}
