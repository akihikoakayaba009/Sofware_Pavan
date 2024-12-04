<?php 
namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Cliente;
use App\Models\Caminhao;
use App\Models\Projetista;
use App\Models\Destino;
use App\Models\Transporte;
use App\Models\Revisor;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    // Exibe todos os pedidos com pesquisa
    public function index(Request $request)
    {
        $search = $request->input('search');
        $pedidos = Pedido::where('N_Serie', 'like', '%' . $search . '%')
                         ->orWhereHas('cliente', function($query) use ($search) {
                             $query->where('nome', 'like', '%' . $search . '%');
                         })
                         ->paginate(15);

        return view('pedidos.index', compact('pedidos', 'search'));
    }

    // Exibe o formulário de criação de um pedido
    public function create()
    {
        $clientes = Cliente::all();
        $caminhoes = Caminhao::all();
        $destinos = Destino::all();   // Certifique-se de que está carregando corretamente os destinos
        $transportes = Transporte::all();  // Certifique-se de que está carregando corretamente os transportes
        $projetistas = Projetista::all();  // Certifique-se de que está carregando corretamente os projetistas
        $Revisor = Revisor::all();  // Revisor, se necessário
    
        return view('pedidos.create', compact('clientes', 'caminhoes', 'destinos', 'transportes', 'projetistas', 'Revisor'));
    }
    

    // Armazena um novo pedido
    public function store(Request $request)
    {
        $request->validate([
            'N_Serie' => 'required|string|max:50',
            'Comprimento' => 'required|integer',
            'Largura' => 'required|integer',
            'Altura' => 'required|integer',
            'Assoalho' => 'required|string',
            'Porta_T' => 'required|integer',
            'Porta_LD' => 'required|integer',
            'Porta_LE' => 'required|integer',
            'Modelo' => 'required|integer',
            'Material' => 'required|integer',
            'ID_Transporte' => 'required|exists:transportes,ID_Transporte',
            'Base' => 'required|string|max:14',
            'ID_Projetista' => 'required|exists:projetista,ID',
            'ID_Revisor' => 'required|exists:revisor,ID',
            'ID_Caminhao' => 'required|exists:caminhao,ID',
            'ID_Cliente' => 'required|exists:clientes,ID',
            'ID_Destino' => 'required|exists:destino,ID',
            'data_pedido' => 'required|date',
        ]);

        Pedido::create($request->all());

        return redirect()->route('pedidos.index')->with('success', 'Pedido criado com sucesso.');
    }

    // Exibe os detalhes de um pedido específico
    public function show($id)
    {
        $pedido = Pedido::findOrFail($id);
        return view('pedidos.show', compact('pedido'));
    }

    // Exibe o formulário de edição de um pedido
    public function edit($id)
    {
        $pedido = Pedido::findOrFail($id);
        $clientes = Cliente::all();
        $caminhoes = Caminhao::all();
        $destinos = Destino::all();
        $transportes = Transporte::all();

        return view('pedidos.edit', compact('pedido', 'clientes', 'caminhoes', 'destinos', 'transportes'));
    }

    // Atualiza um pedido existente
    public function update(Request $request, $id)
    {
        $request->validate([
            'N_Serie' => 'required|string|max:50',
            'Comprimento' => 'required|integer',
            'Largura' => 'required|integer',
            'Altura' => 'required|integer',
            'Assoalho' => 'required|string',
            'Porta_T' => 'required|integer',
            'Porta_LD' => 'required|integer',
            'Porta_LE' => 'required|integer',
            'Modelo' => 'required|integer',
            'Material' => 'required|integer',
            'ID_Transporte' => 'required|exists:transportes,ID_Transporte',
            'Base' => 'required|string|max:14',
            'ID_Projetista' => 'required|exists:clientes,ID',
            'ID_Revisor' => 'required|exists:clientes,ID',
            'ID_Caminhao' => 'required|exists:caminhao,ID',
            'ID_Cliente' => 'required|exists:clientes,ID',
            'ID_Destino' => 'required|exists:destino,ID',
            'data_pedido' => 'required|date',
        ]);

        $pedido = Pedido::findOrFail($id);
        $pedido->update($request->all());

        return redirect()->route('pedidos.index')->with('success', 'Pedido atualizado com sucesso.');
    }

    // Remove um pedido
    public function destroy($id)
    {
        $pedido = Pedido::findOrFail($id);
        $pedido->delete();

        return redirect()->route('pedidos.index')->with('success', 'Pedido deletado com sucesso.');
    }
    
}
